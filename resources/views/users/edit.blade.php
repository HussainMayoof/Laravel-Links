@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Settings</h2>
                    <form action="/dashboard/settings" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="background">Background Colour</label>
                                    <input type="color" name="background" id="background" class="form-control{{$errors->first('background')?' is-invalid':''}}" placeholder="#ffffff" value="{{$user->background_colour}}">
                                </div>
                                @error('background')
                                        <span class="alert alert-danger p-2">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="text">Text Colour</label>
                                    <input type="color" name="text" id="text" class="form-control{{$errors->first('text')?' is-invalid':''}}" placeholder="#000000" value="{{$user->text_colour}}">
                                </div>
                                @error('text')
                                        <span class="alert alert-danger p-2">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <button type="sumbit" class="btn btn-primary">Save Settings</button>
                                <button type="button" class="btn btn-secondary" onclick="location.href='/dashboard/links';">Back To Dashboard</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection