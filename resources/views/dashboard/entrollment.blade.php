@extends('layouts.app')
@section('title', 'Entrollment')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="fw-bolder mb-3">Entroll a Student/Staff <i class="ti ti-users"></i></h2>
                    <div class="row">    
                        <div class="col-md-5">
                            <form action="">
                                <div class="mb-2">
                                    <label for="">Choose an Entrollee Type:</label>
                                    <select name="entrollee_type" id="entrollee_type" style="width: 100%">
                                        <option value="">Chooose</option>
                                        <option value="">Student</option>
                                        <option value="">Staff</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label for="">Choose an Entrollee :</label>
                                    <select name="entrollee" id="entrollee" style="width: 100%">
                                        <option value="">Chooose</option>
                                        <option value="">FCP/CCS/20/2009 [Student]</option>
                                    </select>
                                </div>
                                
                            </form>
                            <div>
                                <button type="submit" class="btn btn-primary w-100">Start Entrollment <i class="ti ti-fingerprint"></i></button>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <i class="ti ti-fingerprint me-2" style="font-size: 1.5rem;"></i>
                                <div>
                                    <strong>Guidance on Fingerprint Enrollment:</strong> 
                                    Please ensure your fingers are clean and dry before starting the enrollment process. 
                                    Follow the on-screen instructions carefully and place your finger firmly on the scanner 
                                    when prompted. This process ensures accurate recognition. 
                                    <em>For assistance, contact our support team.</em>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <h3 class="text-center fw-bolder">Lists of Entrollments <i class="ti ti-fingerprint"></i></h3>
                        <div class="table-responsive mt-2">
                            <table  id="table_id" class="table table-bordered">
                                <thead>
                                    <th>S/N</th>
                                    <th>Username/Reg No.</th>
                                    <th>Statuses</th>
                                    <th>Entrolled By</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="fw-bolder">
                                            FCP/CCS/20/2009
                                        </td>

                                        <td class="text-center">
                                            <span class="badge bg-success fw-bolder">Enrolled</span>
                                        </td>
                                        <td>
                                            FUD/SE/4554
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
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
    </div>
    
    <script>
        $( '#entrollee_type' ).select2( {
            theme: 'bootstrap-5'
        });
         $( '#entrollee' ).select2( {
            theme: 'bootstrap-5'
        });
    </script>
@endsection