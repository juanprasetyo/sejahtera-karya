<?php

namespace App\Traits;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

trait AuthorizesProjects
{
    protected function authorizeProject(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
