
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
               <img class="w-100" src="/storage/{{$post->image}}" alt="">

        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pe-3">
                        <img class="rounded-circle w-100" src="{{ $post->user->profile->profileImage()}}" alt="" style="max-width: 40px">
                    </div>

                        <div class="fw-bold d-flex  justify-content-between " style="width: 70%">

                                <a  class="text-decoration-none" href=/profile/{{$post->user->id}}><span class="text-dark">{{$post->user->username}}</span></a>


                            <div>


                            </div>



                                @if($post->user_id != auth()->user()->id)
                                    <follow-button user-id="{{ $post->user->id }}" follows="{{ $post->user->follows() }}"></follow-button>
                                @else

                                    <form action="/p/delete/{{$post->id}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="deleteButton"> <svg class="deleteSvg" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7929 7.49998L1.14645 1.85353L1.85356 1.14642L7.50001 6.79287L13.1465 1.14642L13.8536 1.85353L8.20711 7.49998L13.8536 13.1464L13.1465 13.8535L7.50001 8.20708L1.85356 13.8535L1.14645 13.1464L6.7929 7.49998Z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif




                    </div>
                </div>
                    <hr>
                    <p>
                        <span class="fw-bold">
                            <a class="text-decoration-none" href=/profile/{{$post->user->id}}>
                                <span class="text-dark">{{$post->user->username}}
                                </span>
                            </a>
                        </span>
                        {{$post->caption}}
                    </p>
                    <hr>
                <div style="overflow-y: auto ;max-height: 400px;"  >
                    @foreach($post->comments as $comment)
                        <div class="d-flex align-items-center">
                            <div class="pe-3 pb-3">
                                <a href="/profile/{{ $comment->user->profile->id}}"><img class="rounded-circle w-100" src="{{$comment->user->profile->profileImage()}}" alt="" style="max-width: 40px"></a>
                            </div>

                            <div class="d-flex align-items-baseline">
                                <a style="color: black" class="text-decoration-none" href="/profile/{{ $comment->user->profile->id}}"><p  style="width: 270px; overflow-wrap: break-word;" class="pe-2 "><strong>{{$comment->user->username}} </strong> </a>{{$comment->body}}</p>


                                @if($comment->user_id == auth()->user()->id)
                                    <form action="/c/delete/{{$comment->id}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                     <button class="deleteButton"> <svg class="deleteSvg" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7929 7.49998L1.14645 1.85353L1.85356 1.14642L7.50001 6.79287L13.1465 1.14642L13.8536 1.85353L8.20711 7.49998L13.8536 13.1464L13.1465 13.8535L7.50001 8.20708L1.85356 13.8535L1.14645 13.1464L6.7929 7.49998Z" />
                                         </svg>
                                     </button>
                                    </form>


                                @endif

                            </div>

                        </div>

                    @endforeach
                </div>


                <x-comment-button :post="$post"/>
                <br>
                <form action="{{route('post.like', ['post_id' => $post->id ])}}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="deleteButton">
                        <svg  class="deleteSvg" width="40px" height="30px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" >
                                                <g id="love">
                                                    <path id="love_1_" d="M16.032,29.247c-0.092,0-0.185-0.035-0.255-0.105L3.008,16.373c-1.507-1.507-2.337-3.506-2.337-5.629   c0-2.139,0.83-4.147,2.337-5.655c1.506-1.506,3.508-2.335,5.639-2.337c0,0,0.001,0,0.002,0c2.132,0,4.136,0.83,5.643,2.337   l1.74,1.74l1.74-1.74c1.507-1.507,3.511-2.337,5.642-2.337c0.003,0,0.005,0,0.008,0c2.128,0.002,4.129,0.832,5.635,2.337   c1.507,1.508,2.337,3.511,2.337,5.642s-0.83,4.134-2.337,5.642L16.287,29.142C16.216,29.212,16.124,29.247,16.032,29.247z    M8.649,3.473c0,0-0.001,0-0.002,0C6.709,3.474,4.888,4.229,3.518,5.599C2.147,6.97,1.392,8.797,1.392,10.744   c0,1.931,0.755,3.749,2.126,5.119l0,0l12.514,12.514l12.514-12.514c1.371-1.371,2.126-3.193,2.126-5.132s-0.755-3.761-2.126-5.132   c-1.37-1.369-3.19-2.124-5.125-2.126c-0.003,0-0.006,0-0.008,0c-1.938,0-3.761,0.754-5.132,2.126l-1.995,1.995   c-0.141,0.141-0.369,0.141-0.51,0l-1.995-1.995C12.412,4.228,10.588,3.473,8.649,3.473z"/>
                                                </g><g id="Layer_1"></g>
                                            </svg>

                    </button>


                </form>


                <p>{{$post->countLikes()}} Likes</p>

            </div>
        </div>
    </div>
</div>
@endsection
