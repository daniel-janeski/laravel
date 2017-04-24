@extends('layouts/layout')

@section('title')
About
@endsection

@section('content')
 <h2>Hello {{ $name }}</h2>
        @if(!empty($team))
        <h3>My Team:</h3>
        <ul>
            @foreach($team as $member)
                 <li>{{ $member }}</li>
            @endforeach
        </ul>
        @endif
@endsection        