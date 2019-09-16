@section('information')

    @if ($message = Session::get('success'))
        <div class="col-lg-12">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="col-lg-12">
            <div class="alert alert-info">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <strong>Oops!</strong> Something went wrong<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection
