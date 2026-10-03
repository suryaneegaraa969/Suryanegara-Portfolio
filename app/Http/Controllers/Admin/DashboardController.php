<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileData;
use App\Models\PortfolioProject;
use App\Models\Certification;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects_count' => PortfolioProject::count(),
            'certifications_count' => Certification::count(),
            'messages_count' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}