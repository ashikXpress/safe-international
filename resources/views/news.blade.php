@extends('layouts.app')

@section('content')
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

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($newses as $news)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ route('news_details', ['id' => $news->id]) }}" class="block-20 d-flex align-items-end" style="background-image: url('{{ asset('uploads/news/image/'.$news->image) }}');">
                                <div class="meta-date text-center p-2">
                                    <span class="day">{{ date("d", strtotime($news->uploaded_at)) }}</span>
                                    <span class="mos">{{ date("F", strtotime($news->uploaded_at)) }}</span>
                                    <span class="yr">{{ date("Y", strtotime($news->uploaded_at)) }}</span>
                                </div>
                            </a>
                            <div class="text bg-white p-4">
                                <h3 class="heading"><a href="{{ route('news_details', ['id' => $news->id]) }}">{{ $news->title }}</a></h3>
                                <p>{!! Str::words($news->description, 15) !!}</p>
                                <div class="d-flex align-items-center mt-4">
                                    <p class="mb-0"><a href="{{ route('news_details', ['id' => $news->id]) }}" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        {{ $news->author }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $newses->links() }}
        </div>
    </section>
@endsection
