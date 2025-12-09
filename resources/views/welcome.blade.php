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
    <section id="about">
        <div class="about-text">

            <h2>{{ __('home.about_title') }}</h2>
            <span>{{ __('home.about_subtitle') }}</span>
            <p>{{ __('home.about_text') }}</p>
        </div>
        <div class="about-img">
            <img src="images/about-me.jpg" alt="">
        </div>
    </section>
    <section id="services">
        <div>
            <p>{{ __('home.services_subtitle') }}</p>
            <h2>{{ __('home.services_title') }}</h2>
        </div>
        <div class="cards">
            @forelse($categories as $category)
                <div class="service-card">
                    <a href="{{ route('categories.show', $category->slug) }}">
                        <img
                            src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/service-placeholder.jpg') }}"
                            alt="{{ $category->name }}"
                        >
                        <h3>{{ $category->name }}</h3>
                        <p>{{ __('home.service_description') }}</p>
                    </a>
                </div>
            @empty
                <p>{{ __('home.no_categories') }}</p>
            @endforelse
        </div>

    </section>
    <section id="contacts">
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">{{ __('home.contact_name') }}</label>
                <input type="text" id="name" name="name">
                <label for="email">{{ __('home.contact_email') }}</label>
                <input type="email" id="email" name="email">
                <label for="phone">{{ __('home.contact_phone') }}</label>
                <input type="tel" id="phone" name="phone">
                <label for="message">{{ __('home.contact_message') }}</label>
                <textarea name="message" id="message" cols="10" rows="5"></textarea>
                <button type="submit" class="submit-message">{{ __('home.contact_submit') }}</button>
            </form>
        </div>
        <div class="other-contacts">
            <a href="https://google.com" target="_blank">
                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/telegram.svg"
                     alt="Telegram"
                     style="width:60px; height:60px; margin-right:10px;">
            </a>
            <a href="https://google.com" target="_blank">
                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/viber.svg"
                     alt="Viber"
                     style="width:60px; height:60px;">
            </a>
        </div>
    </section>
@endsection
