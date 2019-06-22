@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Author</th>
                      <th scope="col">Image</th>
                      <th scope="col">Details</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($news as $anews) 
                    <tr>
                      <td>{{ $anews->title }}</td>
                      <td>{{ $anews->author }}</td>
                      <td><img src="{{ URL::to($anews->image) }}" alt="" width="100px" height="50PX"></td>
                      <td>{{ $anews->details }}</td>
                      <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm" id="delete">Delete</a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>

             </div>
         </div>
     </div>
</div>
@endsection