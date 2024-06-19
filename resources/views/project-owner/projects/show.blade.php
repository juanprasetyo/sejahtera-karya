<x-admin-layout>
  <x-slot name="header">
    Detail Project
  </x-slot>

  <x-slot name="breadcumb">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Project Owner</a></li>
      <li class="breadcrumb-item active">Detail Project</li>
    </ol>
  </x-slot>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ Vite::asset('resources/images/user4-128x128.jpg') }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $project->name }}</h3>

            <p class="text-muted text-center">{{ $project->user->name}}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Deskripsi</b>
                <p>{{ $project->description }}</p>
              </li>
              <li class="list-group-item">
                <p>
                  <i class="fas fa-map-marker-alt"></i>
                  <b>Lokasi</b>
                </p>
                <p>{{ ucwords($project->village->name) . ', ' . ucwords($project->subdistrict->name) . ', ' . ucwords($project->district->name) . ', ' . ucwords($project->province->name) }}<p>
              </li>
              <li class="list-group-item">
                <p>
                  <i class="fas fa-money-bill-wave"></i>
                  <b>Gaji</b>
                </p>
                <p>Rp {{ number_format($project->salary, 2, ',', '.') }}</p>
              </li>
              <li class="list-group-item">
                <p>
                  <i class="fas fa-clock"></i>
                  <b>Jam Kerja</b>
                </p>
                <p>{{ $project->start_time . ' - ' . $project->end_time . ' WIB' }}</p>
              </li>
              <li class="list-group-item">
                <p>
                  <i class="fas fa-calendar-alt"></i>
                  <b>Tanggal Proyek</b>
                </p>
                <p>{{ $project->start_date . ' - ' . $project->end_date }}</p>
              </li>
              <li class="list-group-item">
                <p>
                  <i class="fas fa-users"></i>
                  <b>Jumlah Pekerja Dibutuhkan</b>
                </p>
                <p>{{ $project->workers_needed }} Orang</p>
              </li>
            </ul>

            <a href="{{ route('project-owner.project.workers', $project->id) }}" class="btn btn-primary btn-block"><b>Cek Pendaftar</b></a>
            <x-button-back :fallbackUrl="route('project-owner.projects.index')">
              Kembali
            </x-back-button>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</x-admin-layout>