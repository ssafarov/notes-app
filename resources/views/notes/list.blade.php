@extends('notes.layout')

@section('header')
    <div class="col-md-10">
        <a href="{{ route('welcome') }}" class="welcome-lnk "><h2>Notes Application</h2></a>
    </div>
    <div class="col-md-2">
        <a href="{{ route('notes.create') }}" class="ann-lnk btn btn-success">Add New Note</a>
    </div>
@endsection

@section ('information')
    @include('notes.parts.information')
@endsection


@section('content')
    <h3>Notes list</h3>
    <table class="table table-bordered" id="laravel_crud">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created at</th>
            <th>Deleted at</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <td>@if ($note->deleted_at)
                        <del> @else <a
                                href="{{route('notes.show', $note->id)}}"> @endif {{ $note->id }} @if ($note->deleted_at)
                        </del> @else </a> @endif</td>
                <td>@if ($note->deleted_at)
                        <del> @endif {{ $note->title }} @if ($note->deleted_at) </del> @endif</td>
                <td>@if ($note->deleted_at)
                        <del> @endif {{ $note->content }} @if ($note->deleted_at) </del> @endif</td>
                <td>@if ($note->deleted_at)
                        <del> @endif {{ date('m-d-Y', strtotime($note->created_at)) }} @if ($note->deleted_at) </del> @endif
                </td>
                <td>@if ($note->deleted_at)
                        <del> {{ date('m-d-Y', strtotime($note->deleted_at)) }} </del> @endif
                </td>
                <td colspan="2">
                    @if (!$note->deleted_at)
                        <form action="{{ route('notes.destroy', $note->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <a href="{{ route('notes.show',$note->id)}}" class="btn btn-success btn-view-note">View</a>
                            <a href="{{ route('notes.edit',$note->id)}}" class="btn btn-primary btn-edit-note">Edit</a>
                            <button class="btn btn-danger btn-delete-note" type="submit">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
