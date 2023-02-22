@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #addaccount {
            color: #5959c4;
        }
    </style>
    @if (session('message'))

        <div class="alert alert-success  w-75 d-none d-sm-inline-block " id="alert" role="alert">
            {{session('message')}}</div>
    @endif
    <div class="contantAdmin">
        <a href="{{route('Account.create')}}" type="button" class="btn btn-outline-primary"> add accounts</a>
    </div>
    <table class="table">
        <thead>

        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">position</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

        @foreach($accounts as  $k=> $account)

    <tr id="tr{{$account->id}}" >
        <th scope="row">{{$account->id}}</th>
        <td>{{$account->firstName}}
           <span class="fw-lighter " style="font-size: 12px"> ({{$account->posts_count}})</span>
        </td>
        <td>{{$account->emailAddress}}</td>
        <td>{{$account->option}}</td>
        <td class="gap-1 ">
            <div class="d-inline-block">
                <input type="hidden"
                       id="csrf_token_delete" class="csrf_token_delete" value="{{ csrf_token() }}">
                <a href="{{route('Account.destroy',$account->id)}}"data-id="{{$account->id}}"
                   data-name="{{$account->firstName}}"
                   class="destroy"
                   @if (auth()->user()->option !='admin' )
                       style="pointer-events: none;"
                    @endif
                > <i  class='bx bx-trash deleticons'></i></a>
            </div>
            <div class="d-inline-block">
                <a href="{{route('Account.edit',$account->id)}}">
                    <i class='bx bx-edit editicons'></i></a>
            </div>
            <div class="d-inline-block">
                <a href="#"data-id="{{$account->id}}" class="passwords"

                @if (auth()->user()->option !='admin')
                    style="pointer-events: none;"
                @endif
                   data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
                    <i class='bx bx-lock password'></i></a>
            </div>
        </td>
    </tr>


        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('passupdate')}}"
                    enctype="multipart/form-data"
                    method="POST">
                    {{csrf_field()}}
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">password:</label>
                            <input type="text" style="display: none" name="hidden" value="" class="form-control" id="hidden">


                            <input type="password" name="password" class="form-control" id="recipient-name">
                            @error('password')
                            <div class="form-error error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-4 pt-2">
                            <input class="btn btn-primary btn-lg" type="submit" id="reset" value="set password" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/javascriptadmin.js')}}"></script>

@endsection
