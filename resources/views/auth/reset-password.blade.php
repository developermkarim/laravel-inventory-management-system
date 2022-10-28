
 @include('auth.auth-footer')

    <div class="main-wrapper">
        <div class="account-content">
        <div class="login-wrapper">
        <div class="login-content">
        <div class="login-userset ">
        <div class="login-logo">
        <img src="{{asset('backend/assets/img/logo.png')}}" alt="img">
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <div class="form-login">
            <x-input-label for="email" :value="__('Email')" />
        <div class="form-addons">
        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        <img src="{{asset('backend/assets/img/icons/mail.svg')}}" alt="img">
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger " />
        </div>

        </div>

        <div class="form-login">
            <x-input-label for="email" :value="__('password')" />
        <div class="form-addons">
        <input type="password" id="password" type="password" name="password" required />
        <span class="fas toggle-password fa-eye-slash"></span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-login">
        <div class="form-addons">
        <input type="password" id="password_confirmation" type="password"
        name="password_confirmation" required />
        <span class="fas toggle-password fa-eye-slash"></span>
       
        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger " />
        </div>


        <div class="form-login">
        <button class="btn btn-login">Submit</button>
        </div>
        </form>
        </div>
        </div>
        <div class="login-img">
        <img src="{{asset('backend/assets/img/login.jpg')}}" alt="img">
        </div>
        </div>
        </div>
        </div>

        @include('auth.auth-footer')