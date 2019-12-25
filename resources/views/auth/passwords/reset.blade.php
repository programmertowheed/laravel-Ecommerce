@extends("auth.layouts")

@section("title")
User Password Reset :: Programmer Towheed
@endsection


@section("content")

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <h4 class="log-text text-center mb-4">{{ __('Reset Password') }}</h4>
        <div class="form-group">
            <label for="email"><i class="fas fa-envelope mr-2"></i>{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
            @error('email')
            <span style='color:red;font-size:18px;display:block'>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password"><i class="fas fa-key mr-2"></i>{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
            @error('password')
            <span style='color:red;font-size:18px;display:block'>
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm"><i class="fas fa-key mr-2"></i>{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>


        <div class="text-center">
            <button type="submit" class="btn col-6 tomato" name="submit" >
                {{ __('Reset Password') }}
            </button>
        </div>

    </form>
@endsection
