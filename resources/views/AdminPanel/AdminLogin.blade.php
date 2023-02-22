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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">login  </h3>
                        <form class="loginform" action="{{route('login')}}"
                              method="POST"
                              enctype="multipart/form-data" >
                            {{csrf_field()}}

                            <div class="form-outline mb-4">
                                <input type="email" name="emailAddress"  placeholder="email" id="form2Example1" class="form-control" />
                                @error('emailAddress')
                                <div class="form-error error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" name="password"  placeholder="password" id="form2Example2" class="form-control" />
                                @error('password')
                                <div class="form-error error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="row mb-4 fw-light fontlogin" >

                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label"  for="form2Example31"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <a href="{{route('resetPassword')}}">Forgot password?</a>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4 SignInButt" >Sign in</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
