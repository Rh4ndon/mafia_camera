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
            text-align: left;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input[type=text], input[type=password], input[type=email] {
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
    </style>
</head>
<body>
    <div class="container">
        <form action="/register" method="POST">
            @csrf
        <label for="uname"><b>Fullname</b></label>
        <input type="text" placeholder="Enter Fullname" name="name" required>
        <input type="hidden" name="role_as" value="1" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="email"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Register</button>
        </form>
        <p style="text-align: center;">already a member? <a href="/">GoBack</a></p>
    </div>
</body>
</html>
