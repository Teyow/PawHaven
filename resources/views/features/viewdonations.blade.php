@extends('layouts.master')
@section('title', '| View My Donations')

@section('content')

    <div class="container-fluid">
        <div class="back mb-4">
            <a href="{{ route('donate.index') }}" class="text-gray-900" style="text-decoration: none;">
                <i class="fas fa-chevron-left"></i> Back</a>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">View Donations</h1>

            @if (Auth::user()->is_admin == 0)
                <a href="{{ route('donate.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Submit Donation</a>
            @endif

        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                        style="color:#464646 !important">
                        <thead>
                            @if (Auth::user()->is_admin == 0)
                                <tr>
                                    <th>Name</th>
                                    <th>Type of Donation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <input type="text" name="" id="id" value="{{ Auth::user()->id }}" hidden>
                                </tr>
                            @else
                                <tr>
                                    <th>Name</th>
                                    <th>Type of Donation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            @endif

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
                    ajax: "{{ route('donate.alldonations') }}",
                    columns: [{
                            data: 'fullname',
                            name: 'fullname'
                        },
                        {
                            data: 'type',
                            name: 'type'
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
                            text: 'Do you want to approve this donation?',
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
                                    url: 'http://127.0.0.1:8000/donation/approve/' + id,
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
                            text: 'Do you want to disapprove this donation?',
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
                                    url: 'http://127.0.0.1:8000/donation/disapprove/' + id,
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
                var id = $('#id').val();
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "http://127.0.0.1:8000/donate/view/" + id,
                    columns: [{
                            data: 'fullname',
                            name: 'fullname'
                        },
                        {
                            data: 'type',
                            name: 'type'
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


            });
        </script>
    @endif



@endsection
