<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Project Detail') }}
      </h2>

  </x-slot>

  <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-10">
        <div class="card w-4/12 bg-white">
          <div class="card-body flex-none flex-col items-center">
            <h2 class="card-title flex">Owner</h2>
            <div class="avatar my-5">
              <div class="w-24 rounded-full">
                <img src="{{ $project->user->profile_photo_url }}" />
              </div>
            </div>
            <p class="mt-5">
              <i class="fas fa-user-alt"></i>
              {{ ucwords($project->user->name) }}
            </p>
            <div class="divider my-0"></div>
            <p class="">
              <i class="fas fa-map-marker-alt"></i>
              {{ ucwords(strtolower($project->village->name)) . ', ' .  ucwords(strtolower($project->subdistrict->name)) }}
            </p>
          </div>
        </div>
        <div class="card w-8/12 bg-white">
          <div class="card-body">
            <h2 class="card-title">{{ $project->name }}</h2>
            <p>{{ $project->description }}</p>
            <p class="mt-5">
              <i class="fas fa-map-marker-alt"></i>
              {{ ucwords(strtolower($project->village->name)) . ', ' .  ucwords(strtolower($project->subdistrict->name)) . ', ' .  ucwords(strtolower($project->district->name)) }}
            </p>
            <p class="mt-2.5">
              <i class="fas fa-users"></i>
              {{ 'Jumlah pekerja dibutuhkan  ' . $project->workers_needed . ' orang' }}
            </p>
            <p class="mt-2.5">
              <i class="fas fa-money-bill-wave"></i>
              {{ 'Gaji Rp ' . number_format($project->salary, 2, ',', '.')  }}
            </p>
            <p class="text-center mt-3 font-bold">Waktu Kerja</p>
            <div class="flex w-full mt-3">
              <div class="grid py-5 w-1/2 card bg-base-300 rounded-box place-items-center">
                <p>Tanggal</p>
                <p>
                  {{ $project->start_date . ' - ' . $project->end_date }}
                </p>
              </div>
              <div class="divider divider-horizontal"></div>
              <div class="grid py-5 w-1/2 card bg-base-300 rounded-box place-items-center">
                <p>Jam</p>
                <p>
                  {{ $project->start_time . ' - ' . $project->end_time . ' WIB' }}
                </p>
              </div>
            </div>
            <div class="card-actions mt-5 justify-end">
              <x-button-back :fallbackUrl="route('dashboard')">
                Kembali
              </x-button-back>
              @if (!Auth::user()->hasRole('admin') && !Auth::user()->hasRole('project-owner'))
                <form action="{{ route('project.register', $project->id) }}" method="POST" class="inline-block">
                  @csrf
                  <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
              @endif
            </div>
          </div>
        </div>
      </div>
  </div>
</x-app-layout>
