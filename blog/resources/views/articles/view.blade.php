@extends('layouts.layout')

@section('content')
<h1>View Article {{ $article->title }}</h1>
<span>{{ $article->author->name }}</span>
<hr>
<p>{{ $article->body }}</p>
@endsection