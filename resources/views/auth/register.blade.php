<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
        }


        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f3eb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #fffaf3;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 360px;
            color: #4e4039;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            color: #4e4039;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background-color: #a68b6d;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #8c7156;
        }
        .login-link {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }
        .login-link a {
            text-decoration: none;
            color: #7b5e44;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
            color: #5e4836;
        }
    </style>
</head>
<body>

<div class="register-container">
   
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Full Name" required value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit">Register</button>
    </form>
    <div class="login-link">
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
    </div>
</div>

</body>
</html>