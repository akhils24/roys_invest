<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GoogleReviewController extends Controller
{
    protected function getReviews(): array
    {
        $placeId = config('services.google.place_id');
        $apiKey  = config('services.google.api_key');

        if (!$placeId || !$apiKey) {
            Log::error('Google API credentials missing.');
            return ['reviews' => [], 'provider_url' => null];
        }

        $cacheKey = 'google_reviews';
        $ttl = now()->addDays(5);

        $data = Cache::remember($cacheKey, $ttl, function () use ($placeId, $apiKey) {
            try {
                $resp = Http::timeout(10)->get('https://maps.googleapis.com/maps/api/place/details/json', [
                    'place_id' => $placeId,
                    'fields'   => 'name,rating,reviews,user_ratings_total,url',
                    'key'      => $apiKey,
                ]);

                if ($resp->failed()) {
                    Log::warning('Google Places API request failed', [
                        'status' => $resp->status(),
                        'body'   => $resp->body(),
                    ]);
                    return ['reviews' => [], 'provider_url' => null];
                }

                $json = $resp->json();
                $providerUrl = $json['result']['url'] ?? null;
                $rawReviews = $json['result']['reviews'] ?? [];

                if (empty($rawReviews)) {
                    Log::info('Google API returned no reviews.');
                    return ['reviews' => [], 'provider_url' => $providerUrl];
                }

                $reviews = collect($rawReviews)->map(function ($r) {
                    return [
                        'author_name' => $r['author_name'] ?? 'Anonymous',
                        'rating' => $r['rating'] ?? 0,
                        'text' => $r['text'] ?? '',
                        'relative_time_description' => $r['relative_time_description'] ?? '',
                        'profile_photo_url' => route('proxy.image', [
                            'url' => $r['profile_photo_url'] ?? ''
                        ]),
                    ];
                })->values()->toArray();

                return [
                    'reviews' => $reviews,
                    'provider_url' => $providerUrl,
                ];

            } catch (\Throwable $e) {
                Log::error('Google Review Fetch Error: ' . $e->getMessage());
                return ['reviews' => [], 'provider_url' => null];
            }
        });

        // Ensure consistent return type
        return [
            'reviews' => $data['reviews'] ?? [],
            'provider_url' => $data['provider_url'] ?? null,
        ];
    }

    public function api()
    {
        $data = $this->getReviews();

        return response()->json([
            'reviews' => $data['reviews'],
            'provider_url' => $data['provider_url'],
        ]);
    }

    public function proxyImage(Request $request)
    {
        $raw = $request->query('url');
        if (!$raw) abort(404);

        $parts = parse_url($raw);
        if (!is_array($parts)) abort(404);

        $scheme = $parts['scheme'] ?? '';
        $host   = strtolower($parts['host'] ?? '');

        $allowedHosts = [
            'lh3.googleusercontent.com',
            'lh4.googleusercontent.com',
            'lh5.googleusercontent.com',
            'lh6.googleusercontent.com',
            'googleusercontent.com',
            'maps.gstatic.com',
        ];

        $isAllowed = collect($allowedHosts)->contains(function ($allowed) use ($host) {
            return $host === $allowed || str_ends_with($host, '.' . $allowed);
        });

        if ($scheme !== 'https' || !$isAllowed) abort(403);

        $resp = Http::timeout(10)->get($raw);
        if ($resp->failed()) abort(404);

        return response($resp->body(), 200)
            ->header('Content-Type', $resp->header('Content-Type') ?? 'image/jpeg')
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
