@extends('layouts.app')

@section('content')
<div class="courses">
    <section class="hero" style="background-color: #fff; margin-top: -24px">
        <div class="content">
            <h1>Trouvez votre patient</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, temporibus?</p>
        </div>
    </section>
    <section class="coursesSection">
        <h1>Notre Cours</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="owl-carousel owl-theme">
            @foreach ($courses as $course)
            <div class="item card">
                <img src="{{ asset($course->image) }}" class="card-img-top" alt="Html Css">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <a href="{{ route('courseClient.show', ['id' => $course->id]) }}" class="btn primary-btn">See Course</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
