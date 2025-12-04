<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'name' => ['string'],
            'surname' => ['nullable','string'],
            'phone' => ['string'],
            'email' => ['email'],
            'service_id' => ['required', 'exists:services,id'],
            'slot_id' => ['required', 'exists:slots,id'],
            'date' => ['required', 'date', 'after_or_equal:today'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'service_id.required' => 'Оберіть послугу',
            'service_id.exists' => 'Обрана послуга не існує',
            'slot_id.required' => 'Оберіть час',
            'slot_id.exists' => 'Обраний час недоступний',
            'date.required' => 'Вкажіть дату бронювання',
            'date.date' => 'Невірний формат дати',
            'date.after_or_equal' => 'Дата бронювання не може бути в минулому',
            'email.email' => 'Невірний формат email',
            'user_id.exists' => 'Користувач не знайдений',
        ];
    }
}
