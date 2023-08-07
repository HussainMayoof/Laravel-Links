@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a New Link</h2>
                    <form action="/dashboard/links/new" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name">Link Name</label>
                                    <input type="text" name="name" id="name" class="form-control{{$errors->first('name')?' is-invalid':''}}" placeholder="My Youtube Channel" value="{{old('name')}}">
                                </div>
                                @error('name')
                                        <span class="alert alert-danger p-2">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name">URL</label>
                                    <input type="text" name="link" id="link" class="form-control{{$errors->first('link')?' is-invalid':''}}" placeholder="https://www.youtube.com/@channelname" value="{{old('link')}}">
                                </div>
                                @error('link')
                                        <span class="alert alert-danger p-2">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <button type="sumbit" class="btn btn-primary">Save Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection