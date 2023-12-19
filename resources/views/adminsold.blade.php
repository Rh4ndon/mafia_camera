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



        table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
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
  <a href="#">Order Records</a>
  <form method="POST" action="/logout">
    @csrf
  <button>Logout</button>
  </form>
  <div class="logo">Analouge Mafia</div>
</div>
@foreach ($user as $user)
<div class="welcome">
<h1>Hello {{$user->name}}</h1>
<p>Analouge Mafia</p>
<br>


<div class="view">


    <table>
		<tr>
			<th>Brand</th>
			<th>Product Name</th>
			<th>Qunatity</th>
            <th>Price</th>
            <th>Ordered by</th>
            <th>Ordered at</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
		</tr>
        @foreach ($carts as $cart)
        @if ($cart->status == 'sold' || $cart->status == 'delivered')
		<tr>
			<td>{{ $cart->brand }}</td>
			<td>{{ $cart->name }}</td>
			<td>{{ $cart->quantity }}</td>
            <td>&#8369; {{ $cart->price }}</td>
			<td>{{ $cart->user_name }}</td>
            <td>{{ $cart->updated_at }}</td>
            <td>{{ $cart->address }}</td>
            <td>
            @if ($cart->status == 'sold')
            For Delivery
            @else
            Order Received
            @endif

            </td>
            <td>
            @if ($cart->status == 'sold')
                <form method="POST" action="/deliver-camera/{{ $cart->id}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}" />
                    <button class="edit-btn">Delivered</button>
                </form>
            @else
            Action Completed
            @endif
            </td>
		</tr>
        @else
               
        @endif
        @endforeach
	</table>
    

    
   
</div>


</div>
@endforeach


</body>
</html>
