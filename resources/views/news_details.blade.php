@extends('layouts.app')

@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">News</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ftco-animate">
                    <h2 class="mb-3">{{ $news->title }}</h2>
                    <p>{{ $news->author }} - {{ date("F d, Y", strtotime($news->uploaded_at)) }}</p>
                    <img src="{{ asset('uploads/news/image/'.$news->image) }}" width="100%">
                    <br><br>
                    {!! $news->description !!}

                    <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="10"></div>
                </div> <!-- .col-md-12 -->
            </div>
        </div>
    </section>
@endsection
