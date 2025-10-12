<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatGallery;
use App\Models\GalleryImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /* ========================= FRONTEND GALLERY ========================= */
    
    /**
     * Display featured images on homepage (priority 1-10 only)
     */
    public function frontendGallery()
    {
        $gallery_images = GalleryImage::with('category')
            ->where('is_active', true)
            ->whereBetween('priority', [1, 10])
            ->orderBy('priority')
            ->get();
            
        return view('users.index', compact('gallery_images'));
    }

    /**
     * Display all active images in detailed gallery page (grouped by category)
     */
    public function galleryDetailed()
    {
        $categories = CatGallery::with(['images' => function($query) {
                $query->where('is_active', true)
                      ->orderBy('priority');
            }])
            ->whereHas('images', function($query) {
                $query->where('is_active', true);
            })
            ->orderBy('display_order')
            ->get();
            
        return view('users.gallerydetailed', compact('categories'));
    }

    /* ========================= CATEGORY MANAGEMENT ========================= */

    /**
     * Display all categories in admin panel
     */
    public function catGallery()
    {
        $categories = CatGallery::orderBy('display_order')->get();
        return view('admin.cat_gallery', compact('categories'));
    }

    /**
     * Show form to add new category
     */
    public function addGalleryCategory()
    {
        return view('admin.add_gallery_category');
    }

    /**
     * Store new category with unique display order validation
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:cat_galleries,name',
            'display_order' => 'required|integer|min:0|unique:cat_galleries,display_order',
            'is_active' => 'required|boolean',
        ]);

        CatGallery::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'display_order' => $request->display_order,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.cat_gallery')->with('success', 'Category added successfully!');
    }

    /**
     * Toggle category active/inactive status
     */
    public function toggleCategory($id)
    {
        $category = CatGallery::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();

        return back()->with('success', 'Category status updated.');
    }

    /**
     * Show form to edit existing category
     */
    public function editCategory($id)
    {
        $category = CatGallery::findOrFail($id);
        return view('admin.edit_gallery_category', compact('category'));
    }

    /**
     * Update existing category with unique validation
     */
    public function updateCategory(Request $request, $id)
    {
        $category = CatGallery::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:cat_galleries,name,' . $id,
            'display_order' => 'required|integer|min:0|unique:cat_galleries,display_order,' . $id,
            'is_active' => 'required|boolean',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'display_order' => $request->display_order,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.cat_gallery')->with('success', 'Category updated successfully!');
    }

    /* ========================= IMAGE MANAGEMENT ========================= */

    /**
     * Display all images in admin panel
     */
    public function gallery()
    {
        $gallery_images = GalleryImage::with('category')->orderBy('priority')->get();
        return view('admin.gallery', compact('gallery_images'));
    }

    /**
     * Show form to add new image
     */
    public function addGallery()
    {
        $categories = CatGallery::where('is_active', true)
            ->orderBy('display_order')
            ->get();
            
        return view('admin.addgallery', compact('categories'));
    }

    /**
     * Store new image with priority validation
     * - Priorities 1-10: Unique across all categories
     * - Priorities 11+: Unique within same category
     */
    public function storeImage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:cat_galleries,id',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        // Validate priority 1-10 uniqueness across all categories
        if ($request->priority <= 10) {
            $existingPriority = GalleryImage::where('priority', $request->priority)
                ->where('priority', '<=', 10)
                ->first();

            if ($existingPriority) {
                return back()->withErrors(['priority' => "Priority {$request->priority} is already taken. Priorities 1-10 must be unique across all categories."])->withInput();
            }
        }

        // Validate priority 11+ uniqueness within same category
        if ($request->priority > 10) {
            $existingImage = GalleryImage::where('category_id', $request->category_id)
                ->where('priority', $request->priority)
                ->first();

            if ($existingImage) {
                return back()->withErrors(['priority' => 'This priority is already taken in the selected category.'])->withInput();
            }
        }

        // Store image file
        $path = $request->file('image_file')->store('uploads/gallery', 'public');

        // Create image record
        GalleryImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'category_id' => $request->category_id,
            'priority' => $request->priority,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Image added successfully!');
    }

    /**
     * Toggle image active/inactive status
     * - Deactivated images get priority -1 (frees up the priority)
     * - Activated images get default priority 11
     */
    public function toggleImage($id)
    {
        $image = GalleryImage::findOrFail($id);
        
        if ($image->is_active) {
            // Deactivate: Free up priority by setting to -1
            $image->is_active = false;
            $image->priority = -1;
            $message = 'Image deactivated!';
        } else {
            // Activate: Set to default gallery-only priority
            $image->is_active = true;
            $image->priority = 11;
            $message = 'Image activated with default priority!';
        }
        
        $image->save();

        return back()->with('success', $message);
    }

    /**
     * Show form to edit existing image
     */
    public function editImage($id)
    {
        $image = GalleryImage::findOrFail($id);
        $categories = CatGallery::where('is_active', true)
            ->orderBy('display_order')
            ->get();
            
        return view('admin.edit_gallery_image', compact('image', 'categories'));
    }

    /**
     * Update existing image with priority validation
     */
    public function updateImage(Request $request, $id)
    {
        $image = GalleryImage::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:cat_galleries,id',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        // Validate priority 1-10 uniqueness (excluding current image)
        if ($request->priority <= 10) {
            $existingPriority = GalleryImage::where('priority', $request->priority)
                ->where('priority', '<=', 10)
                ->where('id', '!=', $id)
                ->first();

            if ($existingPriority) {
                return back()->withErrors(['priority' => "Priority {$request->priority} is already taken by '{$existingPriority->title}'. Priorities 1-10 must be unique across all categories."])->withInput();
            }
        }

        // Validate priority 11+ uniqueness when category changes
        if ($request->priority > 10 || $request->category_id != $image->category_id) {
            $existingImage = GalleryImage::where('category_id', $request->category_id)
                ->where('priority', $request->priority)
                ->where('id', '!=', $id)
                ->first();

            if ($existingImage) {
                return back()->withErrors(['priority' => "This priority is already taken by '{$existingImage->title}' in the selected category."])->withInput();
            }
        }

        // Prepare update data
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'priority' => $request->priority,
            'is_active' => $request->is_active,
        ];

        // Handle new image upload if provided
        if ($request->hasFile('image_file')) {
            // Delete old image file
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            
            // Store new image
            $path = $request->file('image_file')->store('uploads/gallery', 'public');
            $data['image_path'] = $path;
        }

        $image->update($data);

        return redirect()->route('admin.gallery')->with('success', 'Image updated successfully!');
    }
}