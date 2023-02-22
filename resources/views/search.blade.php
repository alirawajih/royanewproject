@extends('layout')
@section('content')
    <div class="col-lg-8 col-md-8 ">
        <div class="accordion custom_accordion mb-2" id="accordionJordan">
            <div class="accordion-item">
                <h2 class="h2accordion" id="" style="    ">
                    <a class="" style="color: #000757">Search Results for "{{$search}}"</a>
                </h2>

                <div id="collapseJordan" class="accordion-collapse collapse show" aria-labelledby="headingJordan"
                     data-bs-parent="#accordionJordan">
                    <div class="accordion-body">
                        <div class="row" id="post-data">

                            @foreach($result as $news)

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-1   ">
                                    <a href="{{route('shownews' ,$news->id )}}" class="text-dark  ">
                                        <div class="row p-0">
                                            <div class=" col-6 col-sm-3 col-md-12 col-lg-6  ">
                                                <img class="img-fluid" src="{{asset($news->image)}}">
                                            </div>
                                            <div class=" col-6 col-sm-3 col-md-12 col-lg-6   ">
                                                <p id="p">{{substr($news->title, 0, 35).'...'}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @endforeach



                            {{$message}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

