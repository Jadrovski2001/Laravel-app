@extends('universities.layout')

@include('layouts.header') <!-- Include the header at the beginning -->

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
  <h2 class="card-header text-mirror-shadow">Universities</h2> <!-- Stronger shadow & reflection -->
  <div class="card-body">
  
          
        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('universities.create') }}"> <i class="fa fa-plus"></i> Create New University</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Image</th> <!-- Added Image Column -->
                    <th>Name</th>
                    <th>Address</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($universities as $university)
                <tr>
                    <td>{{ ++$i }}</td>

                    <!-- Display the Image if available -->
                    <td>
                        @if($university->image)
                            <img src="{{ asset('images/' . $university->image) }}" alt="Image" width="100">
                        @else
                            No Image
                        @endif
                    </td>

                    <td>{{ $university->name }}</td>
                    <td>{{ $university->address }}</td>
                    <td>
                        <form action="{{ route('universities.destroy', $university->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('universities.show', $university->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('universities.edit', $university->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
        
        {!! $universities->links() !!}

  </div>
</div>
</div>  

@include('layouts.footer') <!-- Include the footer at the end -->

@endsection
