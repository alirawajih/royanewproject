<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">


    <title>royanews</title>
</head>
<body>

<div id="navbar">
    <div class="container ">
        <nav class="navbar navbar-expand sticky-top  ">
            <i class="fa fa-search" style="color: white"></i>
            <div class=" float-left">

                <div class="input-group rounded">
                    <form action="{{route('search')}}"
                          method="GET">
                        {{csrf_field()}}
                        <input type="search" class=" text-white form-control rounded"
                               placeholder="Search" name="search" aria-label="Search"
                               aria-describedby="search-addon"/>
                    </form>
                </div>


            </div>

        </nav>
    </div>
</div>
<div class="buttonSticky">

    <div class="container mt-4 logonav">
        <img src="{{asset('image/logo.png')}}" alt="">
        <h1 class="d-inline "> Roya New</h1>
    </div>
</div>
<nav class="navbar sticky-top navbar-expand-lg p-0 mt-2 mb-2  border-top border-bottom  navbarscrol  " id="navbarscrol">
    <ul class="gap-2 mt-1 mb-0" style="display: inherit;">
        <li>
            <button class="navbar-toggler" id="navbarbutton" type="button" style="" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </li>
        <li class="logoscrolnav" id="ee"><img src="{{asset('image/logo.png')}}" alt="" class="logo"></li>

        <li class="logoscrolnav"><p id="pSecondNav"> Roya New</p></li>
    </ul>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav gap-2 " id="navbarul">
            <li class=" ">
                <img src="{{asset('image/logo.png')}}" alt="logo" class=" d-lg-block d-none  pt-2" style="width: 30px">
            </li>
            <li class="nav-item linav">
                <button type="button" class="close d-lg-none d-block" id="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a class="nav-link linkscrolnav" href="{{route('firstpage')}}">Home <span
                        class="sr-only">(current)</span></a>

            </li>
            @foreach($categorys as $category)
                <li class="nav-item linav ">
                    <a class="nav-link linkscrolnav "
                       href="{{route('shownewscategory',$category->id)}}">{{$category->name}}<span class="sr-only">(current)</span></a>
                </li>
            @endforeach


        </ul>
        <ul class="d-flex justify-content-center mt-4 d-lg-none gap-4 ">
            <li><a href="#" class="fa fa-facebook icons"></a></li>
            <li><a href="#" class="fa fa-twitter icons"></a></li>
            <li><a href="#" class="fa fa-instagram icons"></a></li>
            <li><a href="#" class="fa icons">&#xf16a;</i>
                </a></li>
            <li><a href="#" class="fa fa-rss icons"></a></li>
        </ul>
    </div>
</nav>


