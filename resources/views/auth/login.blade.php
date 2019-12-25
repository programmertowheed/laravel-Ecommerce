@extends("auth.layouts")

@section("title")
User Login :: Programmer Towheed
@endsection


@section("content")
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h4 class="log-text text-center mb-4">Log In</h4>
            @if (session('success'))
                <span style='color:green;max-width: 350px;font-size:18px;display:block'>
                    {{ session('success') }}
                </span>
            @endif
            @if (session('error'))
                <span style='color:red;font-size:18px;display:block'>
                    {{ session('error') }}
                </span>
            @endif
        <div class="form-group">
            <label for="email"><i class="fas fa-envelope mr-2"></i>{{ __('E-Mail Address') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter email">
            @error('email')
                <span style='color:red;font-size:18px;display:block'>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"><i class="fas fa-key mr-2"></i>{{ __('Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password" placeholder="Password">
            @error('password')
            <span style='color:red;font-size:18px;display:block'>
                    {{ $message }}
                </span>
            @enderror
        </div>


        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                <label for="remember" class="form-check-label">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn col-6 tomato" name="submit" >
                {{ __('Login') }}
            </button>
        </div>
        <div class="form-group fgbutton  mb-0">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
                <a class="float-right" href="{{ route('register') }}">
                    {{ __('Need an account?') }}
                </a>
        </div>
    </form>
@endsection
