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
        .navbar {
            margin: -8px;
            overflow: hidden;
            background-color: #000;
            font-family:'Courier New', Courier, monospace;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .logo{
            font-weight: bold;
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 23px;
        }
        .navbar button {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            background-color: transparent;
            border-color: transparent;
            font-family: 'Courier New', Courier, monospace;
        }

        .navbar a:hover {
            background: #ffffff;
            color: black;
        }
        .navbar button:hover {
            background: #ffffff;
            color: black;
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
        .info {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
       
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/userdashboard">Home</a>
        <a href="#">Contact</a>
        <a href="/about">About</a>
        <a href="/usercart">My Cart</a>
        <form method="POST" action="/logout">
          @csrf
        <button>Logout</button>
        </form>
        <div class="logo">Analouge Mafia</div>
    </div>

    <div class="container">
        
        <label for="uname"><b>Contact Number</b></label>
        <p class="info">09123456789</p>

        <label for="email"><b>Email</b></label>
        <p class="info">admin@gmail.com</p>

        <label for="psw"><b>Instagram</b></label>
        <p class="info"><a href="https://www.instagram.com/analoguemafia/">https://www.instagram.com/<br>analoguemafia/</a></p>

        

        
    </div>
</body>
</html>
