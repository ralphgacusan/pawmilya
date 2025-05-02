<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Pawmilya</title>
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
    @vite(['resources/css/signup.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <a href="{{ route('client.home') }}" class="home-link">
        <i class="fas fa-home"></i> Home
    </a>
    <div class="container">
        <div class="image-section">
            <img src="{{ asset('imgs/dog-signin.jpg') }}" alt="Login Image" />
        </div>
        <div class="form-section">
            <div class="form-wrapper">
                <h1>Welcome to Pawmilya.</h1>
                <p>Find your perfect companion or give a pet a forever home today.</p>

                <form action="{{ route('auth.submit.signup') }}" method="POST">
                    @csrf

                    <div class="input-group">
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="first_name" type="text" placeholder="Enter your first name"
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="last_name" type="text" placeholder="Enter your last name"
                            value="{{ old('last_name') }}">
                        @error('last_name')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="phoneNumber">Phone number</label>
                        <input id="phoneNumber" name="phone_number" type="text" placeholder="Enter your phone number"
                            value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select your
                                gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="prefer_not_to_say"
                                {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>
                                Prefer not to say
                            </option>
                        </select>
                        @error('gender')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="home_address">Home Address</label>
                        <input id="address" name="home_address" type="text" placeholder="Enter your home address"
                            value="{{ old('home_address') }}">
                        @error('home_address')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="birthDate">Date of Birth</label>
                        <input id="birthDate" name="birth_date" type="date" value="{{ old('birth_date') }}">
                        @error('birth_date')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email" placeholder="Enter your email address"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="experience">Do you have experience with pets?</label>
                        <select id="experience" name="experience">
                            <option value="" disabled {{ old('experience') == '' ? 'selected' : '' }}>Select an
                                option</option>
                            <option value="yes" {{ old('experience') == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ old('experience') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('experience')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Enter your password">
                        @error('password')
                            <small class="input-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm your password">
                    </div>

                    <div class="form-actions">
                        <div class="center-buttons">
                            <button id="register-button" type="submit">
                                Sign Up
                            </button>
                            <div class="signup">
                                <p>Already have an account? <a href="{{ route('auth.signin') }}">Sign in</a></p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>
