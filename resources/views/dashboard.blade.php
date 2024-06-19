<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-5">
            @foreach ($projects as $project)
                <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->name }}</h2>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ ucwords(strtolower($project->village->name)) . ', ' .  ucwords(strtolower($project->subdistrict->name)) }}
                        </p>
                        <p>
                            <i class="fas fa-users"></i>
                            {{ $project->workers_needed . ' orang' }}
                        </p>
                        <div class="card-actions justify-end">
                            <a href="{{ route('project.detail', $project->id) }}" class="btn btn-primary">Detail</a>
                            @if (!Auth::user()->hasRole('admin') && !Auth::user()->hasRole('project-owner'))
                                <form action="{{ route('project.register', $project->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success text-white">Daftar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-3 mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="toast toast-top toast-end">
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
                <button class="close-btn" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="toast toast-top toast-end">
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
                <button class="close-btn flex flex-col items-start" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
        </div>
    @endif
</x-app-layout>
