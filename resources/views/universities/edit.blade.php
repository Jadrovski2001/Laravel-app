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
  <h2 class="card-header text-mirror-shadow">Edit University</h2> <!-- Stronger shadow & reflection -->
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('universities.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('universities.update', $university->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $university->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
            <textarea 
                class="form-control @error('address') is-invalid @enderror" 
                style="height:150px" 
                name="address" 
                id="inputAddress" 
                placeholder="Address">{{ $university->address }}</textarea>
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Display Current Image -->
        @if($university->image)
            <div class="mb-3">
                <label class="form-label"><strong>Current Image:</strong></label>
                <br>
                <img src="{{ asset('images/' . $university->image) }}" width="150" alt="University Image">
            </div>
        @endif

        <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Upload New Image:</strong></label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@include('layouts.footer')
@endsection
