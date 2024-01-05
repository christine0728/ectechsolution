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
        .button-link {
      
       color:black;
        text-decoration: none; /* Remove underline */
      
    }
        /* Add spacing for the "Forgot your password?" link */
        .forgot-password {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }
        .button-link:hover {
        background-color: #45a049; /* Darker green on hover */
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" autofocus autocomplete="email">
                        <!-- Display email field error messages here -->
                        <div class="error-message">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" autocomplete="current-password">
                        <!-- Display password field error messages here -->
                        <div class="error-message">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
               <!--      <div class="form-group remember-me">
                        <label for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember"> Remember me
                        </label>
                    </div> -->
                    <button class="login-button" type="submit">Log in</button>
                </form>
                <br>
                <button class="login-button" >
                <a href="/register" class="button-link" style="color:white">Register</a>
                </button>
            <!--     <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div><br><br> -->
            </div>
        </div>
    </div>
</body>
</html>
