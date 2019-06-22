@extends('layouts.app')

@section('content')
<div class="container">
       <a href="{{route('all.news')}}" class="btn btn-danger">All News</a>

        <form action="{{url('/insert-news')}}" method="post" enctype="multipart/form-data">
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
            <label for="exampleInputImage">Image</label>
            <input type="file" class="form-control" id="exampleInputTag" placeholder="Enter Tag" name="image">
         </div>

         <div class="form-group">
            <label for="exampleInputDetails">Details</label>
            <textarea class="form-control" id="exampleInputDescription" rows="3" placeholder="Enter details" name="details"></textarea>
         </div>
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
</div>

@endsection
