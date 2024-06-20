<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProjectWorker;
use Illuminate\Support\Facades\Log;

class ProjectWorkers extends Component
{
    public $projectId;
    public $projectWorkersPending;
    public $projectWorkersAccept;
    public $projectWorkersReject;

    public $workerStatus;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->loadWorkers();
    }

    public function initStatus($workerStatus)
    {
        $this->workerStatus = $workerStatus;
    }

    public function loadWorkers()
    {
        $workers = ProjectWorker::where('project_id', $this->projectId)
            ->with('user')
            ->get()
            ->groupBy('status');

        $this->projectWorkersPending = $workers->get('pending', collect());
        $this->projectWorkersAccept = $workers->get('accept', collect());
        $this->projectWorkersReject = $workers->get('reject', collect());
    }

    public function setWorkerStatus($workerId, $workerStatus)
    {
        $worker = ProjectWorker::findOrFail($workerId);
        $worker->update(['status' => $workerStatus]);

        $this->loadWorkers();
    }

    public function render()
    {
        return view('livewire.project-owner.project-workers');
    }
}
