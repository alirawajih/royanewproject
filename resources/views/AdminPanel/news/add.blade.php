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
    <form action="{{route('post-news.store')}}"
          method="POST"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12 mb-3">

                <select name="option" class="form-select" aria-label="Default select example">

                    <option value="">select category</option>

                    @foreach($categorys as $category)
                        <option value=" {{$category->id}}">  {{$category->name}}</option>

                @endforeach

            </div>
            </select>
            @error('option')
            <div class="form-error error">
                {{$message}}
            </div>
            @enderror
        </div>

        </div>

        <div class="col-12 mb-3">
            <div class="form-outline">
                <input type="text" id="title" value="{{old('title')}}" name="title" placeholder="title"
                       class="form-control form-control-lg"/>
                <input type="hidden" id="employee_id" name="employee_id" value="{{auth()->user()->id}}"/>

                @error('title')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror</div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <input class="form-control" value="{{old('image')}}" name="image" type="file" id="formFile">
                    <img src="" class="img-responsive w-50  mt-4 imgadd  "
                         id="uploadedImg"/>
                    @error('image')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2 pb-2">
                <div class="mb-3">
                    <textarea class="form-control" name="description" rows="10" placeholder="description"
                              id="exampleFormControlTextarea1" rows="3"> {{old('description')}}</textarea>
                    @error('description')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class=" float-left ">
            <input class="btn btn-primary btn-lg" type="submit" value="add"/>
        </div>

    </form>

@endsection
@section('scripts')
    <script>
        const formFile = document.getElementById('formFile');
        if (formFile != null) {
            formFile.addEventListener('change', function () {
                console.log(this.files[0])

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

