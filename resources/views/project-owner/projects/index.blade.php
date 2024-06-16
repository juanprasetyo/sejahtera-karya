@push('styles')
  @vite('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')
  @vite('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')
@endpush

@push('scripts')
  @vite('resources/plugins/datatables/jquery.dataTables.min.js')
  @vite('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')
  @vite('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js')
  @vite('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')
  <script type="module">
    $(function () {
      $('#tblListProjects').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush

<x-admin-layout>
  <x-slot name="header">
    List Projects
  </x-slot>

  <x-slot name="breadcumb">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Project Owner</a></li>
      <li class="breadcrumb-item active">List Project</li>
    </ol>
  </x-slot>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h2 class="card-title">Proyek Yang Dimiliki</h2>
          </div>
          <div class="card-body">
            <div class="container">
              <table id="tblListProjects" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Proyek</th>
                    <th class="text-center">Jumlah Pekerja</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $key => $project)
                    <tr>
                      <td class="text-center">{{ $key + 1 }}</td>
                      <td>{{ $project->name }}</td>
                      <td class="text-center">{{ $project->workers_needed }}</td>
                      <td class="text-center">
                        <span class="badge badge-pill {{ $project->status == 'open' ? 'badge-success' : 'badge-danger'}}">{{ $project->status }}</span>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('project-owner.projects.show', $project->id) }}" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-success">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</x-admin-layout>