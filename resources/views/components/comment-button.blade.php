
    <div class="container">

        <form action="{{route('comment.store', ['post_id' => $post->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">

                <div class="col-8 pt-2 offset-1">

                    <div class="row mb-3 d-flex flex-column ">

                        <div class="d-flex">

                            <input id="comment" type="text" class="form-control
                                       @error('comment') is-invalid @enderror"
                                   name="comment"
                                   value="{{ old('comment') }}"
                                   required autocomplete="comment" autofocus placeholder="Add Comment ...">

                            @error('comment')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                        <button class="btn btn-primary ms-2">Post</button></div>

                    </div>


                </div>
            </div>


        </form>

    </div>
