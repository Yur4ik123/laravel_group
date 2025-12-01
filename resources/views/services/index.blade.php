@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="/css/services.css">
@endpush

@section('content')
<div class="container py-5">
    <!-- Блок інформації про послугу -->
    <div class="row service-info-block mb-5">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
            <div class="service-image-wrapper">
                <img src="https://placehold.co/500x400/39cc38/ffffff?text=500x400" alt="Назва послуги" class="img-fluid rounded shadow">
            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="service-details">
                <h1 class="service-title mb-3">Назва послуги</h1>
                <p class="service-description text-muted mb-4">
                    Детальний опис послуги. Тут можна розповісти про всі особливості процедури,
                    які техніки використовуються, які результати очікувати. Опис може бути досить
                    довгим і включати всю необхідну інформацію для клієнта.
                </p>

                <div class="service-meta">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="meta-item d-flex align-items-center">
                                <i class="bi bi-currency-dollar fs-4 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Ціна</small>
                                    <strong class="fs-5">1500 грн</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="meta-item d-flex align-items-center">
                                <i class="bi bi-clock fs-4 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Тривалість</small>
                                    <strong class="fs-5">1.5 години</strong>
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
                <div class="date-selector mb-4">
                    <div class="row g-2">
                        <div class="col-auto">
                            <button class="btn btn-date active">
                                <div class="date-day">ПН</div>
                                <div class="date-number">28</div>
                                <div class="date-month">Лис</div>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-date">
                                <div class="date-day">ВТ</div>
                                <div class="date-number">29</div>
                                <div class="date-month">Лис</div>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-date">
                                <div class="date-day">СР</div>
                                <div class="date-number">30</div>
                                <div class="date-month">Лис</div>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-date">
                                <div class="date-day">ЧТ</div>
                                <div class="date-number">1</div>
                                <div class="date-month">Гру</div>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-date">
                                <div class="date-day">ПТ</div>
                                <div class="date-number">2</div>
                                <div class="date-month">Гру</div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Таймслоти -->
                <div class="timeslots-grid">
                    <div class="row g-3">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 09:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 10:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 11:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn disabled" disabled>
                                <i class="bi bi-x-circle me-1"></i> 12:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 13:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 14:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 15:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 16:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 17:00
                            </button>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <button class="btn w-100 timeslot-btn">
                                <i class="bi bi-clock me-1"></i> 18:00
                            </button>
                        </div>
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
                        <button class="btn btn-primary">
                            Забронювати
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
