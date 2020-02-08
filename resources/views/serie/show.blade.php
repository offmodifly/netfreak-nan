@extends('layouts.app')

@section('content')

@include('partials.navbar')

    <div class="container mt-5">
        <h1 class="py-5">{{$serie->title}}</h1>
        <a class="btn btn-info" href="{{ url('series/'.$serie->id.'/episodes/create')}}">เพิ่มตอน</a>
        <ul>
            @foreach($serie->episodes as $episodes)
                     @if($episodes->hosting == "url")
                        <li><a href="{{ url('/partials/url-video-player/'.$episodes->id)}}">{{ $episodes->title}}</a></li>
                    @endif
                    @if($episodes->hosting == "youtube")
                        <li><a href="{{ url('/partials/youtube-video-player/'.$episodes->id)}}">{{ $episodes->title}}</a></li>
                    @endif
                    @if($episodes->hosting == "vimeo")
                        <li><a href="{{ url('/partials/vimeo-video-player/'.$episodes->id)}}">{{ $episodes->title}}</a></li>
                    @endif
            @endforeach
        </ul>
    </div>

@endsection