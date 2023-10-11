<html>
  <head>
    <link rel="stylesheet" href="style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <title>
    HBM
  </title>
  <style>
    #div1{
background-color: rgb(255, 255, 255);
width:30%;
float:left;
text-align: left;
margin-left:200px;
}
#div2{
  background-color: rgb(255, 255, 255);
  width:50%;
  float:right;
  text-align: center;
  }
  .header{
  background-image: url("hbm.jpg ");
  min-height: 600px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;   
  }
h1{
  font-size: xx-large;
}
.headerbuild{
  background-image: url("interior.jpg");
  min-height: 600px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;  
}
  .navbar {
    overflow: hidden;
    background-color: rgb(104, 103, 103);
    font-style: bold;
    }
    .navbar a {
    float: left;
    display: block;
    color: rgb(255, 255, 255);
    text-align: center;
    padding: 10px 20px;
    font-size: 25px;
    text-decoration: none;
    width:13%;
    font-family: 'Times New Roman';  
    }
    .navbar:hover{
      background-color:  rgb(104, 103, 103);
    }
    .dropdown {
      float: left;
      overflow: hidden;
      font-style: bold;
    }
    
    .dropdown .dropbtn { 
      border: none;
      outline: none;
      color: rgb(255, 255, 255);
      padding: 10px 20px;
      background-color: inherit;
      font-family: inherit;
      font-size: 25px;
      margin: 0;
      
    }
    
    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: rgb(175, 171, 171);
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    input[type=text] {
      width: 70%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      font-size: large;
    }
    input[type=email] {
      width: 70%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      font-size: large;
    }
    input[type=date] {
      width: 70%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      font-size: large;
    }

    .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 25px;
    }
  </style>
  </head>
  <body>
    
      <div class="navbar">
        <b>
        <a href="home.html" class="right">HOME</a>
        <div class="dropdown">
          <button class="dropbtn">SERVICES
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="build.html">Build</a>
            <a href="">Reconstruct</a>
          </div>
        </div> 
        <a href="monitor.php" class="right">MONITER</a>
        <a href="" class="right">PAYMENTS</a>
        <a href="inventory.php" class="right">INVENTORY</a>
        <a href="" class="right">CONTACT US</a>
      </b>   
    </div>

    <div class="header">
    </div>
    <div class="white">
    <div id="div1">
      <br>
      <br>
      <br>
     <h2> <i class="fa fa-phone"><b>Phone number</b></i></h2>
6302287578
     <h2> <i class="fa fa-envelope"><b>Email</b></i></h2>
sivaparthiban001@gmail.com
      <h2> <i class="fa fa-map-marker"><b>Address</b></i></h2>
 1-71<br>
papasamudram<br>
gudipala<br>
chittoor<br>
andhra pradesh<br>
</div>

    <div id="div2">
  <h1>GET IN TOUCH</h1>
  <form action="/action_page.php">
    <input type="text" id="name" name="name" placeholder="Name" size="50"><br><br>
    <input type="email" id="email" name="email"placeholder="Email" size="50"><br><br>
    <input type="text" id="phno" name="phno"placeholder="Phone Number" size="50"><br><br>
    <textarea id="subject" name="subject" placeholder="Subject" rows="4" cols="61"></textarea><br><br>
    <a href="#" class="button">Submit</a>
  </form>
</div>
</div>
  </body>
</html>