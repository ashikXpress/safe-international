@extends('layouts.app')
@section('additionalCSS')
    <link rel="stylesheet" href="{{asset('plugins/zoom/smoothproducts.css')}}">
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


        #gallery_01 img {
            border: 2px solid white;
        }

        /*Change the colour*/
        .active img {
            border: 2px solid #333 !important;
        }

    </style>
@endsection
@section('content')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Machine Details</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row machine-content">
                        <h2 class="col-sm-12 machine-model">Model: {{$machine->model}}</h2>
                        <div class="col-sm-5">
                            <div class="sp-wrap">
                                <a href="{{asset('uploads/machine/'.$machine->image1)}}"><img src="{{asset('uploads/machine/'.$machine->image1)}}" alt=""></a>
                                <a href="{{asset('uploads/machine/'.$machine->image2)}}"><img src="{{asset('uploads/machine/'.$machine->image2)}}" alt=""></a>
                                <a href="{{asset('uploads/machine/'.$machine->image3)}}"><img src="{{asset('uploads/machine/'.$machine->image3)}}" alt=""></a>

                            </div>
                        </div>
                        <div class="col-sm-5 machine-text">
                            <h3 class="machine-type">Machine Type: {{$machine->type}}</h3>
                            <h4 class="machine-capacity">Machine Capacity: {{$machine->capacity}}</h4>
                            <p class="machine-description">{!! $machine->description !!}</p>

                        </div>
                    </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
@section('additionalJS')
    <script type="text/javascript" src="{{asset('plugins/zoom/smoothproducts.min.js')}}"></script>


        <script type="text/javascript">
            $('.sp-wrap').smoothproducts();
    </script>
@stop
