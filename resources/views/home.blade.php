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
<h1>Welcome Admin</h1>
<p>Hover over the navbar links to see the effect.</p>
<form action="/cameras/store" method="POST" enctype="multipart/form-data">
    @csrf
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

    <button>Add Camera</button>
</form>

</div>



</body>
</html>
