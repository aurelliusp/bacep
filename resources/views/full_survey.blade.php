@extends('full_approval')

@section('judul_halaman', 'Table Survey Full Approval')


@section('konten')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="card-title">Table Full Approval Survey</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Permit</th>
                                <th>Visitor Name</th>
                                <th>Visitor Company</th>
                                <th>Purpose Work</th>
                                <th>Status</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{$num = 1}}
                            @foreach($surveyFull as $p)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $p->survey_id }}</td>
                                    <td>{{ $p->visitor_name }}</td>
                                    <td>{{ $p->visitor_company }}</td>
                                    <td>{{ $p->purpose_work }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td><a href="{{ $p->link }}">PDF</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{--
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- page script -->
<script>
$(function () {
$("#example1").DataTable({
  "responsive": true,
  "autoWidth": true,
});
$('#example2').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  "responsive": true,
});
});
</script> --}}

@endsection
