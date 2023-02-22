@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #added {
            color: #5959c4;
        }
    </style>
    @if (session('message'))

        <div class="alert alert-success  w-75 d-none d-sm-inline-block " role="alert">
            {{session('message')}}</div>
    @endif
    <div class="contantAdmin">
        <a href="{{route('category.create')}}" type="button" class="btn btn-outline-primary"> add category</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">number of news</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($categorys as $category)

            <tr id='tr{{$category->id}}'>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}  </td>
                <td>{{$category->posts_count}}</td>
                <td class="gap-1 ">
                    <div class="d-inline-block">
                        <input type="hidden" id="csrf_token_delete" class="csrf_token_delete"
                               value="{{ csrf_token() }}">

                        <a href="{{route('category.destroy',$category->id)}}" data-id="{{$category->id}}"
                           data-name="{{$category->name}}"
                           class="destroy"> <i class='bx bx-trash deleticons'></i></a>
                    </div>
                    <div class="d-inline-block">
                        <a href="{{route('category.edit',$category->id)}}"> <i class='bx bx-edit editicons'></i></a>
                    </div>
                </td>

            </tr>
        @endforeach


        </tbody>
    </table>

@endsection
@section('scripts')
    <script src="{{asset('js/javascriptadmin.js')}}"></script>

@endsection
