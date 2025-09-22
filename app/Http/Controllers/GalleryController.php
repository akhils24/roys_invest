<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
	/**
	 * Public gallery page: lists all images.
	 */
	public function index()
	{
		$files = Storage::disk('public')->files('gallery');

		$images = collect($files)
			->filter(function ($path) {
				$ext = Str::lower(pathinfo($path, PATHINFO_EXTENSION));
				return in_array($ext, ['jpg', 'jpeg', 'png', 'webp']);
			})
			->map(function ($path) {
				return [
					'path' => $path,
					'url' => asset('storage/' . $path),
					'name' => basename($path),
				];
			})
			->values();

		return view('gallery', compact('images'));
	}

	/**
	 * Admin gallery page: upload + delete UI.
	 */
	public function adminIndex()
	{
		$files = Storage::disk('public')->files('gallery');

		$images = collect($files)
			->filter(function ($path) {
				$ext = Str::lower(pathinfo($path, PATHINFO_EXTENSION));
				return in_array($ext, ['jpg', 'jpeg', 'png', 'webp']);
			})
			->map(function ($path) {
				return [
					'path' => $path,
					'url' => asset('storage/' . $path),
					'name' => basename($path),
				];
			})
			->values();

		return view('admin.gallery', compact('images'));
	}

	/**
	 * Handle image upload to storage/app/public/gallery.
	 */
	public function upload(Request $request)
	{
		$request->validate([
			'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
		]);

		$request->file('image')->store('gallery', 'public');

		return redirect()
			->back()
			->with('success', 'Image uploaded successfully.');
	}

	/**
	 * Delete an image from storage.
	 */
	public function destroy(Request $request)
	{
		$request->validate([
			'path' => 'required|string',
		]);

		$path = $request->input('path');

		// Safety: only allow deleting files inside gallery/
		if (!Str::startsWith($path, 'gallery/')) {
			return redirect()->back()->with('success', 'Invalid file path.');
		}

		if (Storage::disk('public')->exists($path)) {
			Storage::disk('public')->delete($path);
			return redirect()->back()->with('success', 'Image deleted successfully.');
		}

		return redirect()->back()->with('success', 'File not found.');
	}
}


