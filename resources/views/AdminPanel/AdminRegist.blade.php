<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/AdminStylesheet.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">


    <title>admin</title>
</head>
<body class="loginbody" >
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration </h3>
                        <form  action="{{route('Account.store')}}"
                               method="POST" >
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" value="{{old('firstName')}}"  name="firstName" id="firstName" placeholder="First Name" class="form-control form-control-lg" />
                                    </div>
                                    @error('firstName')
                                    <div class="form-error">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-2">

                                    <div class="form-outline">
                                        <input type="text" {{old('lastName')}} name="lastName" id="lastName" placeholder="Last Name" class="form-control form-control-lg" />
                                    </div>
                                    @error('lastName')
                                    <div class="form-error">
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
                                    <div class="form-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2 pb-2">

                                    <div class="form-outline">
                                        <input type="tel" value="{{old('phoneNumber')}}" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control form-control-lg" />
                                    </div>
                                    @error('phoneNumber')
                                    <div class="form-error">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="col-md-12 mb-2 pb-2">

                                    <div class="form-outline">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    @error('password')
                                    <div class="form-error">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <select class="form-select"  name="option" aria-label="Default select example">
                                        <option value="admin">admin</option>
                                        <option value="managr">managr</option>
                                        <option value="ss">ss</option>
                                    </select>
                                    @error('option')
                                    <div class="form-error">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Create" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
