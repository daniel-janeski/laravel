@extends('layouts/layout')

@section('content')
@if(Session::has('flash_message'))
<div class='alert alert-success'>{{ Session::get('flash_message') }}</div>
@endif
<h1 class="page-header">Articles <a href="{{ url('articles/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
</a></h1>
@foreach ($articles as $article) 
<article>
    <h2><a href='{{  url('articles',['slug' => $article->slug])  }}'>{{ $article->title }}</a> <a href="{{ url('articles/edit', ['id'=>$article->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i>
</a></h2>
    <div class='content'>{{ $article->excerpt }}</div>
</article>
@endforeach
@endsection