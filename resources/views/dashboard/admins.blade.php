@extends('layouts.app')
@section('title', 'Admins')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="fw-bolder mb-3">Manage Admins <i class="ti ti-users"></i></h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Admin <i class="ti ti-user"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bolder" id="exampleModalLabel">Add Admin <i class="ti ti-users"></i></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addadminForm">
                                        @csrf <!-- Laravel CSRF Token -->
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" name="full_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveadminBtn">Save changes</button>

                                    <script>
                                        $(document).ready(function () {
                                            $('#saveadminBtn').on('click', function (e) {
                                                e.preventDefault();
                                                // Get form data
                                                let formData = new FormData($('#addadminForm')[0]);
                                                // Send AJAX request
                                                $.ajax({
                                                    url: "{{ route('user.admins.store') }}",
                                                    type: "POST",
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    beforeSend: function () {
                                                        $('#saveadminBtn').prop('disabled', true).text('Saving...');
                                                    },
                                                    success: function (response) {
                                                        // Reset form and modal
                                                        $('#addadminForm')[0].reset();
                                                        $('#exampleModal').modal('hide');
                                                        // Show success message
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Admin Added',
                                                            text: response.message,
                                                        });

                                                        setTimeout(() => {
                                                            location.reload();
                                                        }, 1000);
                                                    },
                                                    error: function (xhr) {
                                                        let errors = xhr.responseJSON.errors || { message: "An error occurred!" };
                                                        let errorMessage = Object.values(errors).flat().join('\n');

                                                        // Show error message
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: errorMessage,
                                                        });
                                                    },
                                                    complete: function () {
                                                        $('#saveadminBtn').prop('disabled', false).text('Save changes');
                                                    }
                                                });
                                            });
                                        });

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table  id="table_id" class="table table-bordered">
                            <thead>
                                <th>S/N</th>
                                <th>Username</th>
                                <th>Name</th>
                            </thead>
                            <tbody>
                                @php  $i = 1; @endphp
                                @forelse ($admins as $user)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td class="fw-bolder">{{$user->username}}</td>
                                        <td class="fw-bolder"> {{$user->name}} </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-warning">No user found at the moment.</div>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(document).ready( function () {
                            $('#table_id').DataTable({
                                "ordering": false
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection