@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="row d-flex mb-5 contact-info justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Road# 1, House# 17, Senpara parbota (Ground floor, 1st floor & 3rd floor), Mirpur-10, Dhaka-1216, Bangladesh</p>
                        </div>
                        <div class="col-md-4 text-center border-height py-4">
                            <div class="icon">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span>
                                <a href="tel:+880-1976-605555">+880-1976-605555</a><br>
                                <a href="tel:+88-02-9030394">+88-02-9030394</a>
                            </p>
                        </div>
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row block-9 justify-content-center mb-5">
                <div class="col-md-8 mb-md-5">
                    <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>
                    <form action="{{ route('contact_post') }}" class="bg-light p-5 contact-form" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" placeholder="Your Name" required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' :'' }}" placeholder="Your Email" required>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' :'' }}" placeholder="Subject" required>

                            @error('subject')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control {{ $errors->has('message') ? 'is-invalid' :'' }}" placeholder="Message" required></textarea>

                            @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container-fluid px-0">
            <div id="map"></div>
        </div>
    </section>
@endsection

@section('additionalJS')

    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: 23.7405546, lng: 90.3810843};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 19, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
            var map = new google.maps.Map(
                document.getElementById('map_footer'), {zoom: 14, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});

        }
    </script>
@endsection
