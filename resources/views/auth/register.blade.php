
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
        }

        .container {
            display: flex;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .left-side {
            flex: 1;
            background-color: #0000; /* Red color */
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-side img {
            max-width: 80%;
            height: auto;
        }
        .custom-primary-button {
                background-color: black; /* Green background color */
                color: white; /* White text color */
                padding: 10px 15px; /* Padding for the button */
                border: none; /* No border */
                border-radius: 4px; /* Rounded corners */
                cursor: pointer; /* Cursor style */
                transition: background-color 0.3s; /* Smooth background color transition */
            }

            .custom-primary-button:hover {
                background-color: #45a049; /* Darker green on hover */
            }
        .right-side {
            flex: 1;
           padding-left: 60px;
            padding-right: 40px;
            padding-top: 40px;
            padding-bottom: 60px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding-right: 25px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 92%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            height: 20px; /* Added height */
        }

        .remember-me {
            margin-top: 10px;
            font-size: 13px;
        }

        .login-button {
            background-color: black; /* Red color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
        }


        /* Style the error messages */
        .error-message {
            color: #ff5858;
            font-size: 14px;
        }

        /* Center the "Login" label */
        .login-label {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Add spacing for the "Forgot your password?" link */
        .forgot-password {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }

        /* Style the "Sign Up" link */
        .sign-up-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side" style="background: black;">
            <img src="assets/img/login.jpg" alt="Logo">
        </div>
        <div class="right-side">
            <div class="form-container">
                <h2 class="login-label">Login</h2>
                <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input style="width: 92%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            height: 20px; " id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
     
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a><br>

            <x-primary-button class="ml-4 custom-primary-button">
            {{ __('Register') }}
        </x-primary-button>
        </div>
            <!--     <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div><br><br> -->
            </div>
        </div>
    </div>
</body>
</html>
