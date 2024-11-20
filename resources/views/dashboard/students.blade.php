@extends('layouts.app')
@section('title', 'Students')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="fw-bolder mb-3">Manage Students <i class="ti ti-users"></i></h2>
                    <a href="" class="btn btn-primary fw-bolder">Add Student <i class="ti ti-user"></i></a>


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
                                <tr>
                                    <td>1</td>
                                    <td class="fw-bolder">FCP/CCS/20/2009</td>
                                    <td class="fw-bold">
                                        <span>Faculty of Computing <br/ ></span>
                                        <span>Department of Cyber Security <br/ ></span>
                                        <span>B.Sc. Cyber Security <br/ ></span>
                                        <span>Level: 400</span>
                                    </td>
                                    <td class="text-center">
                                        <img src="/test.jpg" alt="" width="50">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">Edit <i class="ti ti-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger">Delete <i class="ti ti-trash"></i></a>
                                    </td>
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