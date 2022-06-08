
@extends('layouts.app')
@section('content')
<div class="container">

    <form action="/c" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Comment</h1>
                </div>

                <div class="row mb-3">

                    <label for="comment" class="col-md-4 col-form-label">Add comment</label>


                    <input id="comment" type="text" class="form-control
                           @error('comment') is-invalid @enderror"
                           name="comment"
                           value="{{ old('comment') }}"
                           required autocomplete="comment" autofocus>

                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>


                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Comment</button>
                </div>

            </div>
        </div>


    </form>

</div>
@endsection
