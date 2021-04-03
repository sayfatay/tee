@extends('student.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Laravel 8 CRUD - Index</h2>
            <a href="{{ route('student.create') }}" class="btn btn-success my-3" >Create new student</a>
        </div> 
    </div>

    @if($message = Session::get('success'))
       <div class= "alert alert-success">
           {{ $message }}
       </div>
    @endif


    <table class="table table-bordered">
        
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Description</th>
            <th>Description</th>        
            <th width="280px">Action</th>
        </tr>

        @foreach ( $data as $key => $value )
            <tr>
                <td>{{++$i}}</td>
                <td>{{$value->title}}</td>
                <td>{{Str::limit ($value->description, 100) }}</td>
                <td>
                    <form action="{{ route('student.destroy',$value->id) }}" method="student">
                        <a href="{{ route('student.show',$value->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('student.edit',$value->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>     
        @endforeach


    </table>

    {!! $data->links() !!}
    
@endsection