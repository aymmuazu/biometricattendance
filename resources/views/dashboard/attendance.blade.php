@extends('layouts.app')
@section('title', 'Attendance')
@section('content')
    <div class="row">
        <div class="col-md d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="">
                        <h2 class="fw-bolder mb-4">Manage Attendances</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center border-dark mb-3">
                                    <div class="card-body text-dark border-primary" style="border: 4px solid; border-radius: 10px;">
                                        <h1 class="fw-bolder">(0)</h1>
                                        <h5 class="fw-bolder">Today(s) Attendance <i class="ti ti-fingerprint"></i></h5>
                                        <a href="" class="btn btn-primary">View <i class="ti ti-fingerprint"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-dark mb-3">
                                    <div class="card-body text-dark border-primary" style="border: 4px solid; border-radius: 10px;">
                                        <div class="text-center">
                                            <h1 class="fw-bolder">(1,000)</h1>
                                            <h5 class="fw-bolder">All Attendances <i class="ti ti-fingerprint"></i></h5>
                                        </div>
                                        <form action="" class="text-left">
                                            <div class="mb-2">
                                                <label for="">Starting Date:</label>
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">Ending Date:</label>
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">View <i class="ti ti-fingerprint"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card text-center border-dark mb-3">
                                    <div class="card-body text-dark border-primary" style="border: 4px solid; border-radius: 10px;">
                                        <h2 class="fw-bolder">Take Attendance <i class="ti ti-fingerprint"></i></h2>
                                        <a href="" class="btn btn-primary">Take <i class="ti ti-fingerprint"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection