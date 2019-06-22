@extends('layouts.app')

@section('content')

<div class="container">
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
 --}}	        	<a href="{{ URL::to('/edit')}}/{{$apost->id}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

	        	<a href="{{ URL::to('/delete')}}/{{$apost->id}}" class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
	        </td>
	        
	      </tr>
	    </tbody>
	 @endforeach
	</table>
</div>

@endsection