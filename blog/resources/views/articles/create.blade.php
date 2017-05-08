@extends('layouts.layout')
 
@section('content')
<h1>Create Article</h1>
<hr>
@include('parts._errors')
{!! Form::open(['url' => 'articles', 'method' => 'POST', 'files' => true]) !!}
    @include('articles._form', ['buttonText' => 'Create Article'])
{!! Form::close() !!}
@endsection

@section('scripts')
<script>
$('#tags').select2();
</script>
@endsection