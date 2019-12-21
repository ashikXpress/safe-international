@extends('layouts.app')

@section('additionalCSS')

    <style>
        .machine-content {
            overflow: hidden;
            border: 1px solid #eee;
            text-align: center;
            margin: 15px 0px;
            background-color: #fafafa;
            padding: 15px 0;
        }

        .machine-img img {
            min-width: 100%;
            height: 250px;
            object-fit: contain;
            border: 1px solid #ddd;
            padding: 6px 4px;
        }

        .machine-model {
            text-align: left;
            font-weight: bold;
            padding: 10px 15px;
            border-bottom: 1px dotted #e1e1e1;
            text-transform: capitalize;
        }

        .ftco-section {
            padding: 25px !important;
        }
    </style>
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Machines</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach($machines as $machine)
                <div class="col-md-12">
                    <div class="row machine-content">
                        <h2 class="col-sm-12 machine-model">Model: {{$machine->model}}</h2>
                        <div class="col-sm-4 machine-img">
                            <img src="{{asset('uploads/machine/'.$machine->image1)}}" alt="">
                        </div>
                        <div class="col-sm-6 machine-text">
                        <h4 class="machine-type">Machine Type: {{$machine->type}}</h4>
                        <h4 class="machine-capacity">Machine Capacity: {{$machine->capacity}}</h4>
                        <p class="machine-description">{!! $machine->description !!}</p>
                            <a href="{{route('machine.details',$machine->id)}}" class="btn btn-info machine-btn">More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $machines->links() }}
        </div>
    </section>
@endsection


