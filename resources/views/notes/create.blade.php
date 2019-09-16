@extends('notes.layout')

@section('header')
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Creating new note</h2>
        </div>
    </div>
@endsection

@section ('information')
    @include('notes.parts.information')
@endsection


@section('content')

    <form action="{{ route('notes.index') }}" method="POST" name="add_note">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter note title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control" col="4" name="content"
                              placeholder="Enter note content"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Add note</button>
                <a href="{{route('notes.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>

    </form>
@endsection
