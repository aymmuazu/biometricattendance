@extends('layouts.app')
@section('title', 'Admins')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="fw-bolder mb-3">Manage Admins <i class="ti ti-users"></i></h2>
                    <a href="" class="btn btn-primary fw-bolder">Add Admins <i class="ti ti-user"></i></a>


                    <div class="table-responsive mt-2">
                        <table  id="table_id" class="table table-bordered">
                            <thead>
                                <th>S/N</th>
                                <th>Username</th>
                                <th>Full Name</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="fw-bolder">FCP/SEC/2923</td>
                                    <td>Abdurrahim Yahya Muazu</td>
                                </tr>
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