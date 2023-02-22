@extends('layout')
@section('content')
    <div class="col-lg-8 col-md-8 ">
        <a href="{{route('shownews' ,$latest->id )}}">
            <div class="Image">
                <img class="img-fluid" src="{{asset($latest->image)}}">
                <div class="content">
                    <p>{{$latest->title}}</p>
                </div>
            </div>
        </a>


        <div class="row mt-2 detail mb-3">
            @foreach($postnews as $news)
                @if($news->id == $latest->id)@else
                    <div class="col-lg-4 col-xs-6 col-md-6 col-sm-6  ps-2">
                        <a href="{{route('shownews' ,$news->id )}}" class="text-dark ">
                            <div class="row">
                                <div class="col-xs-7 col-md-12 col-lg-12 col-6 ">
                                    <img class="img-fluid" style="height: 125px" src="{{$news->image}}">
                                </div>
                                <div class="col-xs-5 col-md-12 col-lg-12  col-6">
                                    <p id="p">{{ substr($news->title, 0, 35).'...'}}</p>

                                </div>

                            </div>
                        </a>
                    </div>

                @endif

            @endforeach
        </div>
        @foreach($categoryPosts as $category)
            <div class="accordion custom_accordion mb-2" id="accordion{{$category->name}}">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$category->name}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{$category->name}}" aria-expanded="true"
                                aria-controls="collapseOne">
                            {{$category->name}}
                        </button>
                    </h2>
                    <div id="collapse{{$category->name}}" class="accordion-collapse collapse show"
                         aria-labelledby="heading{{$category->name}}"
                         data-bs-parent="#accordion{{$category->name}}">
                        <div class="accordion-body">
                            <div class="row">
                                @foreach($category->posts as $news)
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
                                <div class="col-12">
                                    <div class="d-grid">
                                        <a href="{{route('shownewscategory',$category->id)}}"
                                           class=" morefrom text-center mt-2 p-2">More form {{$category->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
