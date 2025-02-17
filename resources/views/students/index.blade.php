@extends('students.layout')

@include('layouts.header') <!-- Include the header at the beginning -->


@section('content')

<div class="card mt-5">
  <h2 class="card-header">Students</h2>
  <div class="card-body">
          
        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('students.create') }}"> <i class="fa fa-plus"></i> Create New Student</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Image</th> <!-- Added Image Column -->
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>

                    <!-- Display the Image if available -->
                    <td>
                        @if($student->image)
                            <img src="{{ asset('images/' . $student->image) }}" alt="Image" width="100">
                        @else
                            No Image
                        @endif
                    </td>

                    <td>{{ $student->name }}</td>
                    <td>{{ $student->detail }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
             

                            <a class="btn btn-info btn-sm" href="{{ route('students.show', $student->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              

                            <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             

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
        
        {!! $students->links() !!}

  </div>
</div> 


@include('layouts.footer') <!-- Include the footer at the end -->

@endsection
