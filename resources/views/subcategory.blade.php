@extends('layout')
@section('content')

    <div class="col-lg-8 col-md-8 ">
        <div>
            <p class="parggraphsup">  {{$postnewsin->title}}
            </p>
        </div>
        <div class="row container pb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 gap-3 dateersup ">
                <p class="fa fa-sliders datebordersup " alt="Category">
                    <a class="linkdatesup"
                       href="{{route('shownewscategory',$postnewsin->category->id)}}">{{$postnewsin->category->name}}   </a>
                </p>
                <p class="date">Published: {{$postnewsin->created_at}}   </p>
                <p class="date"> Last Updated: {{$postnewsin->updated_at}}</p>
                <br>
            </div>
        </div>
        <div class="Image">
            <img class="img-fluid" src="{{asset($postnewsin->image)}}">
            <div class="content">
                <p>{{$postnewsin->title}}</p>
            </div>
        </div>
        <div class="paragraph mt-3">
            <img class="img-thumbnail contentlogo" src="{{asset('image/logo.png')}}" alt="">
            <p class="contentP"> {{$postnewsin->description}}</p>
        </div>
        <div class="accordion custom_accordion mb-2 mt-3" id="accordionRelated Articles">
            <div class="accordion-item">
                <h2 class="h2accordion" id="" style="    ">
                    <a class="" style="color: #000757">Related Articles</a>
                </h2>

                <div id="collapseJordan" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach($categoryPost as $post)

                                @if($post->id != $postnewsin->id )
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-1  ">
                                        <a href="{{route('shownews' ,$post->id )}}" class="text-dark ">
                                            <div class="row p-0">
                                                <div class=" col-6 col-sm-3 col-md-12 col-lg-6  ">
                                                    <img class="img-fluid" src="{{asset($post->image)}}">
                                                </div>
                                                <div class=" col-6 col-sm-3 col-md-12 col-lg-6   ">
                                                    <p id="p">{{substr($post->title, 0, 35).'...'}}</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
