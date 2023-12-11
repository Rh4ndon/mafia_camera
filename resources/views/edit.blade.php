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
  <a href="/dashboard">Home</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>

<div class="welcome">
<h1>Welcome Admin</h1>
<a href="/dashboard"class="my-button">Cancel Update</a>
<br>
<br>

<form action="/edit-camera/{{$camera->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form">
    <div class="form-group">
        <label for="name">Brand:</label>
        <input type="text" id="brand" name="brand" value="{{$camera->brand}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$camera->name}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{$camera->description}}</textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{$camera->quantity}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="quantity">Price:</label>
        <input type="number" id="price" name="price" value="{{$camera->price}}" required>
    </div>
    <br>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" value="{{$camera->image}}" name="image" required>
    </div>
    <br>
    <div class="form-group">
    <button class="my-button">Update Camera</button>
    </div>
    
</div>

</form>
<br>





</div>



</body>
</html>
