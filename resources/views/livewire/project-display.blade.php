<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-5">
    @if($projects->isNotEmpty())
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
    @else
        <div class="col-span-3 flex flex-col justify-center items-center min-h-full">
            <p class="w-fit mb-4">Tidak ada proyek di {{ $locationLabel }} Anda.</p>
            @if($locationLevel === 'village')
                <button wire:click="setProjectSubdistrict" class="btn btn-secondary w-fit">Lihat di Tingkat Kecamatan</button>
            @elseif($locationLevel === 'subdistrict')
                <button wire:click="setProjectDistrict" class="btn btn-secondary w-fit">Lihat di Tingkat Kabupaten</button>
            @elseif($locationLevel === 'district')
                <button wire:click="setProjectProvince" class="btn btn-secondary w-fit">Lihat di Tingkat Provinsi</button>
            @endif
        </div>
    @endif
</div>