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
    <div class=" mt-5">
        <div class="offset-md-1 col-md-8 col-12">
            <form class="form-inline m-" action="{{route('category.store')}}"
                  method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}


                <div>
                    <input type="text" name="name" class="form-control text-center  " value="{{old('name')}}"
                           id="inputPassword2"
                           placeholder="name of category ">
                    @error('name')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mt-3 p-0">
                    <button type="submit"
                            class="btn btn-primary w-25 ">add category
                    </button>
                </div>
            </form>
        </div>


    </div>
@endsection

