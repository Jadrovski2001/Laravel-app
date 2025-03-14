@extends('universities.layout')
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
  <h2 class="card-header text-mirror-shadow">Add New University</h2> <!-- Stronger shadow & reflection -->
  <div class="card-body">
  
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('universities.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
  
    <form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- University Name -->
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                value="{{ old('name') }}" 
                placeholder="University Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address Field (Fixed from 'detail') -->
        <div class="mb-3">
            <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
            <textarea 
                class="form-control @error('address') is-invalid @enderror" 
                style="height:150px" 
                name="address" 
                id="inputAddress" 
                placeholder="University Address">{{ old('address') }}</textarea>
            @error('address')
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

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Submit
        </button>
    </form>

  </div>
</div>

@include('layouts.footer')
@endsection
s