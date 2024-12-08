@extends('layouts.app')
@section('title', 'Students')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="fw-bolder mb-3">Manage Students <i class="ti ti-users"></i></h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Student <i class="ti ti-user"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Student <i class="ti ti-users"></i></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addStudentForm">
                                        @csrf <!-- Laravel CSRF Token -->
                                        <div class="mb-3">
                                            <label for="facultyName" class="form-label">Faculty Name</label>
                                            <input type="text" class="form-control" id="facultyName" name="faculty_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deptName" class="form-label">Department Name</label>
                                            <input type="text" class="form-control" id="deptName" name="dept_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="courseName" class="form-label">Course Name</label>
                                            <input type="text" class="form-control" id="courseName" name="course_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="level" class="form-label">Level</label>
                                            <input type="number" class="form-control" id="level" name="level" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regNo" class="form-label">Registration Number</label>
                                            <input type="text" class="form-control" id="regNo" name="reg_no" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" name="full_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="passport" class="form-label">Passport</label>
                                            <input type="file" class="form-control" id="passport" name="passport" accept="image/*" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveStudentBtn">Save changes</button>

                                    <script>
                                        $(document).ready(function () {
                                            $('#saveStudentBtn').on('click', function (e) {
                                                e.preventDefault();
                                                // Get form data
                                                let formData = new FormData($('#addStudentForm')[0]);
                                                // Send AJAX request
                                                $.ajax({
                                                    url: "{{ route('user.students.store') }}",
                                                    type: "POST",
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    beforeSend: function () {
                                                        $('#saveStudentBtn').prop('disabled', true).text('Saving...');
                                                    },
                                                    success: function (response) {
                                                        // Reset form and modal
                                                        $('#addStudentForm')[0].reset();
                                                        $('#exampleModal').modal('hide');
                                                        // Show success message
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Student Added',
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
                                                        $('#saveStudentBtn').prop('disabled', false).text('Save changes');
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
                                <th>Reg No.</th>
                                <th>Faculty</th>
                                <th>Passport</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php  $i = 1; @endphp
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="fw-bolder">{{$student->reg_no}}</td>
                                        <td class="fw-bold">
                                            <span>{{$student->faculty_name}} <br/ ></span>
                                            <span>{{$student->dept_name}} <br/ ></span>
                                            <span>{{$student->course_name}} <br/ ></span>
                                            <span>Level: {{$student->level}}</span>
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ Storage::url($student->passport) }}" alt="Passport" width="50">
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger delete-student" data-id="{{ $student->id }}">Delete <i class="ti ti-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-warning">No user found at the moment.</div>
                                @endforelse

                                <script>
                                    $(document).on('click', '.delete-student', function () {
                                        let studentId = $(this).data('id');
                                        let url = `/user/students/delete/${studentId}`;

                                        // Confirmation dialog using SweetAlert
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "This action cannot be undone!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Perform AJAX request to delete the student
                                                $.ajax({
                                                    url: url,
                                                    type: 'DELETE',
                                                    data: {
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    success: function (response) {
                                                        Swal.fire(
                                                            'Deleted!',
                                                            response.message,
                                                            'success'
                                                        );

                                                        // Remove the student row from the table
                                                        $(`button[data-id="${studentId}"]`).closest('tr').remove();
                                                    },
                                                    error: function (xhr) {
                                                        Swal.fire(
                                                            'Error!',
                                                            'There was a problem deleting the student.',
                                                            'error'
                                                        );
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>

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