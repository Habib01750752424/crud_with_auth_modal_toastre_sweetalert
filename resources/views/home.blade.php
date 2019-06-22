@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="float: right
                ;">Add New</a> </div>

                <a href="{{route('news.add')}}" class="btn btn-danger">News Add</a>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('all.posts') }}">All Posts</a>


                    {{-- Error Message Print --}}
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                      </div>
                    @endif
                    {{-- End --}}


                    @php
                     $post = App\Post::orderBy('id','desc')->get();
                    @endphp
                    {{-- All Post Table --}}
                    <table class="table table-condensed">
                          <thead>
                            <tr style="text-align: center;">
                              <th>Title</th>
                              <th>Author</th>
                              <th>Tag</th>
                              <th>Description</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                       @foreach ($post as $apost) 
                          <tbody>
                            <tr style="text-align: center;">
                              <td>{{$apost->title}}</td>
                              <td>{{$apost->author}}</td>
                              <td>{{$apost->tag}}</td>
                              <td>{{$apost->description}}</td>
                              <td>
                                
                                <a href="{{ URL::to('/details')}}/{{$apost->id}}" class="btn btn-success"><i class="fa fa-eye" style="font-size:20px"></i></a>

                                {{-- <a href="{{ URL::to('/edit')}}/{{$apost->id}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     --}}           <a href="{{ URL::to('/edit')}}/{{$apost->id}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="{{ URL::to('/delete')}}/{{$apost->id}}" class="btn btn-success" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                              </td>
                              
                            </tr>
                          </tbody>
                       @endforeach
                    </table>
                    {{-- End --}}


                </div>  
            </div>
        </div>
    </div>
</div>


{{-- DATA INSERTION MODAL HERE --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="{{url('/insert-post')}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">

         <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title">
         </div>

         <div class="form-group">
            <label for="exampleInputAuthor">Author</label>
            <input type="text" class="form-control" id="exampleInputAuthor" placeholder="Enter Author" name="author">
         </div>

         <div class="form-group">
            <label for="exampleInputTag">Tag</label>
            <input type="text" class="form-control" id="exampleInputTag" placeholder="Enter Tag" name="tag">
         </div>

         <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <textarea class="form-control" id="exampleInputDescription" rows="3" placeholder="Enter Description" name="description"></textarea>
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>


    </div>
  </div>
</div>

@endsection
