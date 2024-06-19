<?php

namespace App\Http\Controllers\ProjectOwner;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectWorker;
use App\Traits\AuthorizesProjects;
use App\Http\Controllers\Controller;

class ProjectWorkerController extends Controller
{
    use AuthorizesProjects;
    
    public function index(string $id)
    {
        $project = Project::findOrFail($id);
        $this->authorizeProject($project);

        return view('project-owner.project-workers.index', compact('project'));
    }
}
