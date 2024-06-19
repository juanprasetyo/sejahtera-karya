<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectWorker;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function show($id)
    {
        $data = [
            'project' => Project::with('user')->findOrFail($id),
        ];
        dump($data);
        return view('project.show', $data);
    }

    public function registerWorker($id)
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('project-owner')) {
            return redirect()->back()->with('error', 'You are not allowed to register for this project.');
        }

        $existingRegistration = ProjectWorker::where('user_id', $user->id)->where('project_id', $id)->first();
        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You have already registered for this project.');
        }

        ProjectWorker::create([
            'user_id' => $user->id,
            'project_id' => $id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'You have successfully registered for the project.');
    }
}
