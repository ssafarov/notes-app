@extends('notes.layout')

@section('header')
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Update Note</h2>
        </div>
    </div>
@endsection

@section ('information')
    @include('notes.parts.information')
@endsection

@section('content')
    <form action="{{ route('notes.update', $note->id) }}" method="POST" name="update_note">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                           value="{{ $note->title }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control" col="4" name="content"
                              placeholder="Enter Content">{{ $note->content }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('notes.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
