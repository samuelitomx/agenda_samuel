{{--<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>--}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  @vite (['resources/css/login.css'])
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <h1>Login</h1>
        <div class="input-box">
            <input placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input placeholder="Password" id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password">
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="remember-forgot">
            <label for="remember_me"><input type="checkbox" id="remember_me" name="remember">Remember Me</label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
        </div>
        <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>