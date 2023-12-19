<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
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

        .navbar a:hover {
            background: #ffffff;
            color: black;
        }
        .navbar button:hover {
            background: #ffffff;
            color: black;
        }
        .welcome{
            padding:20px;
            margin-top:30px;
            background-color:#ffff;
            height:1500px;
            text-align:center;
            font-family:'Courier New', Courier, monospace;
        }
    
        .view{
            display: flex;
            flex-direction: row;
            align-self: center;
        }
        .my-button {

            font-size: 15px;
            padding: 5px;
            border: #000;
            cursor: pointer;
            color: #ffffff;
            background-color: #4c4d4c;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

    
        .my-button:hover {
            background-color: #000;
        }

        .card {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
        }

        .edit-btn{
            background-color: #4c4d4c;
            border: none;
            padding: 15px 32px;
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            display: inline-block;
            cursor: pointer;
            margin: 4px 2px;
            border-radius: 16px;
        }
        .edit-btn:hover{
            background-color: #000;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            align-self: center;
            height: 100vh;
            
        }               
        .form {
            padding: 40px;
            width: 400px;
            border-radius: 10px;
            background-color: #f7f7f7;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #ebebeb;
            color: #333;
            font-family: "Open Sans", sans-serif;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }


    </style>
</head>
<body>

<div class="navbar">
    <a href="/userdashboard">Home</a>
    <a href="/contact">Contact</a>
    <a href="/about">About</a>
    <a href="/usercart">My Cart</a>
    <a href="/userorders">My Orders</a>
    <a href="#">My Details</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>
@foreach ($user as $user)
<div class="welcome">
<h1>Welcome {{$user->name}}</h1>
<a href="/userdashboard"class="my-button">Cancel Update</a>
<br>
<br>

<form action="/edit-user/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
    <div class="form">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="brand" name="name" value="{{$user->name}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="email" id="email" name="email" value="{{$user->email}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="description">Address:</label>
        <textarea id="address" name="address" required>{{$user->address}}</textarea>
    </div>
    <br>
    <div class="form-group">
    <button class="my-button">Update</button>
    </div>
    
</div>
</div>

</form>
<br>





</div>


@endforeach
</body>
</html>
