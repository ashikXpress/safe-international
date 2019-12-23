@extends('layouts.app')

@section('additionalCSS')

    <style>
        .jar-content {
            border: 1px solid #eee;
            background: #fafafa;
        }

        .jar-bottle-img {
            width: 100%;
            height: 450px;
            overflow: hidden;
            padding: 10px 10px;
        }

        .jar-bottle-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .jar-bottle-header h1 {
            font-weight: bold;
            text-transform: capitalize;
            margin: 0;
            border: 1px solid #ddd;
            padding: 5px 5px;
            margin: 11px 0;
            box-shadow: 0 0px 1px #ada8a8;
            font-size: 29px;
        }

        .jar-bottle-header {
            padding: 0 11px;
        }

        .jar-text p {
            font-size: 20px;
            color: #000;
        }

        .jar-text {
            padding: 7px 0;
        }

        .jar-bottle-item {
            border: 1px solid #eee;
            padding: 10px 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 6px #ddd;
            transition:all ease-in-out .5ms;
        }
        .jar-bottle-item:hover{
            opacity: 0.9;
        }
        .bottle-img {
            width: 100%;
            height: 300px;
        }

        .bottle-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .bottle-text {
            text-align: center;
            margin-top: 7px;
        }

        .bottle-text h4 {
            font-weight: bold;
            text-transform: capitalize;
            font-size: 22px;
        }

        .bottle-text h5 {
            margin: 0;
            font-size: 17px;
            color: #1c7d08;
            font-weight: bold;
        }

        .bottle-text h5 span{
            color: #000;
        }

        .col-md-6.office-section {}

        .col-md-6.office-section {
            overflow: hidden;
            border: 1px solid #eee;
        }

        .office-img {
            width: 100%;
            height: 200px;
        }

        .office-img img {
            width: 100%;
            min-height: 100%;
            object-fit: cover;
        }


     .office-section {

            border: 1px solid #eee;

        }

        .office-img {
            width: 100%;
            height: 200px;
        }

        .office-img img {
            width: 100%;
            min-height: 100%;
            object-fit: cover;
        }

        .office-text {
            text-align: center;
        }

        .office-text h3 {
            font-size: 19px;
            text-transform: capitalize;
            text-decoration: underline;
            font-weight: bold;
        }

        .office-text h4 {
            font-size: 17px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .office-text p {
            text-transform: capitalize;
            font-size: 20px;
        }
        .office-text p span {
            font-size: 25px;
            color: #1c7d08;
            font-weight: bold;
        }
        .office-text {
            padding: 15px 0;
        }

        .office-img {
            margin: 20px 0;
        }
        .water-pro-section{
            padding: 50px 0;
        }
.ftco-section{
    padding: 50px 0;
}
        h1.water-pro-title {
            padding-bottom: 15px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Jar Bottle</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row jar-content">
                <div class="col-md-12">
                    <div class="jar-bottle-header">
                        <h1>'CANY' Water Jar/Bottle</h1>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="jar-bottle-img"><img class="img-thumbnail" src="{{asset('img/jar_bottle.jpg')}}" alt=""></div>
                </div>
                <div class="col-md-7">
                    <div class="jar-text">
                        <p>‘Safe International’ is engaged in marketing ‘CANY’ brand bottled water, which is absolutely uncontaminated. Our supplied water is comparatively much more advanced than the other waters available in the contemporary market regarding standard and the quality, which has regularly been tested at different laboratories. (recent test report enclosed)

                            We are also distributing various types of imported water distilling instruments in the market, which is compatible for household use as well.

                            During the last glorified 16 years we have been able to achieve the total confidence of the customers, which inspired a number of well established, large, and leading companies of the country to have their faith on ‘CANY’ water and water dispensing machines at their offices. (Detailed list attached herewith).

                            We are pleased to offer you ‘CANY’ pure drinking water purified by Reverse Osmosis water purification system (U.S.A Technology) with Ultra Violet (UV) and Ozone(O3) for your organization</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="office">
        <div class="container">
            <div class="row">
                <div class="col-md-5 office-section">
                    <div class="row">

                            <div class="col-md-6 ">
                                <div class="office-text">
                                    <h3>CORPORATE OFFICE</h3>
                                    <h4>Price Per Jar/Bottle Is</h4>
                                    <p><span>BDT 82.50</span></p>
                                    <p>Without VAT Per Jar</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="office-img">
                                    <img src="{{asset('img/office.jpg')}}" alt="">
                                </div>
                            </div>


                    </div>
                </div>
                <div class="col-md-5 offset-2 office-section">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="office-text">
                                <h3>HOUSEHOLD</h3>
                                <h4>Price Per Jar/Bottle Is</h4>
                                <p> <span>BDT 91.50</span></p>
                                <p>Without VAT Per Jar</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="office-img">
                                <img src="{{asset('img/house.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="water-pro-section">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1 class="water-pro-title">Water Dispenser</h1>
                </div>
            </div>
            @foreach($bottles->chunk(3) as $row)
            <div class="row">
                @foreach($row as $bottle)
                <div class="col-sm-4">
                    <div class="jar-bottle-item">
                        <div class="bottle-img">
                            <img src="{{asset('uploads/bottle/'.$bottle->image)}}" alt="">
                        </div>
                        <div class="bottle-text">
                            <h4>{{$bottle->title}}</h4>
                            <h5><span>Price:</span> BDT {{$bottle->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="row">
                <div class="col-sm-12">{{$bottles->links()}}</div>

            </div>

        </div>
    </section>
@endsection


