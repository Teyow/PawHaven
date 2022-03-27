@extends('layouts.master')
@section('title', '| Volunteers')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="back">
            <a href="{{ route('volunteer.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back </a>
        </div>


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 accent-color">Volunteers</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                        style="color:#464646 !important">
                        <thead>

                            <tr>
                                @if (Auth::user()->is_admin == 1)
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                @else
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Status</th>
                                @endif
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
                    ajax: "{{ route('volunteers.all') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'full_name',
                            name: 'full_name'
                        },
                        {
                            data: 'program',
                            name: 'program'
                        },
                        {
                            data: 'date_start',
                            name: 'date_start'
                        },
                        {
                            data: 'date_end',
                            name: 'date_end'
                        },
                        {
                            data: 'is_approved',
                            name: 'is_approved'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],

                });

                $(document).on('click', '#verifybtn', function() {
                    var id = $(this).data('id');
                    console.log(id);

                    swal({
                            title: "Are you sure?",
                            text: 'Do you want to approve this volunteer?',
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
                                    url: 'http://127.0.0.1:8000/volunteer/approve/' + id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": id
                                    },

                                    success: function(response) {
                                        table.ajax.reload();
                                        swal('Verified!', response.message, 'success');
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
                $(document).on('click', '#unverifybtn', function() {
                    var id = $(this).data('id');
                    console.log(id);

                    swal({
                            title: "Are you sure?",
                            text: 'Do you want to disapprove this volunteer?',
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
                                    url: 'http://127.0.0.1:8000/volunteer/disapprove/' + id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": id
                                    },

                                    success: function(response) {
                                        table.ajax.reload();
                                        swal('Unverified!', response.message, 'success');
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
                    ajax: "{{ route('volunteers.myprograms') }}",
                    columns: [{
                            data: 'full_name',
                            name: 'full_name'
                        },
                        {
                            data: 'program',
                            name: 'program'
                        },
                        {
                            data: 'date_start',
                            name: 'date_start'
                        },
                        {
                            data: 'date_end',
                            name: 'date_end'
                        },
                        {
                            data: 'is_approved',
                            name: 'is_approved',
                            orderable: false,
                            searchable: false
                        },
                    ],

                });
            });
        </script>
    @endif

@endsection
