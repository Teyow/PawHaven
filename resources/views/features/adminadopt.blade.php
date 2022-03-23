@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- include('features.adopt') -->

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 accent-color">Adopt a Pet</h1>
            <a href="{{ route('adoption.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Register Pet</a>
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
                                <th>Type</th>
                                <th>Breed</th>
                                <th>Gender</th>
                                <th>Stage</th>
                                <th>Age</th>
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


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('adoption.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'breed',
                        name: 'breed'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'stage',
                        name: 'stage'
                    },
                    {
                        data: 'age',
                        name: 'age'
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

            $(document).on('click', '#adoptedBtn', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: 'Do you want to make this pet be adopted?',
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
                                url: 'http://127.0.0.1:8000/adoption/' + id + '/adopted/success',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    table.ajax.reload();
                                    swal('Adopted!', response.message, 'success');
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


            $(document).on('click', '#cancelBtn', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: 'Do you want to cancel the adoption?',
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
                                url: 'http://127.0.0.1:8000/adoption/' + id + '/adopted/cancel',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    table.ajax.reload();
                                    swal('Adoption Cancelled!', response.message, 'success');
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

            $(document).on('click', '#archiveBtn', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: 'Do you want to archive this pet?',
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
                                url: 'http://127.0.0.1:8000/adoption/' + id + '/adopted/archive',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    table.ajax.reload();
                                    swal('Pet Archived!', response.message, 'success');
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
@endsection
