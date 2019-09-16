@extends('notes.layout')

@section('header')
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Show Note</h2>
        </div>
    </div>
@endsection

@section ('information')
    @include('notes.parts.information')
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-5 offset-4">
            @if ($note)
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $note->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $note->content }}</p>
                    </div>
                </div>
            @else
                <p class="alert alert-warning">Note not found or deleted.</p>
            @endif
        </div>
        <div class="col-lg-4 offset-4">
            <a href="{{route('notes.index')}}" class="btn btn-secondary">Back to list</a>
        </div>
    </div>

@endsection
