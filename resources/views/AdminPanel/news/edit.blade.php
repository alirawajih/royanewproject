@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #addsubcategory {
            color: #5959c4;
        }
    </style>
    <div class="mb-2">
        <a href="{{route('post-news.index')}}"><i class='bx bx-arrow-back backicon'></i></a>
    </div>
    <form class="form-inline m-" action="{{route('post-news.update',$postNews->id)}}"
          enctype="multipart/form-data"
          method="POST">
        {{csrf_field()}}
        @method('PUT')

        <div class="row">
            <div class="col-12 mb-3">

                <select class="form-select" name="option" aria-label="Default select example">
                    {{--                    <option ></option>--}}
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}"
                                @if($postNews->category_id==$category->id)
                                    selected
                            @endif
                        >{{$category->name}}</option>
                    @endforeach


                </select>

            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="form-outline">
                <input type="text" id="title" name="title" value="{{$postNews->title}}" placeholder="title"
                       class="form-control form-control-lg"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <input class="form-control" name="image" type="file" id="formFile">
                    <img src="{{asset($postNews->image)}}" class="img-responsive w-50  mt-4"
                         id="uploadedImg"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2 pb-2">
                <div class="mb-3">
                    <textarea class="form-control" name="description" rows="10" placeholder="description"
                              id="exampleFormControlTextarea1" rows="3"> {{$postNews->description}}</textarea>
                </div>

            </div>
        </div>
        <div class=" float-left ">
            <input class="btn btn-primary btn-lg" type="submit"
{{--                   @if (auth()->user()->option =='intern')--}}
{{--                disabled--}}
{{--                   @endif --}}
                   value="edit"/>
        </div>

    </form>

@endsection
@section('scripts')
    <script>
        const formFile = document.getElementById('formFile');
        if (formFile != null) {
            formFile.addEventListener('change', function () {
                // console.log(this.files[0] )

                if (this.files && this.files[0]) {

                    var img = document.getElementById('uploadedImg');
                    img.onload = () => {
                        img.style.display = 'block';
                        URL.revokeObjectURL(img.src);
                    }
                    img.src = URL.createObjectURL(this.files[0]);
                }
            });
        }
    </script>
@endsection



