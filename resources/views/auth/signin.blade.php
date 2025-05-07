<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - Pawmilya</title>
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="login.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="body">
    <!-- Home Button -->
    <a href="{{ route('client.home') }}" class="home-link">
        <i class="fas fa-home"></i> Home
    </a>
    <div class="container">
        <!-- Left: Image -->
        <div class="image-section">
            <img src="{{ asset('imgs/cat2.png') }}" alt="Login Image" />
        </div>

        <!-- Right: Login Form -->
        <div class="form-section">
            <h1 id="login-headline">Sign in</h1>
            <form action="{{ route('auth.submit.signin') }}" method="POST">
                @csrf
                <!-- email -->
                <div class="form-group">
                    <label for="email" id="username-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        value="{{ old('email') }}" />

                    <p class="error-msg">
                        @error('email')
                            {{ $message }}
                        @else
                            &nbsp;
                        @enderror
                    </p>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" id="password-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required />
                    <p class="error-msg">
                        @error('password')
                            {{ $message }}
                        @else
                            &nbsp;
                        @enderror
                    </p>
                </div>


                <!-- Login Button -->
                <button type="submit" id="login-button">Log in</button>
            </form>

            <!-- Signup Link -->
            <div class="signup">
                <p>Don't have an account? <a href="{{ route('auth.signup') }}">Sign up</a></p>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="modal hidden">
        <div class="modal-content">
            <h2>Login Successful!</h2>
            <p>Redirecting to your profile...</p>
            <button id="proceed-button">Proceed</button>
        </div>
    </div>
</body>

</html>
