@extends('layouts.app')
@section('additionalCSS')
    <style>
        span.typejs {
            font-size: 25px;
            color: #000;
            text-transform: capitalize;
        }

        .service-img {
            height: 300px;
            padding: 0 5px;
            width: 100%;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .service-img img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .service-text {
            text-align: left;
            margin-top: 35px;
            padding: 0 16px;
            margin-left: 15px;
            margin-right: 15px;
        }

        .service-text p {
            font-size: 19px;
            position: relative;

        }
        .service-text p span {
            position: absolute;
            left: -13px;
            top: -5px;
            font-size: 27px;
            font-weight: bold;
            color: #000;
        }
        h2.service-content-title {
            font-weight: bold;
            border-bottom: 1px dotted;
            display: inline-block;
            margin-bottom: 15px;
            font-size: 25px;
        }
        .no-gutters{
            margin-bottom: 25px;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="typejs"></span>
            </div>
        </div>
    </div>
    <section class="home-slider owl-carousel">
        @foreach($sliders as $slider)
            <div class="slider-item" style="background-image:url('{{ asset('uploads/slider/'.$slider->image) }}');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                        <div class="col-md-7 ftco-animate">
                            <span class="subheading">{{ $slider->subheading }}</span>
                            <h1 class="mb-4">{{ $slider->heading }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Project</h2>
                </div>

            </div>
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-sm-4">
                        <div class="project-carousel">
                            <div class="item-project">
                                <div class="item-img"><img src="{{asset('uploads/project/'.$project->image)}}" alt=""></div>
                                <div class="item-project-text">
                                    <h2>{{$project->title}}</h2>
                                    <p>{!! $project->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Services</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12 text-center">
                    <h2 class="service-content-title">" BACKGROUND & OBJECTIVES"</h2>
                </div>
               <div class="col-md-3">

                   <div class="service-img">
                       <img src="{{asset('img/service/a.png')}}" alt="">
                   </div>
               </div>
                <div class="col-md-9">
                    <div class="service-text">
                        <p><span>"</span>Safe International'' is the most modern water purification plant in Bangladesh. With a hope to provide purified drinking water to household and corporate customers in 5 US gallon jars. Established in 2003 by Origin Taiwan & USA Technology Water Purifier in Bangladesh. We purify water at international standard which may be compared to any other renowned water purifiying company in the world!</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12 text-center">
                    <h2 class="service-content-title">"PURIFICATION PROCESS"</h2>
                </div>
               <div class="col-md-3">

                   <div class="service-img">
                       <img src="{{asset('img/service/b.jpg')}}" alt="">
                   </div>
               </div>
                <div class="col-md-9">
                    <div class="service-text">
                        <p><span>"</span>Our position is very clear about water purification and the complexity associated with it. The machinery, we use, are most modern and sophisticated and are extensively used in all latest purification plants in USA . The technology, employed in our plant is, most up to date and specifically engineered to suite our environmental conditions and our water. We may mention here that, any appliance, unless specifically calculated to suite our environment that may cause more damage than apparent benefits. Click Here to find out more on our 6 step purification process</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12 text-center">
                    <h2 class="service-content-title">"CUSTOMER SERVICE"</h2>
                </div>
               <div class="col-md-3">

                   <div class="service-img">
                       <img src="{{asset('img/service/c.png')}}" alt="">
                   </div>
               </div>
                <div class="col-md-9">
                    <div class="service-text">
                        <p><span>"</span>Our customer service team provides personalized attention to all your queries. A comprehensive record is maintained about each customer on our integrated computer network making it easier for us to comprehend your situation at the time of your call. Our qualified and helpful executives are also available to discuss in person your needs and requirements for water. One phone call can put you in touch with our professional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Meet Our Team</span> Member</h2>
                </div>
            </div>
            <div class="row">
                @foreach($members as $member)
                    <div class="col-sm-4  ftco-animate">
                        <div class="member-content">
                            <div class="member-img">
                                <img src="{{asset('uploads/team/'.$member->image)}}" alt="">
                            </div>
                            <div class="member-text">
                                <h3>{{$member->name}}</h3>
                                <h5>{{$member->designation}}</h5>
                                <p>Mobile number: {{$member->mobile_number}}</p>
                                <p>Email: {{$member->email}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Recent</span> News</h2>
                </div>
            </div>
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
        </div>
    </section>


@endsection
