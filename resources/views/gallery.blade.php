@extends('layouts.app')

@section('additionalCSS')
    <link href="{{ asset('plugins/lightbox2/css/lightbox.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Gallery</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            @foreach($items->chunk(4) as $row)
                <div class="row mb-3">
                    @foreach($row as $item)
                        <div class="col-md-3">
                            <a href="{{ asset('uploads/gallery/'.$item->image) }}" data-lightbox="album" data-title="{{ $item->title }}" data-alt="{{ $item->title }}">
                                <img src="{{ asset('uploads/gallery/thumbs/'.$item->image) }}" class="img-thumbnail">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{ $items->links() }}
        </div>
    </section>
@endsection

@section('additionalJS')
    <script src="{{ asset('plugins/lightbox2/js/lightbox.min.js') }}"></script>
@endsection
