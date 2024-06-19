<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin() {
        return view('project-owner.dashboard');
    }

    public function projectOwner() {
        $data = [
            'projectsCount' => Project::where('user_id', Auth::id())->get()->count(),
        ];

        return view('project-owner.dashboard', $data);
    }

    public function worker() {
        // $projects = Project::where('village_id', Auth::user()->village_id)->get();
        $data = [
            'projects' => Project::with('subdistrict', 'village')->paginate(9),
        ];

        return view('dashboard', $data);
    }
}
