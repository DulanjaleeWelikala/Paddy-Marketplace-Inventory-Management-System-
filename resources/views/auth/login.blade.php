<x-guest-layout>
    <head>
        <!-- Font Awesome for Eye Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset('img/GettyImages.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .auth-card {
            background-color: white;
            border-radius: 12px;
            padding: 60px;
            max-width: 400px;
            width: 130%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .auth-card h2 {
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 16px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .login-btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .login-btn:hover {
            background-color: #1d4ed8;
        }

        .forgot-password {
            font-size: 14px;
            color: #2563eb;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .status-message {
            color: green;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .validation-error {
            color: #dc2626;
            margin-top: 4px;
            font-size: 13px;
        }
    </style>

    <div class="overlay"></div>

    <div class="auth-card">
        <div class="logo-wrapper">
            <x-authentication-card-logo />
        </div>

        <!-- Status Message -->
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <x-label for="email" value="Email Address" />
                <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
                @error('email')
                    <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <x-label for="password" value="Password" />
                <div class="password-wrapper">
                    <x-input id="password" class="block w-full pr-12" type="password" name="password" required />
                    <i id="eyeIcon" class="fa-regular fa-eye" onclick="togglePassword()"></i>
                </div>
                @error('password')
                    <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="flex items-center">
                    <x-checkbox name="remember" id="remember_me" />
                    <span class="ms-2 text-sm">Remember me</span>
                </label>
            </div>

            <div class="actions">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="login-btn">Log in</button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</x-guest-layout>
