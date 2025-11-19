<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Show latest activity logs with user info
        $logs = ActivityLog::with('user')->orderByDesc('created_at')->paginate(20);
        return view('admin.logs.index', compact('logs'));
    }
}
