@extends('layouts.app')
@section('content')
    <section id="home">
        <div class="main-face">
            <div class="home-text">
                <h2>{{ __('home.hero_title') }}</h2>
                <p>{{ __('home.hero_subtitle') }}</p>
                <a href="#services">
                    <button type="button">{{ __('home.view_services') }}</button>
                </a>

            </div>
        </div>
    </section>
    <div class="container">
        <section id="about">
            <div class="about-text animate__animated animate__fadeInUp">
                <h2>{{ __('home.about_title') }}</h2>
                <span>{{ __('home.about_subtitle') }}</span>
                <p>{{ __('home.about_text') }}</p>
            </div>
            <div class="about-img animate__animated animate__fadeInRight">
                <img src="images/about-me.jpg" alt="">
            </div>
        </section>
    </div>
    <section id="services">
        <div class="container">
            <div class="animate__animated animate__fadeInLeft mb-[50px]">
                <p>{{ __('home.services_subtitle') }}</p>
                <h2>{{ __('home.services_title') }}</h2>
            </div>
            <div class="cards">
                @forelse($categories as $category)
                    <div class="service-card animate__animated animate__fadeIn">
                        <a href="{{ route('categories.show', $category->slug) }}">
                            <img
                                src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/service-placeholder.jpg') }}"
                                alt="{{ $category->name }}"
                            >
                            <h3>{{ $category->name }}</h3>
                        </a>
                    </div>
                @empty
                    <p>{{ __('home.no_categories') }}</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
