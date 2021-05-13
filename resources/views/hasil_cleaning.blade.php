@extends('approval')

@section('judul_halaman', 'Table Approval Cleaning')
        {{ csrf_field() }}

@section('konten')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Permit</th>
                                    <th>Date of Request</th>
                                    <th>Visitor Name1</th>
                                    <th>Visitor Name2</th>
                                    <th>Purpose of Work</th>
                                    <th>Action</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cleaning as $p)
                                    <tr>
                                        <td>{{ $p->cleaning_id }}</td>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->cleaning_name_1 }}</td>
                                        <td>{{ $p->cleaning_name_2 }}</td>
                                        <td>{{ $p->cleaning_work }}</td>
                                        @if(Auth::user()->role != 'security')
                                        <td>
                                            <a href="javascript:void(0)" id="ok" class="approve" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                            <a href="javascript:void(0)" id="not" class="reject" data-cleaning_id="{{$p->cleaning_id}}">Reject</a>
                                            <a href="/detail_cleaning/{{$p->cleaning_id}}">History</a></td>
                                        @else<td>
                                            <a href="javascript:void(0)" id="ok" class="approve" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                            <a href="/detail_cleaning/{{$p->cleaning_id}}">History</a></td>
                                        @endif
                                        <td><a href="/cleaning_pdf/{{$p->cleaning_id}}" class="btn btn-primary" target="_blank">LIHAT PDF</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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


        $(document).on('click', '.approve', function(event){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                        $('#ok').click(function () {
                            return false;
                        });
                    let cleaning_id = $(this).data('cleaning_id');
                    console.log(cleaning_id);
                    $.ajax({
                        type:'POST',
                        url:"{{url('approve_cleaning')}}",
                        data: {cleaning_id},
                        error: function (request, error) {
                            alert(" Can't do because: " + error);
                        },
                        success:function(data){
                            console.log(data);
                            if(data.status == 'SUCCESS'){
                                    Swal.fire(
                                    'Approved!',
                                    'The form has been approved.',
                                    'success'
                                    ).then(function(){
                                        location.reload();
                                    })
                            }else if(data.status == 'FAILED'){
                                Swal.fire({
                                    title: "Failed!",
                                    text: 'Failed to Reject',
                                }).then(function(){
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.reject', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            Swal.fire({
                title: 'Are you sure want to reject?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#not').click(function () {
                            return false;
                        });
                    let cleaning_id = $(this).data('cleaning_id');
                    console.log(cleaning_id);
                    $.ajax({
                        type:'POST',
                        url:"{{url('cleaning_reject')}}",
                        data: {cleaning_id},
                        error: function (request, error) {
                            alert(" Can't do because: " + error);
                        },
                        success:function(data){
                            console.log(data);
                            if(data.status == 'SUCCESS'){
                                    Swal.fire(
                                    'Rejected!',
                                    'The form has been rejected.',
                                    'success'
                                    ).then(function(){
                                        location.reload();
                                    })
                            }else if(data.status == 'FAILED'){
                                Swal.fire({
                                    title: "Failed!",
                                    text: 'Failed to Reject',
                                }).then(function(){
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });

//         var lnk = document.getElementById('ok');

// if (window.addEventListener) {
//     document.addEventListener('click', function (e) {
//         if (e.target.name === 'ok') {
//             e.preventDefault();         // Comment this line to enable the link tag again.
//         }
//     });
// }
//         function clickAndDisable(link) {
//      // disable subsequent clicks
//      link.onclick = function(event) {
//         event.preventDefault();
//      }
//    }
        </script>

    </section>
    @endsection


