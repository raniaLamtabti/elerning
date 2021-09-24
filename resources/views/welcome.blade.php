@extends('layouts.app')

@section('content')
<div class="home">
    <section class="hero">
        <div class="content">
            <h1 class="display">Bienvenu a notre Platform</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, eos. repellat libero sunt odit fugiat obcaecati in.</p>
            <a class="btn primary-btn" href="learning/pricing.html">Get Started</a>
        </div>
        <div class="image imageHero" style="min-width: 50%">
            <img src="{{ asset('siteImages/home.png')}}" alt="">
        </div>
    </section>
    <section class="whyUs">
        <div class="image whyUsImage">
            <img src="{{ asset('siteImages/whyUs.png') }}" alt="">
        </div>
        <div class="content">
            <ul>
                <li>
                    <div><i class="bi bi-spellcheck"></i></div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                </li>
                <li>
                    <div><i class="bi bi-star-fill"></i></div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                </li>
                <li>
                    <div><i class="bi bi-cloud-arrow-down-fill"></i></div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                </li>
                <li>
                    <div><i class="bi bi-alarm-fill"></i></div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="about">
        <h1>Ce que notre plateforme vous offre</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem ut voluptates laboriosam dicta nisi debitis! Similique perferendis expedita repudiandae reiciendis?</p>
        <a class="btn secondary-btn" href="">Voir Plus</a>
    </section>
    <section class="lastUpload">
        <h1>Dernier téléchargement</h1>
        <div class="coursesCards">
            @foreach ($courses as $course)
            <div class="card">
                <img src="{{ asset($course->image) }}" class="card-img-top" alt="Html Css">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <a href="{{ route('course.show', ['id' => $course->id]) }}" class="btn primary-btn">Voir le cours</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
