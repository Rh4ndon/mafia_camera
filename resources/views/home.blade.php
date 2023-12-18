<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar_bars {
            overflow: hidden;
            background-color: #000;
            font-family:'Courier New', Courier, monospace;
        }

        .navbar_bars a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .navbar_bars button {
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

        .navbar_bars a:hover {
            background: #ffffff;
            color: black;
        }
        .navbar_bars button:hover {
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
            width: 70%;
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

<div class="navbar_bars">
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
<br><br><br>
<center>
<form action="/cameras/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
    <div class="form">
    <div class="form-group">
        <label for="name">Brand:</label>
        <input type="text" id="brand" name="brand" required>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
    </div>
    <div class="form-group">
        <label for="quantity">Price:</label>
        <input type="number" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
    </div>
    <div class="form-group">
    <button class="my-button">Add Camera</button>
    </div>
    </div>
</div>
</form>
</center>
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
        <!-- Button trigger modal -->
        <p><button type="button" class="edit-btn" data-toggle="modal" data-target="#exampleModalCenter{{$camera->id}}">Delete</button></p>
        <!-- Modal --> 
        <div class="modal fade" id="exampleModalCenter{{$camera->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> 
            <div class="modal-dialog modal-dialog-centered" role="document"> 
                <div class="modal-content"> <div class="modal-header"> 
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span> 
                    </button> 
                </div> <div class="modal-body"> Are you sure you want to delete this camera? </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
                    <form action="/delete-camera/{{$camera->id}}" method="POST"> 
                        @csrf 
                        @method('DELETE') 
                        <button class="btn btn-danger">Delete</button> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div>
      </div>   
    @endforeach
</div>




</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
