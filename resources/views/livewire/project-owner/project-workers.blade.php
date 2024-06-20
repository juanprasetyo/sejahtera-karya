<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="list-project-workers-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="list-project-workers-pending-tab" data-toggle="pill" href="#list-project-workers-pending" role="tab" aria-controls="list-project-workers-pending" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="list-project-workers-accept-tab" data-toggle="pill" href="#list-project-workers-accept" role="tab" aria-controls="list-project-workers-accept" aria-selected="false">Accept</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="list-project-workers-reject-tab" data-toggle="pill" href="#list-project-workers-reject" role="tab" aria-controls="list-project-workers-reject" aria-selected="false">Reject</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="list-project-workers-tabContent">
            <div class="tab-pane fade show active" id="list-project-workers-pending" role="tabpanel" aria-labelledby="list-project-workers-pending-tab">
                <table id="tblListProjectWorkersPending" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Proyek</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Submit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectWorkersPending as $key => $worker)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $worker->user->name }}</td>
                                <td class="text-center">
                                    <select wire:change="setWorkerStatus({{ $worker->id }}, $event.target.value)" wire:init="initStatus('{{ $worker->status }}')" wire:key="{{ $worker->id }}">
                                        @foreach (['pending', 'accept', 'reject'] as $statusOption)
                                            <option value="{{ $statusOption }}" {{ $worker->status === $statusOption ? 'selected' : '' }}>{{ ucfirst($statusOption) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">{{ $worker->created_at }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary">Profile User</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="list-project-workers-accept" role="tabpanel" aria-labelledby="list-project-workers-accept-tab">
                <table id="tblListProjectWorkersAccept" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Proyek</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Submit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectWorkersAccept as $key => $worker)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $worker->user->name }}</td>
                                <td class="text-center">
                                    <select wire:change="setWorkerStatus({{ $worker->id }}, $event.target.value)" wire:init="initStatus('{{ $worker->status }}')" wire:key="{{ $worker->id }}">
                                        @foreach (['pending', 'accept', 'reject'] as $statusOption)
                                            <option value="{{ $statusOption }}" {{ $worker->status === $statusOption ? 'selected' : '' }}>{{ ucfirst($statusOption) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">{{ $worker->created_at }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary">Profile User</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="list-project-workers-reject" role="tabpanel" aria-labelledby="list-project-workers-reject-tab">
                <table id="tblListProjectWorkersReject" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Proyek</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Submit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectWorkersReject as $key => $worker)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $worker->user->name }}</td>
                                <td class="text-center">
                                    <select wire:change="setWorkerStatus({{ $worker->id }}, $event.target.value)" wire:init="initStatus('{{ $worker->status }}')" wire:key="{{ $worker->id }}">
                                        @foreach (['pending', 'accept', 'reject'] as $statusOption)
                                            <option value="{{ $statusOption }}" {{ $worker->status === $statusOption ? 'selected' : '' }}>{{ ucfirst($statusOption) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">{{ $worker->created_at }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary">Profile User</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <x-button-back :fallbackUrl="route('project-owner.projects.index')">
            Kembali
        </x-button-back>
    </div>
</div>
