
    <div class="container  p-3 pe-lg-5">

        <form action="{{route('comment.store', ['post_id' => $post->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">

                <div class="pt-4 ">

                    <div class="row mb-3 d-flex flex-column ">


                        <div class="d-flex p-0">

                            <svg fill="grey" class="me-3"  id="Capa_1" height="40px" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 217.762 217.762" style="enable-background:new 0 0 217.762 217.762;" xml:space="preserve">
<path d="M108.881,5.334C48.844,5.334,0,45.339,0,94.512c0,28.976,16.84,55.715,45.332,72.454  c-3.953,18.48-12.812,31.448-12.909,31.588l-9.685,13.873l16.798-2.153c1.935-0.249,47.001-6.222,79.122-26.942  c26.378-1.92,50.877-11.597,69.181-27.364c19.296-16.623,29.923-38.448,29.923-61.455C217.762,45.339,168.918,5.334,108.881,5.334z   M115.762,168.489l-2.049,0.117l-1.704,1.145c-18.679,12.548-43.685,19.509-59.416,22.913c3.3-7.377,6.768-17.184,8.499-28.506  l0.809-5.292l-4.741-2.485C30.761,142.547,15,119.42,15,94.512c0-40.901,42.115-74.178,93.881-74.178s93.881,33.276,93.881,74.178  C202.762,133.194,164.547,165.688,115.762,168.489z"/>
                            </svg>

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
