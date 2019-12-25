@extends("auth.layouts")

@section("title")
User Password Reset :: Programmer Towheed
@endsection


@section("content")


    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h4 class="log-text text-center mb-4">{{ __('Reset Password') }}</h4>

        @if (session('status'))
            <span style='color:green;font-size:18px;display:block'>
                {{ session('status') }}
            </span>
        @endif

        <div class="form-group">
            <label for="email"><i class="fas fa-envelope mr-2"></i>{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
        </div>
        @error('email')
        <span style='color:red;font-size:18px;display:block'>
                {{ $message }}
            </span>
        @enderror


        <div class="text-center">
            <button type="submit" class="btn tomato mt-3" name="submit" >
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
@endsection
