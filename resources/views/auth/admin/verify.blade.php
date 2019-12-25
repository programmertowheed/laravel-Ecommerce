@extends("auth.layouts")

@section("title")
Admin Password Reset :: Programmer Towheed
@endsection


@section("content")

    <h4 class="log-text text-center mb-4">{{ __('Verify Your Email Address') }}</h4>

    <div class="card-body">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
    </div>

@endsection
