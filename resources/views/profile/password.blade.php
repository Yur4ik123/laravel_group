@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 50px;">
        <div style="width: 100%; max-width: 500px; padding: 30px; background-color: #f9f9f9; border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

            <h2 style="text-align: center; color: var(--color-green); margin-bottom: 30px;">
                {{ __('profile.change_password') }}
            </h2>

            @if(session('success'))
                <div style="color: var(--color-green); text-align: center; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.password.update') }}"
                  style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                @method('PATCH')

                <div>
                    <label>{{ __('profile.current_password') }}</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div>
                    <label>{{ __('profile.new_password') }}</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div>
                    <label>{{ __('profile.confirm_password') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit"
                        style="background-color: var(--color-green); color:white; padding:10px;
                        border:none; border-radius:5px; font-weight:bold; cursor:pointer;">
                    {{ __('profile.save') }}
                </button>
            </form>

            <div style="text-align:center; margin-top:20px;">
                <a href="{{ route('profile.edit') }}" style="color: var(--color-green);">
                    ← {{ __('profile.back_to_profile') }}
                </a>
            </div>
        </div>
    </div>
@endsection
