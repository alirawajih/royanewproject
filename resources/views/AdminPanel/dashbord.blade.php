@extends('AdminPanel.layoutAdmin')
@section('content')

<div class="contant ms-0">
    <div class="row ">
        <div class="col-lg-6  ">
            <div class="imguser  ">
                <img class="img-fluid" src="{{asset('image/user.jpeg')}}">
            </div>
        </div>

        <div class="col-lg-6  " >

            <table class="table    "  >
                @foreach($account as $user)
                    <tbody>
                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                First name
                            </strong>

                        </td>
                        <td class="text-primary">
                            {{$user->firstName}}
                            <a class="float-left" href="{{route('Account.edit',$user->id)}}">
                                <i class='bx bx-edit editicons ' style="float: right"></i></a>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>
                                Last name
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$user->lastName}}

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>
                                Email
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$user->emailAddress}}

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                Phone number
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$user->phoneNumber}}

                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                Position
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$user->option}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                Numper of post
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{$user->posts_count}}

                        </td>
                    </tr>

                    </tbody>
                @endforeach

            </table>

        </div>

    </div>

</div>
@endsection


