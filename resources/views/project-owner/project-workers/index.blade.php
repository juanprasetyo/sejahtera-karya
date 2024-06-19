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
      $('#tblListProjectWorkersPending').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#tblListProjectWorkersAccept').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#tblListProjectWorkersReject').DataTable({
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
    List Pendaftaran Pekerja
  </x-slot>

  <x-slot name="breadcumb">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Project Owner</a></li>
      <li class="breadcrumb-item active">List Project</li>
      <li class="breadcrumb-item active">List Worker</li>
    </ol>
  </x-slot>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @livewire('project-workers', ['projectId' => $project->id])
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</x-admin-layout>