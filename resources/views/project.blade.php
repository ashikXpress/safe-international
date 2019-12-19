@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('themes/front/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread text-capitalize">Project - {{ $type }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="project mb-4 img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('uploads/project/'.$project->image) }}');">
                            <div class="overlay"></div>
                            <a href="{{ route('project_details', ['id' => $project->id]) }}" class="btn-site d-flex align-items-center justify-content-center"><span class="icon-subdirectory_arrow_right"></span></a>
                            <div class="text text-center p-4">
                                <h3><a href="{{ route('project_details', ['id' => $project->id]) }}">{{ $project->title }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $projects->links() }}
        </div>
    </section>
@endsection
