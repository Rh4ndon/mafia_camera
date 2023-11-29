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
    </style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
</div>

<div class="welcome">
<h1>Welcome User</h1>
<p>Hover over the navbar links to see the effect.</p>
<br>
<div class="view">
    @foreach ($cameras as $camera)
    <div class="each">
    <img width="200px" src="{{asset('images/'. $camera->image)}}" alt="{{ $camera->name }}">
    <h2>{{ $camera->name }}</h2>
    <p>{{ $camera->description }}</p>
    <p>Quantity: {{ $camera->quantity }}</p>
    </div>
    @endforeach
</div>
</div>



</body>
</html>
