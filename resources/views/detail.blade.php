@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <div style="background-color: pink;">
       Title:{{ $post->title }}<br>
       Author:{{ $post->author }}<br>
       Tag:{{ $post->tag }}<br>
       Description:{{ $post->description }}
    </div>
</div>

@endsection