@extends('layouts.app')

@section('additionalCSS')
    <style>
        .client img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .client {
            border: 1px solid #eee;
            padding: 5px 5px;
            margin: 15px 0;
            box-shadow: 0 0 5px 0 #e6e6e6;
            border-radius: 5px;
            transition: all 500ms ease;
        }
        .client:hover{
            box-shadow: 0 0 7px 0 #e6e6e6;
            opacity: 0.7;
        }

        .client-text {
            text-align: center;
        }

        h5.card-title {
            font-size: 22px;
            text-transform: capitalize;
            font-weight: bold;
            margin: 0;
            padding: 3px 0;
        }
    </style>
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Clients</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="client-sections">
        <div class="container">
            <div class="row">
                @foreach($clients as $client)
                    <div class="col-md-3">
                        <div title="{{$client->name}}" class="client">
                            <img src="{{ asset('uploads/client/'.$client->image) }}"  alt="{{$client->name}}">
                            <div class="client-text">
                                <h5 class="card-title">{{$client->name}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{$clients->links()}}
        </div>
    </section>
@endsection
