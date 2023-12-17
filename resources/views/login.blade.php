<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('{{asset('images/login.png')}}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Courier New', Courier, monospace;
        }
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #000000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 20px;
        }
        button:hover {
            opacity: 0.8;
        }
        .alert-danger{
            color: red;
            font-weight: bolder;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/login" method="POST">
            @csrf
        @if($errors->has('failed'))
        <div class="alert-danger">{{ $errors->first('failed') }}</div>
        <br>
        @endif
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        </form>
        <p>not a member? <a href="/signup">SignUp</a></p>
    </div>
</body>
</html>
