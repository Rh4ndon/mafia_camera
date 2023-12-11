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
        .form{
            display: flex;
            flex-direction: row;

        }
        .for-group{
        
            align-items: flex-start;
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

    </style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <a href="/sold-camera">Order Records</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>

<div class="welcome">
<h1>Welcome Admin</h1>
<br>

<form action="/cameras/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form">
    <div class="form-group">
        <label for="name">Brand:</label>
        <input type="text" id="brand" name="brand" required>
    </div>
    <br>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <br>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
    </div>
    <br>
    <div class="form-group">
        <label for="quantity">Price:</label>
        <input type="number" id="price" name="price" required>
    </div>
    <br>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
    </div>
    <br>
    <div class="form-group">
    <button class="my-button">Add Camera</button>
    </div>
</div>
</form>
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
        <p><a href="/edit-camera/{{$camera->id}}" class="edit-btn">Edit</a></p>
        <form action="/delete-camera/{{$camera->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="edit-btn">Delete</button>
        </form>
      </div>   
    @endforeach
</div>




</div>



</body>
</html>
