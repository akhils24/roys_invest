<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\testimonials;

class GoogleReviewController extends Controller
{
    public function syncReviews()
    {
        $placeId = config('services.google.place_id');
        $apiKey  = config('services.google.api_key');

        if (!$placeId || !$apiKey) {
            Log::error('Google API credentials missing.');
            return ['reviews' => [], 'provider_url' => null];
        }

        $lockKey = 'google_review_sync_lock';
        if (Cache::has($lockKey)) {
            return;
        }
        try {
            $resp = Http::timeout(10)->get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => $placeId,
                'fields'   => 'name,rating,reviews,user_ratings_total,url',
                'key'      => $apiKey,
            ]);
            if ($resp->failed()) {
                Log::warning('Google Places API request failed');
                return;
            }
            $Reviews = $resp->json()['result']['reviews'] ?? [];
            foreach ($Reviews as $r) {
                $googleId = md5(($r['author_name'] ?? '') .($r['time'] ?? '') .($r['text'] ?? ''));
                if(testimonials::where('google_review_id', $googleId)->exists()){
                    continue;
                }
                $ProxyPhoto = !empty($r['profile_photo_url']) ? route('proxy.image', ['url' => $r['profile_photo_url']]) : null;
                testimonials::create([
                    'google_review_id' => $googleId,
                    'author_name' => $r['author_name'] ?? 'Anonymous',
                    'rating' => $r['rating'] ?? 0,
                    'text' => $r['text'] ?? '',
                    'profile_photo_url' => $ProxyPhoto,
                    'google_relative_time' => $r['relative_time_description'] ?? null,
                    'source' => 'google'
                ]);
            }
            Cache::put($lockKey, true, now()->addDays(5));
        } catch (\Throwable $e) {
            Log::error('Google Review Fetch Error: ' . $e->getMessage());
        }
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
