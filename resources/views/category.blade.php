@extends('layout')
@section('content')

    <div class="col-lg-8 col-md-8 ">
        <div class="accordion custom_accordion mb-2" id="accordionJordan">
            <div class="accordion-item">

                <h2 class="h2accordion" id="" style="    ">
                    <a class="" style="color: #000757">{{$category->name}}</a>
                </h2>
                <div id="collapseJordan" class="accordion-collapse collapse show" aria-labelledby="headingJordan"
                     data-bs-parent="#accordionJordan">
                    <div class="accordion-body">
                        <div class="row" id="post-data">
                            @include('post')
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('scripts')
    {{--    <script src="{{asset('js/javascript.js')}}"></script>--}}
@endsection
