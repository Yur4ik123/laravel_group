@extends('layouts.app')

@section('content')
    <div class="container py-[50px]">
        <section class="category-header mb-5">
            <h2>{{ $category->name }}</h2>
        </section>

        <section class="category-services">
            <div class="cards">
                @forelse($services as $service)
                    <div class="service-card">
                        <a href="{{route('service.index',[$category->slug, $service->slug] )}}">
                            <img
                                src="{{ $service->images ? asset('storage/' . $service->images) : asset('images/service-placeholder.jpg') }}"
                                alt="{{ $service->name }}"
                            >
                            <h3>{{ $service->name }}</h3>

                            <p>{{ __('services.price') }}: {{ number_format($service->price, 2) }}</p>
                        </a>
                    </div>
                @empty
                    <p>{{ __('services.no_services') }}</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
