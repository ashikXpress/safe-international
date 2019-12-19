@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">{{ $item->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            {!! $item->content !!}
        </div>
    </section>
@endsection
