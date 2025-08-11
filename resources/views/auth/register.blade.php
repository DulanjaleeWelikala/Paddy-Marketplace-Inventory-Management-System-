<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Create Account</title>
<style>
  * {
    box-sizing: border-box;
  }
  body, html {
    margin: 0; padding: 0;
    height: 100%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url('{{ asset('img/GettyImages.jpg') }}') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  body::before {
    content: "";
    position: fixed;
    top:0; left:0; right:0; bottom:0;
    background: rgba(0, 0, 0, 0.45);
    z-index: 0;
  }

  /* Card container */
  .card {
    position: relative;
    z-index: 1;
    background-color: rgba(255, 255, 255, 0.97);
    padding: 20px 55px 20px; /* less vertical, more horizontal */
    border-radius: 14px;
    width: 100%;
    max-width: 520px; /* wider */
    margin-top: -10px;
    box-shadow:
      0 0 8px rgba(0,0,0,0.15),
      0 10px 30px rgba(0,0,0,0.25);
    transition: transform 0.3s ease;
  }
  .card:hover {
    transform: translateY(-5px);
  }

  h2 {
    margin: 0 0 28px 0;
    text-align: center;
    color: #222;
    font-weight: 700;
    letter-spacing: 1.3px;
    font-size: 1.9rem;
    user-select: none;
  }

  .input-group {
    margin-bottom: 22px;
  }
  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #444;
    font-size: 15px;
    user-select: none;
  }
  input[type="text"],
  input[type="email"],
  input[type="tel"],
  input[type="password"] {
    width: 100%;
    padding: 12px 24px; /* increased horizontal padding */
    border-radius: 12px;
    border: 1.6px solid #bbb;
    font-size: 15px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline-offset: 2px;
  }
  input[type="text"]:focus,
  input[type="email"]:focus,
  input[type="tel"]:focus,
  input[type="password"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
  }
  input.error {
    border-color: #dc2626 !important;
    background-color: #ffe6e6 !important;
  }
  .error-message {
    color: #dc2626;
    font-size: 13px;
    margin-top: 5px;
    font-weight: 600;
    user-select: none;
  }
  .password-strength {
    font-size: 13px;
    margin-top: 6px;
    font-weight: 600;
    color: #666;
    user-select: none;
  }
  .password-strength.weak {
    color: #dc2626;
  }
  .password-strength.medium {
    color: #e6a700;
  }
  .password-strength.strong {
    color: #0f9d58;
  }
  .checkbox-group {
    margin-bottom: 28px;
    font-size: 14px;
  }
  .checkbox-group label {
    display: flex;
    align-items: center;
    user-select: none;
    color: #444;
  }
  .checkbox-group input {
    margin-right: 12px;
    width: 18px;
    height: 18px;
    cursor: pointer;
    border-radius: 4px;
    border: 1.6px solid #bbb;
    transition: border-color 0.3s ease;
  }
  .checkbox-group input:checked {
    border-color: #007bff;
    background-color: #007bff;
  }
  .checkbox-group a {
    color: #007bff;
    text-decoration: none;
  }
  .checkbox-group a:hover {
    text-decoration: underline;
  }
  .btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 16px 0;
    width: 100%;
    font-weight: 700;
    border-radius: 12px;
    cursor: pointer;
    font-size: 17px;
    letter-spacing: 0.7px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    user-select: none;
  }
  .btn:hover,
  .btn:focus {
    background-color: #0056b3;
    box-shadow: 0 5px 15px rgba(0, 86, 179, 0.5);
    outline: none;
  }
  .link {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
    user-select: none;
  }
  .link:hover {
    text-decoration: underline;
  }
  @media (max-width: 480px) {
    .card {
      padding: 20px 25px 20px;
      max-width: 90vw;
    }
  }
</style>
</head>
<body>

