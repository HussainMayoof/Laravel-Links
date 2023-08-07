@extends('layouts.links')

@section('content')
    <div style="background: {{$background}};">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    @foreach ($links as $link)
                        <div class="link">
                            <a href="{{$link->link}}" class="user-link d-block p-4 mb-4 rounded h3 text-center" target="_blank" rel="nofollow" style="border:2px solid {{$text}}; color: {{$text}}" data-link-id="{{$link->id}}">{{$link->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection