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
            flex-direction: column;
            
        }
        .card {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
            align-self: center;
            max-width: 25%;
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

        footer {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            left: 0;
            position: fixed;
            width: 99%;
            bottom: 0;
            color: black;
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }
        .total{
            font-weight: bold;
            font-size: 2em
        }
        .form_s{
            right: -300px;
            position: relative;
            margin: 0;
        }



    </style>
</head>
<body>

<div class="navbar">
  <a href="/userdashboard">Home</a>
  <a href="/contact">Contact</a>
  <a href="/about">About</a>
  <a href="#">My Cart</a>
  <a href="/userorders">My Orders</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>
@foreach ($user as $user)
<div class="welcome">
<h1>{{$user->name}}'s Cart</h1>
<p>Analouge Mafia</p>
<br>


<div class="view">
    @foreach ($carts as $cart)

    
        <center>
            @if ($cart->status == 'added')
            <div class="card">
                <img src="{{asset('images/'. $cart->image)}}" alt="Product Image" style="width:200px; border: 1px solid black; padding: 5px; border-radius:10px;">
                <h1>{{ $cart->brand }}</h1>
                <h2>{{ $cart->name }}</h2>
                <p class="description">{{ $cart->description }}</p>
                <p class="quantity">Quantity: {{ $cart->quantity }}</p>
                <p class="price"> &#8369; {{ $cart->price }}</p>
                <form method="POST" action="/buy-camera/{{ $cart->id}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cam_id" value="{{ $cart->cam_id }}" />
                    <input type="hidden" name="brand" value="{{ $cart->brand }}" />
                    <input type="hidden" name="name" value="{{ $cart->name }}" />
                    <input type="hidden" name="image" value="{{ $cart->image }}" />
                    <input type="hidden" name="price" value="{{ $cart->price }}" />
                    <input type="hidden" name="user_name" value="{{ $user->name }}" />
                    <input type="hidden" name="quantity"  value="{{ $cart->quantity }}"/>
                    <input type="hidden" name="status" value="sold" />
                    <p><button class="edit-btn">Checkout</button></p>
                </form>
            </div>
          
            @else
        
            @endif
        </center>

    
    @endforeach
</div>


</div>
@endforeach

    <footer>
       
    <p class="total">Total</p>
    
    <p class="total">
    &#8369; {{ $total }}

    
    <form class="form_s" method="POST" action="/checkout">
        @csrf
        @method('PUT')
        @foreach ($carts as $index => $cart)
        @if ($cart->status == 'added')
            <input type="hidden" name="cart_id[{{ $index }}]" value="{{ $cart->id }}" />
            <input type="hidden" name="cam_id[{{ $index }}]" value="{{ $cart->cam_id }}" />
            <input type="hidden" name="quantity[{{ $index }}]"  value="{{ $cart->quantity }}"/>
        @endif
        @endforeach
    <button class="edit-btn">Checkout All</button>
    </form>
    </p>

    
  </footer>
</body>
</html>
