@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card w-100">
                <div class="card-body">
                    <h1 class="fw-bolder">Welcome to {{ getenv('APP_FULL_NAME') }} <i class="ti ti-fingerprint"></i></h1>
                    <span class="text-justify mt-3">
                        What is a Biometric Attendance System? Biometric attendance systems scan fingerprints using a special biometric-capturing scanner to track the daily attendance of employees, staff, and students at schools, colleges, and universities.
                    </span>

                    <a href="{{ route('user.students') }}" class="btn btn-primary w-100 mt-2">Let's Start Entrollment <i class="ti ti-fingerprint"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card w-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <img src="/fud.png" alt="" width="100">
                    </div>
                    <i>
                        <h2 class="fw-bolder">A Case Study of: </h2>
                        <span class="fw-bolder">Federal University Dutse</span> <br />
                        <span class="fw-bolder">(Security Division)</span>
                    </i>
                    
                    <h5 class="fw-bolder pt-3">
                        <span>By: </span>
                        Abdullahi Mujaheed Jido<br />
                        FCP/CCS/20/2011
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection