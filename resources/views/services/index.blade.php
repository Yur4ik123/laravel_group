@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="/css/services.css">
@endpush
@push('scripts')
    <script src="/js/service.js"></script>
@endpush
@push('scripts')
    <script src="/js/ajax_for_send_booking.js"></script>
@endpush
@section('content')
    <div class="container py-5">
        <!-- Блок інформації про послугу -->
        <div class="row service-info-block mb-5">
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                <div class="service-image-wrapper">
                    <img src="{{Storage::url($service->images)}}" alt="Назва послуги" class="img-fluid rounded shadow">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="service-details">
                    <h1 class="service-title mb-3">{{$service->name}}</h1>
                    <p class="service-description text-muted mb-4">
                        {{$service->description}}
                    </p>

                    <div class="service-meta">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="meta-item d-flex align-items-center">
                                    <i class="bi bi-currency-dollar fs-4 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Ціна</small>
                                        <strong class="fs-5">{{$service->price}}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="meta-item d-flex align-items-center">
                                    <i class="bi bi-clock fs-4 me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Тривалість</small>
                                        <strong class="fs-5">1 hour</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок вибору часу -->
        <div class="row">
            <div class="col-12">
                <div class="timeslots-section">
                    <h2 class="section-title mb-4">
                        <i class="bi bi-calendar-check me-2"></i>
                        Оберіть зручний час
                    </h2>

                    <!-- Вибір дати -->
                    <div class="date-selector mb-4" id="dateSelector">
                        <div class="row g-2">
                            @foreach($weekDays as $day)
                                <div class="col-auto">
                                    <button class="btn btn-date {{$loop->first ? 'active': ''}}"
                                            data-date="{{$day->toDateString()}}"
                                            data-service-id="{{$service->id}}"
                                    >
                                        <div
                                            class="date-day">{{$day->locale(app()->getLocale())->isoFormat('dd')}}</div>
                                        <div class="date-number">{{ $day->format('d') }}</div>
                                        <div class="date-month">{{ $day->locale('uk')->isoFormat('MMM') }}</div>
                                    </button>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Таймслоти -->
                    <div class="timeslots-grid" id="timeslotsGrid">
                        <div class="row g-3">
                            {{-- js rendered block--}}
                        </div>
                    </div>

                <!-- Підсумок бронювання -->
                <div class="booking-summary mt-4" id="bookingSummary">
                    <div class="alert alert-info d-flex align-items-center justify-content-between">
                        <div>
                            <strong>Обрано:</strong>
                            <span id="selectedDate">28 листопада</span> о
                            <span id="selectedTime">09:00</span>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Забронювати
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('services.modal_form')
@endsection
