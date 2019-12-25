@extends("auth.layouts")

@section("title")
Admin Registration :: Programmer Towheed
@endsection
@section("registerClass")
margin-top: 50px;margin-bottom: 50px;
@endsection


@section("content")
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h4 class="log-text text-center mb-4">Admin Registration</h4>

        <div class="form-group">
            <label for="first_name"><i class="fas fa-pencil-alt mr-2"></i>{{ __('First Name') }}<span class="requerd">*</span></label>

            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First name">

            @error('first_name')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name"><i class="fas fa-pencil-alt mr-2"></i>{{ __('Last Name') }}</label>

            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus placeholder="Last name">

            @error('last_name')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="username"><i class="fas fa-pencil-alt mr-2"></i>{{ __('User Name') }}<span class="requerd">*</span></label>

            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="User name">

            @error('username')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone_no"><i class="fas fa-pencil-alt mr-2"></i>{{ __('Phone No') }}<span class="requerd">*</span></label>

            <input type="text" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus placeholder="Phone Number">

            @error('phone_no')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="street_address"><i class="fas fa-pencil-alt mr-2"></i>{{ __('Street Address') }}<span class="requerd">*</span></label>

            <input type="text" class="form-control @error('street_address') is-invalid @enderror" id="street_address" name="street_address" value="{{ old('street_address') }}" autocomplete="street_address" autofocus placeholder="Stress Address">

            @error('street_address')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="division_id"><i class="fas fa-pencil-alt mr-2"></i>Division<span class="requerd">*</span></label>
            <select id="division_id" class="form-control" name="division_id">
                <option value="" selected>Please select your division</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
            @error('division_id')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="district_id"><i class="fas fa-pencil-alt mr-2"></i>District<span class="requerd">*</span></label>
            <select id="district_id" class="form-control" name="district_id">
                <option value="" selected>Please select your division</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
            @error('district_id')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email"><i class="fas fa-envelope mr-2"></i>{{ __('E-Mail Address') }}<span class="requerd">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
            @error('email')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password"><i class="fas fa-key mr-2"></i>{{ __('Password') }}<span class="requerd">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Enter password">
            @error('password')
            <span style='color:red;font-size:18px;display:block'>
                            {{ $message }}
                    </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="password-confirm"><i class="fas fa-key mr-2"></i>{{ __('Confirm Password') }}<span class="requerd">*</span></label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="Enter Confirm password">
        </div>

        <div class="text-center">
            <button type="submit" class="btn col-6 tomato mt-3">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
