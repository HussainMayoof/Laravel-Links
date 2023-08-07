@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <h2 class="card-title">Your Links</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Visits</th>
                                <th>Last Visit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td>{{$link->name}}</td>
                                    <td><a href="{{$link->link}}"></a>{{$link->link}}</td>
                                    <td>{{$link->visits_count}}</td>
                                    <td>{{$link->latest_visit?$link->latest_visit->created_at->format('M j Y - H:ia'):'N/A'}}</td>
                                    <td><a href="/dashboard/links/{{$link->id}}">Edit</a> | <a href="javascript:document.getElementById('delete-form-{{$link->id}}').submit();">Delete</a></td>
                                    <form id="delete-form-{{$link->id}}" method="post" action="/dashboard/links/{{$link->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
                </div>
            </div>
        </div>
    </div>
@endsection