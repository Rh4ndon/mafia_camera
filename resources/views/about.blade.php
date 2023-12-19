<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title> An About Us Page | CoderGirl </title>
  <!---Custom Css File!--->


  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family:'Courier New', Courier, monospace;
    }


    .about-us{
      height: 100vh;
      width: 100%;
      padding: 90px 0;
      background: #ddd;
    }
    .pic{
      height: auto;
      width:  302px;
    }
    .about{
      width: 1130px;
      max-width: 85%;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-around;
    }
    .text{
      width: 540px;
    }
    .text h2{
      font-size: 90px;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .text h5{
      font-size: 22px;
      font-weight: 500;
      margin-bottom: 20px;
    }
    span{
      color: #FF0000;
    }
    .text p{
      font-size: 18px;
      line-height: 25px;
      letter-spacing: 1px;
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
    </style>
</head>
<body>

  <div class="navbar">
    <a href="/userdashboard">Home</a>
    <a href="/contact">Contact</a>
    <a href="#">About</a>
    <a href="/usercart">My Cart</a>
    <a href="/userorders">My Orders</a>
    <a href="/editUser">My Details</a>
    <form method="POST" action="/logout">
      @csrf
    <button>Logout</button>
    </form>
    <div class="logo">Analouge Mafia</div>
  </div>

  <section class="about-us">
    <div class="about">
      <img src="{{asset('images/about.jpg')}}" class="pic">
      <div class="text">
        <h2>About Us</h2>
        <h5>Get to know more about <span>Analogue Mafia</span></h5>
          <p>Our project is dedicated to creating a vibrant platform for photography enthusiasts, providing a curated selection of film cameras available for purchase on our user-friendly website. Beyond being a marketplace, Analogue Mafia is a community where passion for photography is celebrated.</p> 
	<p>What sets us apart is our commitment to delivering more than just a product; we're here to cultivate a community of like-minded individuals who share a love for the art of film photography. From expert advice on camera selection to tips on mastering the craft, Analogue Mafia is more than a store; it's a supportive network where your passion for photography can thrive.</p>

      </div>
    </div>
  </section>
</body>
</html>


