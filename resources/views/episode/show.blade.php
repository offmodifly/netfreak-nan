@extends('layouts.app')

@section('content')

@include('partials.navbar')

<div class="container mt-5">
    <h1 class="py-5">{{$episode->title}}</h1>
    <a href="{{ url('/series/'.$episode->serie_id)}}" class="btn btn-info">กลับไปหน้าเดิม</a>

    @include($playertemplate)
</div>
@endsection