<div class="container ">
    <div class="row  ">
        @yield('content')


        <div class="col-lg-4 col-md-4  ">
            <div class=" Latest_Most row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">
                        <li class="nav-item LatestLINKMost">
                            <a class="nav-link active"
                               id="pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-home">Latest
                                News</a>
                        </li>
                        <li class="nav-item LatestLINKMost">
                            <a class="nav-link"
                               id="pills-profile-tab" data-toggle="pill" href="#" role="tab"
                               aria-controls="pills-profile">Most Viewed</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade " id="div-LatestNews" role="tabpanel"
                             aria-labelledby="home-tab">
                            @foreach($postnews as $post)
                                <div>
                                    <div class="border-Latestmost">
                                        <div class="LatestNews">
                                            <a href="{{route('shownews' ,$post->id )}}"
                                               class="firstlinkLaMo">{{substr($post->title, 0, 15)}}</a>
                                        </div>
                                        <div class="secondDivlaMo">

                                            <a class="secondLinkLaMo"
                                               href="{{route('shownewscategory',$post->category->id)}}">
                                                {{$post->category->name}}
                                            </a>

                                            |@php
                                                if ($post->created_at->diffInDays() > 30) {
                                                    $timestamp = $post->created_at->toFormattedDateString();

                                                             } else {
                                                    $timestamp = $post->created_at->diffForHumans();
                                                             }
                                                echo $timestamp;
                                            @endphp
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade show active " id="div-MostViewed"
                             role="tabpanel"
                             aria-labelledby="profile-tab">
                            @foreach($views as $view)
                                <div class="border-Latestmost">
                                    <div class="MostViewed ">
                                        <a href="{{route('shownews' ,$view->id )}}"
                                           class="firstlinkLaMo">{{substr($view->title, 0, 25)}}</a>
                                    </div>
                                    <div class="secondDivlaMo">
                                        <a class="secondLinkLaMo" href="#">

                                            <a class="secondLinkLaMo"
                                               href="{{route('shownewscategory',$view->category->id)}}">
                                                {{$view->category->name}}
                                            </a>
                                        </a>
                                    </div>
                                </div>

                            @endforeach


                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-12 mt-4 ">
                <div class="accordion custom_accordion mb-2" id="accordionWeather">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingWeather">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWeather" aria-expanded="true" aria-controls="collapseOne">
                                Weather
                            </button>
                        </h2>
                        <div id="collapseWeather" class="accordion-collapse collapse show"
                             aria-labelledby="headingWeather"
                             data-bs-parent="#accordionWeather">
                            <div class="accordion-body  ">
                                <select class="custom-select w-100" id="inputGroupSelect01">
                                    <option selected>West Amman</option>
                                    <option value="1">irbed</option>
                                    <option value="2">kerak</option>
                                    <option value="3">aqaba</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>
<div class="footer  ">
    <footer class="text-center text-lg-start bg-light text-muted">

        <section class="p-5 ">
            <div class="row g-1 ">
                <div class="col-lg-4 col-md-4">
                    <div class="p-1 cord">
                        <div class="footertitel p-1">
                            <h5 class="footertiteltext fw-light">About Us</h5>
                        </div>
                        <h6 class="fw-light pt-2" style="color: #1a202c">
                            Roya News English is a growing Roya supplement in the English language that provides
                            independent and objective coverage of Jordan, Palestine and beyond, from a local
                            perspective.
                        </h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="p-1 cord">
                        <div class="footertitel p-1">
                            <h5 class="footertiteltext fw-light">Contact Us</h5>
                        </div>
                        <div>
                            <h6 class="fw-light pt-2" style="color: #1a202c">
                                Roya offices in Amman, Jordan, Um Al-Heran, Media city blg, Sakhrah Mosharfeh st.,
                                next to the Radio and television Inc.
                                <br>
                                Telephone: 0096264206419
                                <br>
                                Fax: 0096264206524
                                <br>
                                P.O.Box: 961401 Amman, Jordan 11196
                            </h6>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <div class="p-1 cord">
                        <div class="footertitel p-1">
                            <h5 class="footertiteltext fw-light">Follow Us</h5>
                        </div>

                    </div>
                    <ul class="d-flex justify-content-center  mt-4  gap-4 ">
                        <li><a href="#" class="fa fa-facebook iconsfooter"></a></li>
                        <li><a href="#" class="fa fa-twitter iconsfooter"></a></li>
                        <li><a href="#" class="fa fa-instagram iconsfooter"></a></li>
                        <li><a href="#" class="fa iconsfooter">&#xf16a;</i>
                            </a></li>
                        <li><a href="#" class="fa fa-rss iconsfooter"></a></li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12">

                    <div>
                        <div class=" Policy ">
                            <a class="Policylink" href="#">Privacy Policy</a>
                            <a class="Policylink" href="#">Intellectual Property</a>
                            <a class="Policylink" href="#">Privacy Policy</a>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright text-center py-3">Roya © 2022 All Rights Reserved
                </div>
            </div>
        </section>
    </footer>
</div>
<script>

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/javascript.js')}}"></script>
@yield('scripts')
</body>
</html>
