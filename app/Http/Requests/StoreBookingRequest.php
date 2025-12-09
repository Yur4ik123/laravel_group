<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'name' => ['required', 'string'],
            'surname' => ['nullable', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
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
        return
            [
                'user_id.exists' => 'Пользователь не найден',
                'name.required' => 'Укажите имя',
                'name.string' => 'Имя должно быть текстом',
                'surname.string' => 'Фамилия должна быть текстом',
                'phone.required' => 'Укажите номер телефона',
                'phone.string' => 'Номер телефона должен быть текстом',
                'email.required' => 'Укажите email',
                'email.email' => 'Неверный формат email',
                'service_id.required' => 'Выберите услугу',
                'service_id.exists' => 'Выбранная услуга не существует',
                'slot_id.required' => 'Выберите время',
                'slot_id.exists' => 'Выбранное время недоступно',
                'date.required' => 'Укажите дату бронирования',
                'date.date' => 'Неверный формат даты',
                'date.after_or_equal' => 'Дата бронирования не может быть в прошлом',
            ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation failed for your request.',
                'errors' => $validator->errors()->toArray(),
            ], 422)
        );
    }
}
