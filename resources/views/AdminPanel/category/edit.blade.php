@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #added {
            color: #5959c4;
        }
    </style>

    <div>
        <a href="{{route('category.index')}}"><i class='bx bx-arrow-back backicon'></i></a>
    </div>
    <div class="mt-5">
        <div class="offset-md-1 col-md-8 col-12">
            <form class="form-inline m-" action="{{route('category.update',[$category->id])}}"
                  enctype="multipart/form-data"
                  method="POST">
                {{csrf_field()}}
                @method('PUT')

                <div>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control text-center  "
                           id="inputPassword2"
                           placeholder="name of category ">
                </div>
                <div class="mt-3 p-0">
                    <button type="submit" class="btn btn-primary w-25 "
{{--                            @if (auth()->user()->option =='intern')--}}
{{--                                disabled--}}
{{--                        @endif--}}
                    >edit category
                    </button>
                </div>
            </form>
        </div>


    </div>
@endsection

