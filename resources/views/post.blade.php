@foreach($categoryPost as $post)

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6   ">

        <a href="{{route('shownews' ,$post->id )}}" class="text-dark ">
            <div class="row p-0">
                <div class=" col-6 col-sm-6 col-md-12 col-lg-6 p-1 ">
                    <img class="img-fluid" src="{{asset($post->image)}}">
                </div>
                <div class=" col-6 col-sm-6 col-md-12 col-lg-6   ">
                    <p id="p">{{substr($post->title, 0, 35).'...'}}</p>
                    <span class=" m-0 p-0 time">
                    </span>
                </div>
            </div>
        </a>
    </div>
@endforeach
