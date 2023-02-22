@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #addsubcategory {
            color: #5959c4;
        }
    </style>
    @if (session('message'))

        <div class="alert alert-success  w-75 d-none d-sm-inline-block " role="alert">
            {{session('message')}}</div>
    @endif
    <div class="contantAdmin">
        <a href="{{route('post-news.create')}}" type="button" class="btn btn-outline-primary"> add news</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">category</th>
            <th scope="col">image</th>
            <th scope="col " style="width: 400px">titel</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($postnews as $news)
            <tr id='tr{{$news->id}}'>
                <th scope="row">{{$news->id}}</th>
                <td>
                    <p>
                        {{$news->category->name}}
                    </p>
                </td>
                <td><img src="../{{$news->image}}"
                         data-name="{{$news->image}}"
                         style="cursor: pointer"
                         data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                         class="img-responsive img" id="img"/></td>
                <td>
                    <p>{{substr($news->title, 0, 35).'...'}}</p>

                </td>
                <td class="gap-1 ">

                    <div class="d-inline-block">
                        <input type="hidden" id="csrf_token_delete" class="csrf_token_delete"
                               value="{{ csrf_token() }}">

                        <a href="{{route('post-news.destroy',$news->id)}}" data-id="{{$news->id}}"
                           data-name="{{$news->title}}" data-category="{{$news->category->name}}"
                           class="destroy"
{{--                           @if (auth()->user()->option !='admin')--}}
{{--                               style="pointer-events: none;"--}}
{{--                            @endif--}}
                        > <i class='bx bx-trash deleticons'></i></a>
                    </div>
                    <div class="d-inline-block">
                        <a href="{{route('post-news.edit',$news->id)}}"> <i class='bx bx-edit editicons'></i></a>

                    </div>
                </td>
            </tr>

        @endforeach


        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="0"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modlImg">
                    <div class="modal-header">
                        <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="">
                        <img src="" class="img-fluid w-100 " id="imges"/>
                    </div>

                </div>
            </div>
        </div>
        </tbody>
    </table>

@endsection
@section('scripts')
    <script>


    </script>
@endsection
