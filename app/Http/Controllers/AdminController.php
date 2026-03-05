<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GoogleReviewController;
use App\Models\blog;
use App\Models\contact;
use App\Models\service;
use App\Models\subservice;

class AdminController extends Controller
{
    public function index()
    {
        app(GoogleReviewController::class)->syncReviews();
        $stats=[
            'blogsCount' => blog::where('status', 1)->count(),
            'servicesCount' => service::where('status', 1)->count(),
            'subservicesCount' => subservice::where('status', 1)->count(),
            'contactsCount' => contact::count()
        ];
        $contacts = contact::orderBy('created_at', 'desc')->get();
        return view('admin.dash',compact('stats', 'contacts'));
    }
}
