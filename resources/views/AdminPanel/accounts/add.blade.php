@extends('AdminPanel.layoutAdmin')
@section('content')
    <style>
        #addaccount{
            color: #5959c4;
        }
    </style>
    <div class="mb-2" >
        <a href="{{route('Account.index')}}" ><i  class='bx bx-arrow-back backicon'></i></a>
    </div>

    <form action="{{route('addaccount')}}"
          method="POST"
          enctype="multipart/form-data"    >
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-6 mb-4">

                <div class="form-outline">
                    <input type="text" value="{{old('firstName')}}" name="firstName" id="firstName" placeholder="First Name" class="form-control form-control-lg" />
                </div>
                @error('firstName')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="col-md-6 mb-2">

                <div class="form-outline">
                    <input type="text" value="{{old('lastName')}}" name="lastName" id="lastName" placeholder="Last Name" class="form-control form-control-lg" />
                </div>
                @error('lastName')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror

            </div>
        </div>


        <div class="row">
            <div class="col-md-12 mb-2 pb-2">
                <div class="form-outline">
                    <input type="email" value="{{old('emailAddress')}}" name="emailAddress" id="emailAddress" placeholder="Email" class="form-control form-control-lg" />
                </div>
                @error('emailAddress')
                <div class="form-error error ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-2 pb-2">

                <div class="form-outline">
                    <input type="tel" value="{{old('phoneNumber')}}" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control form-control-lg" />
                </div>
                @error('phoneNumber')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="col-md-12 mb-2 pb-2">

                <div class="form-outline">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                @error('password_confirmation')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="col-md-12 mb-2 pb-2">

                <div class="form-outline">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password confirmation">
                </div>
                @error('password')
                <div class="form-error error">
                    {{$message}}
                </div>
                @enderror

            </div>

        </div>

        <div class="row">
            <div class="col-12">

                <select name="option" class="form-select" aria-label="Default select example">
                    <option value="admin">admin</option>
                    <option value="employe">employe</option>
                    <option value="intern">intern</option>

                </select>
                {{--                @error('option')--}}
                {{--                <div class="form-error error">--}}
                {{--                    {{$message}}--}}
                {{--                </div>--}}
                {{--                @enderror--}}

            </div>
        </div>

        <div class="mt-4 pt-2">
            <input class="btn btn-primary btn-lg" type="submit" value="Create"
                   @if (auth()->user()->option =='intern')
                       disabled
                @endif
            />
        </div>

    </form>

@endsection