<div class="card" role="main" aria-label="Create Account Form">
  <h2>Create Account</h2>

  <form id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
    @csrf
    <div class="input-group">
      <label for="name">Full Name</label>
      <input
        type="text" id="name" name="name"
        value="{{ old('name') }}"
        required autofocus aria-required="true" aria-describedby="nameError"
      >
      @error('name')
        <div class="error-message" id="nameError">{{ $message }}</div>
      @enderror
    </div>

    <div class="input-group">
      <label for="email">Email</label>
      <input
        type="email" id="email" name="email"
        value="{{ old('email') }}"
        required aria-required="true" aria-describedby="emailError"
      >
      @error('email')
        <div class="error-message" id="emailError">{{ $message }}</div>
      @enderror
    </div>

    <div class="input-group">
      <label for="phone">Phone</label>
      <input
        type="tel" id="phone" name="phone"
        value="{{ old('phone') }}"
        required
        pattern="[0-9]{10,15}"
        aria-required="true"
        aria-describedby="phoneError"
      >
      @error('phone')
        <div class="error-message" id="phoneError">{{ $message }}</div>
      @enderror
    </div>

    <div class="input-group">
      <label for="password">Password</label>
      <input
        type="password" id="password" name="password"
        required aria-required="true" aria-describedby="passwordHelp passwordError"
        autocomplete="new-password"
      >
      <div id="passwordHelp" class="password-strength" aria-live="polite">
        Use 8+ chars, uppercase, lowercase, number &amp; special char
      </div>
      @error('password')
        <div class="error-message" id="passwordError">{{ $message }}</div>
      @enderror
    </div>

    <div class="input-group">
      <label for="password_confirmation">Confirm Password</label>
      <input
        type="password" id="password_confirmation" name="password_confirmation"
        required aria-required="true" aria-describedby="confirmPasswordError"
        autocomplete="new-password"
      >
      @error('password_confirmation')
        <div class="error-message" id="confirmPasswordError">{{ $message }}</div>
      @enderror
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
      <div class="checkbox-group">
        <label for="terms">
          <input type="checkbox" id="terms" name="terms" required aria-required="true" aria-describedby="termsError">
          I agree to the <a href="{{ route('terms.show') }}" target="_blank" rel="noopener">Terms</a> and <a href="{{ route('policy.show') }}" target="_blank" rel="noopener">Privacy Policy</a>
        </label>
        @error('terms')
          <div class="error-message" id="termsError">{{ $message }}</div>
        @enderror
      </div>
    @endif

    <button type="submit" class="btn" aria-label="Register account">Register</button>

    <a href="{{ route('login') }}" class="link" tabindex="0">Already registered? Login here.</a>
  </form>
</div>

<script>
  const passwordInput = document.getElementById('password');
  const passwordHelp = document.getElementById('passwordHelp');
  const form = document.getElementById('registerForm');

  function checkPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^A-Za-z0-9]/)) strength++;

    if (strength <= 2) return 'weak';
    if (strength === 3 || strength === 4) return 'medium';
    if (strength === 5) return 'strong';
  }

  passwordInput.addEventListener('input', () => {
    const pwd = passwordInput.value;
    if (!pwd) {
      passwordHelp.textContent = 'Use 8+ chars, uppercase, lowercase, number & special char';
      passwordHelp.className = 'password-strength';
      passwordInput.classList.remove('error');
      return;
    }
    const strength = checkPasswordStrength(pwd);
    passwordHelp.textContent = 'Password strength: ' + strength.charAt(0).toUpperCase() + strength.slice(1);
    passwordHelp.className = 'password-strength ' + strength;

    if (strength === 'weak') {
      passwordInput.classList.add('error');
    } else {
      passwordInput.classList.remove('error');
    }
  });

  form.addEventListener('submit', (e) => {
    const pwd = passwordInput.value;
    const strength = checkPasswordStrength(pwd);
    if (strength !== 'strong') {
      e.preventDefault();
      alert('Please enter a stronger password. It must have at least 8 characters, uppercase and lowercase letters, a number, and a special character.');
      passwordInput.focus();
    }
  });
</script>

</body>
</html>
