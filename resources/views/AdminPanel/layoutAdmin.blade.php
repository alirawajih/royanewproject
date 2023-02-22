<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/AdminStylesheet.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Royanews</title>

</head>
<body>


<nav class="navbar position-sticky " style=" top:0px;">
    <div class="container-fluid">
        <div class="me-3 d-sm-none d-inline ">
            <a href="#" style="color: black" id="navbutt"> <div class="me-3 d-sm-none d-inline ">
                    <i id="menu" class='bx bx-menu'></i>

                </div>
            </a>
        </div>
        <a href="{{route('dashboard')}}"><img src="{{asset('image/logo.png')}}" class="logoimg" style="" alt="">
            <h6 class="textbar d-inline" style="color: black"> Roya New</h6></a>
        <div class="dropdown">
            <button class=" dropdown-toggle huobutton" style="" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>{{auth()->user()->firstName}}</span>
            </button>
            <div class="dropdown-menu " style="right: 0px" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="{{route('dashboard')}}"> <i class='bx bx-user'></i>
                    <span class="textbar d-inline  "> Home</span></a>
                <a class="dropdown-item" href=" {{route('editinfo',auth()->user()->id)}}"> <i class='bx bx-coin-stack iconbar'></i>
                    <span class="textbar d-inline "> information</span></a>
                <a class="dropdown-item " href="{{route('logout')}}"> <i class="bx bx-log-out iconbar"></i>
                    <span class="textbar d-inline">log out</span></a>
            </div>
        </div>
    </div>

</nav>


<ul class=" navleft d-none d-sm-block" id="navleft" style="">


    <li>
        <button type="button" class="close d-sm-none d-block" id="closenav" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <a href="{{route('category.index')}}" class="navleftlink" id="added">
            <i class='bx bx-coin-stack iconbar'></i>
            <span class="textbar d-lg-inline "> category</span>
        </a>

    </li>
    <li><a href="{{route('post-news.index')}}" class="navleftlink" id="addsubcategory">

            <i class='bx bx-collection'></i>
            <span class="textbar d-lg-inline ">news</span>
        </a>
    </li>
    <li><a href="{{route('Account.index')}}" class="navleftlink" id="addaccount">
            <i class='bx bx-user-plus iconbar'></i>
            <span class="textbar d-lg-inline ">account</span>
        </a>
    </li>
    <li class="logoutlink">
        <a href="{{route('logout')}}" class="navleftlink">
            <i class="bx bx-log-out iconbar"></i>
            <span class="textbar d-lg-inline  ">log out</span>
        </a>
    </li>
</ul>


<div class="contant" style="    ">

    @yield('content')

</div>
@yield('scripts')



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
{{--<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>--}}
<script src="{{asset('js/javascriptadmin.js')}}"></script>


</body>
</html>
