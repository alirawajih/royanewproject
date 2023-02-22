@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #addaccount {
            color: #5959c4;
        }
    </style>

    <div class="mb-2">
        <a href="{{route('Account.index')}}"><i class='bx bx-arrow-back backicon d-block'></i></a>
    </div>
    @if (session('message'))

        <div class="alert alert-success  w-75 " role="alert">
            {{session('message')}}</div>
    @endif
    <form action="{{route('Account.update',[$account->id])}}"
          enctype="multipart/form-data"
          method="POST">
        {{csrf_field()}}
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-4">

                <div class="form-outline">
                    <input type="text" value="{{$account->firstName}}" id="firstName" name="firstName"
                           class="form-control form-control-lg"/>
                    @error('firstName')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="col-md-6 mb-2">

                <div class="form-outline">
                    <input type="text" value="{{$account->lastName}}" id="lastName" name="lastName"
                           class="form-control form-control-lg"/>
                    @error('lastName')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12 mb-2 pb-2">
                <div class="form-outline">
                    <input type="email" value="{{$account->emailAddress}}" id="emailAddress" name="emailAddress"
                           class="form-control form-control-lg"/>
                    <input type="hidden" name="id" value="{{ $account->id }}">
                    @error('emailAddress')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-2 pb-2">

                <div class="form-outline">
                    <input type="tel" value="{{$account->phoneNumber}}" id="phoneNumber" name="phoneNumber"
                           class="form-control form-control-lg"/>
                    @error('phoneNumber')
                    <div class="form-error error">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>
            {{--            <div class="col-md-12 mb-2 pb-2">--}}

            {{--                <div class="form-outline">--}}
            {{--                    <input type="text" value="{{$account->password}}" class="form-control form-control-lg" id="exampleInputPassword1" >--}}
            {{--                </div>--}}

            {{--            </div>--}}

        </div>

        <div class="row">
            <div class="col-12">

                <select name="option" class="form-select" aria-label="Default select example">
                    <option value="{{$account->option}}" selected>{{$account->option}}</option>
                    @if (auth()->user()->option =='admin')

                        <option value="admin">admin</option>
                        <option value="employe">employe</option>
                        <option value="intern">intern</option>
                    @endif

                </select>

            </div>
        </div>

        <div class="mt-4 pt-2">
            <input class="btn btn-primary btn-lg" type="submit" value="update"/>
        </div>

    </form>

@endsection
