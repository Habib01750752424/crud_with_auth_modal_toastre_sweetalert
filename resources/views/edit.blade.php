@extends('layouts.app')

@section('content')
<div class="container">

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

	<form action="{{url('/update-post',$post->id)}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">

         <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" value="{{ $post-> title }}">
         </div>

         <div class="form-group">
            <label for="exampleInputAuthor">Author</label>
            <input type="text" class="form-control" id="exampleInputAuthor" placeholder="Enter Author" name="author" value="{{ $post-> author }}">
         </div>

         <div class="form-group">
            <label for="exampleInputTag">Tag</label>
            <input type="text" class="form-control" id="exampleInputTag" placeholder="Enter Tag" name="tag" value="{{ $post-> tag }}">
         </div>

         <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <textarea class="form-control" id="exampleInputDescription" rows="4" placeholder="Enter Description" name="description">{{ $post-> description }}</textarea>
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
</div>

@endsection