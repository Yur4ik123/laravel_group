@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 50px;">
        <div style="width: 100%; max-width: 600px; padding: 30px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h2 style="text-align: center; color: var(--color-green); margin-bottom: 30px;">
                {{ __('profile.title') }}
            </h2>

            <form class="w-full" method="POST" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name" style="display: block;">
                        {{ __('profile.name') }}
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="surname" style="display: block;">
                        {{ __('profile.surname') }}
                    </label>
                    <input id="surname" type="text" name="surname" value="{{ old('surname', $user->surname) }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="email" style="display: block;">
                        {{ __('profile.email') }}
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone" style="display: block;">
                        {{ __('profile.phone') }}
                    </label>
                    <input id="phone" type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                           placeholder="+38 (0__) ___-__-__" required class="form-control">
                </div>

                <button type="submit" class="btn btn-primary"
                        style="background-color: var(--color-green); border-color: var(--color-green); color: var(--color-white); padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; transition: var(--transition-default); align-self: center;">
                    {{ __('profile.save') }}
                </button>
            </form>

            <hr style="margin: 30px 0; border-color: #e0e0e0;">

            <div style="display: flex; justify-content: center; gap: 15px; font-weight: 500;">
                <a href="{{ route('profile.password') }}" style="color: var(--color-green); text-decoration: none;">
                    {{ __('profile.change_password') }}
                </a>
                |
                <a href="{{ route('profile.bookings') }}" style="color: var(--color-green); text-decoration: none;">
                    {{ __('profile.my_bookings') }}
                </a>
                |
                <form method="post" action="{{route('logout')}}" style="width: fit-content;">
                <button type="submit" style="color: var(--color-green); text-decoration: none; display: inline-flex">
                    {{__('profile.logout')}}
                </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: var(--transition-default);
        }

        .form-control:focus {
            border-color: var(--color-green);
            outline: none;
            box-shadow: 0 0 0 2px rgba(57, 204, 56, 0.2);
        }

        .btn-primary:hover {
            background-color: #2faa2f;
            border-color: #2faa2f;
        }

        label {
            font-weight: 500;
        }
    </style>
@endsection
