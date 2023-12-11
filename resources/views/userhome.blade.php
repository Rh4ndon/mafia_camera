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
    </style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <a href="/contact">Contact</a>
  <a href="/about">About</a>
  <a href="/usercart">My Cart</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>
@foreach ($user as $user)
<div class="welcome">
<h1>Welcome {{$user->name}}</h1>
<p>Analouge Mafia</p>
<br>


<div class="view">
    @foreach ($cameras as $camera)
    <div class="card">
        <img src="{{asset('images/'. $camera->image)}}" alt="Product Image" style="width:200px; border: 1px solid black; padding: 5px; border-radius:10px;">
        <h1>{{ $camera->brand }}</h1>
        <h2>{{ $camera->name }}</h2>
        <p class="description">{{ $camera->description }}</p>
        <p class="quantity">Quantity Left: {{ $camera->quantity }}</p>
        <p class="price"> &#8369; {{ $camera->price }}</p>
        <form method="POST" action="/camera/cart">
            @csrf
            <input type="hidden" name="cam_id" value="{{ $camera->id }}" />
            <input type="hidden" name="brand" value="{{ $camera->brand }}" />
            <input type="hidden" name="name" value="{{ $camera->name }}" />
            <input type="hidden" name="image" value="{{ $camera->image }}" />
            <input type="hidden" name="price" value="{{ $camera->price }}" />
            <input type="hidden" name="user_name" value="{{ $user->name }}" />
            <input type="hidden" name="status" value="added" />
            <input type="number" name="quantity" min="1" max="{{$camera->quantity}}" placeholder="Enter Quantity" required/>
            <p><button class="edit-btn">Add to Cart</button></p>
        </form>
        
    </div>
    
    
    @endforeach
</div>


</div>
@endforeach


</body>
</html>
