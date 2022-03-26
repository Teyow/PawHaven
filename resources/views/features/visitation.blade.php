@extends('layouts.master')
@section('title', '| Visitation')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Visitation</h1>

            @if (Auth::user()->is_admin != 1)
                <a href="{{ route('visitation.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Schedule a Visit</a>
            @endif
        </div>


        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                        style="color:#464646 !important">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @if (Auth::user()->is_admin == 1)
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('visitation.all') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'user_id',
                            name: 'user_id'
                        },
                        {
                            data: 'start',
                            name: 'start'
                        },
                        {
                            data: 'end',
                            name: 'end'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],

                });

                $(document).on('click', '#approvebtn', function() {
                    var id = $(this).data('id');
                    console.log(id);

                    swal({
                            title: "Are you sure?",
                            text: 'Do you want to approve this schedule?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: 'http://127.0.0.1:8000/visitation/approve/' + id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": id
                                    },

                                    success: function(response) {
                                        table.ajax.reload();
                                        swal('Approved!', response.message, 'success');
                                    },

                                    error: function(response) {
                                        console.log(response)
                                    }

                                });
                            } else {
                                swal("No changes were made!");
                            }

                        });
                });

                $(document).on('click', '#disapprovebtn', function() {
                    var id = $(this).data('id');
                    console.log(id);

                    swal({
                            title: "Are you sure?",
                            text: 'Do you want to disapprove this schedule?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: 'http://127.0.0.1:8000/visitation/disapprove/' + id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": id
                                    },

                                    success: function(response) {
                                        table.ajax.reload();
                                        swal('Dispproved!', response.message, 'success');
                                    },

                                    error: function(response) {
                                        console.log(response)
                                    }

                                });
                            } else {
                                swal("No changes were made!");
                            }

                        });
                });


            });
        </script>
    @else
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('visitation.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'user_id',
                            name: 'user_id'
                        },
                        {
                            data: 'start',
                            name: 'start'
                        },
                        {
                            data: 'end',
                            name: 'end'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],

                });


            });
        </script>
    @endif
@endsection
