@extends('students.layout')
@include('layouts.header')
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add New Student</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="detail" 
                id="inputDetail" 
                placeholder="Detail"></textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- University Dropdown -->
        <div class="mb-3">
            <label for="universitySelect" class="form-label"><strong>Select University:</strong></label>
            <select name="university" id="universitySelect" class="form-control @error('university') is-invalid @enderror">
                <option value="">Choose a university</option>
                <option value="Harvard University">Harvard University</option>
                <option value="Stanford University">Stanford University</option>
                <option value="MIT">MIT</option>
                <option value="University of Oxford">University of Oxford</option>
                <option value="University of Cambridge">University of Cambridge</option>
            </select>
            @error('university')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Upload Image:</strong></label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Submit
        </button>
    </form>

  </div>
</div>

@include('layouts.footer')
@endsection