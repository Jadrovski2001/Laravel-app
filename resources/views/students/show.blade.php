@extends('students.layout')
@include('layouts.header')

@section('content')

<style>
    .text-mirror-shadow {
        color: #007bff; /* Bootstrap primary blue */
        font-size: 2.5rem;
        text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); /* Stronger shadow */
        position: relative;
        display: inline-block;
        -webkit-box-reflect: below 10px linear-gradient(transparent, rgba(0, 0, 0, 0.4)); /* Stronger reflection */
    }
</style>

<div class="card mt-5">
  <h2 class="card-header text-mirror-shadow">Show Student</h2> <!-- Stronger shadow & reflection -->
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row text-danger">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="">Name:</strong> <br/>
                {{ $student->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Details:</strong> <br/>
                {{ $student->detail }}
            </div>
        </div>

        <!-- Display Image -->
        @if($student->image)
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Image:</strong> <br/>
                    <!-- Correct image path for public storage -->
                    <img src="{{ asset('images/' . $student->image) }}" width="150" alt="Student Image">
                </div>
            </div>
        @else
            <p>No image available.</p>
        @endif
    </div>
  
  </div>
</div>

@include('layouts.footer')

@endsection