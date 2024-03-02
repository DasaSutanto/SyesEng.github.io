<!DOCTYPE html>
<html>
<head>
	<title>Home Page Login</title>
	<style>

		body{
	    	font-family: sans-serif;
	    	color: white;
	    	background: linear-gradient( rgba(0,0,0,0.65),rgba(0,0,0,0.65),rgba(0,0,0,0.38),rgba(0,0,0,0))
	    	,url(Images/banner1.jpg)no-repeat;
	    	background-position: bottom;
	    	background-size: cover;

	    }
.form-box{
	width: 380px;
	height: 480px;
	position: relative;
	margin: 6% auto;
	background: #fff;
	opacity: 0.7;
	padding: 5px;
	overflow: hidden;
	border-radius: 2%;
}

.button-box{
	width: 220px;
	margin: 35px auto;
	position: relative;
	box-shadow: 0 0 20px 9px #B8860B;
	border-radius: 30px;
}
.toggle-btn{
	padding: 10px 30px;
	cursor: pointer;
	background: transparent;
	border: 0;
	outline: none;
	position: relative;
}
#btn{
	top: 0;
	left: 0;
	position: absolute;
	width: 110px;
	height: 100%;
	background: #B8860B;
	border-radius: 30px;
	transition: .5s;
}

.input-group{
	top: 180px;
	position: absolute;
	width: 280px;
	transition: .5s;
}
.input-field{
	width: 100%;
	padding: 10px 0;
	margin: 5px 0;
	color: black;
	border-left: 0;
	border-top: 0;
	border-right: 0;
	border-bottom: 1px solid #999;
	outline: none;
	background: transparent;
}
.submit-btn{
	width: 85%;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin: auto;
	background: linear-gradient(to right, #B8860B, white);
	box-shadow: 0 0 15px 9px #B8860B;
	border: 0;
	outline: none;
	border-radius: 30px;
}
.chech-box{
	margin: 30px 10px 30px 0;
}
span{
	color: #777;
	font-size: 12px;
	bottom: 68px;
	position: absolute;
}
#Login{
	left: 50px;
}
#Register{
	left: 450px;
}
.logo h1{
			position: absolute;
			font-family: Photograph Signature;
			font-size: 40px;
			left: 30px;
			top: -30px;
			color: #B8860B;
		}

.box{ width: 950px;
			height: 70px;
			float: right;
			border: 1px solid none;
		}

		.box ul li{
			width: 120px;
			float: right;
			margin-top: 10px;
			margin-right: 10px;
			text-align: center;
		}

		.box ul li a{ 
		text-decoration: none;
		color: darkgray;
		font-family: latha; }

		.box ul li:hover{ background-color: #ff8400; }
		.box ul li a:hover{ color: white; }




	</style>
</head>
<body>

<!-- UNTUK FORM LOGIN -->
<?php
if(isset($_POST["login"])){

	$conn=mysqli_connect("localhost","root","","REGISTRATION");
	if(mysqli_connect_errno()) {
		echo"Login failed!";
		exit();
	}
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	if($Username && $Password){
		$cek_db="SELECT * FROM REGIS WHERE USERNAME='$Username'";
		$query = mysqli_query($conn,$cek_db);
	
			if(mysqli_num_rows($query) !=0){
				$row = mysqli_fetch_assoc($query);
				$db_user = $row['USERNAME'];
				$db_pass = $row['PASS'];
	
				if($Username == $db_user && $Password== $db_pass){
					header("Location:wedding.html");
	
				} else{
					echo"PASSWORD YANG ANDA MASUKAN TIDAK SESUAI DENGAN USERNAME YANG TERSEDIA";
				}
				
			}
	}
}

?>

	<body>
	<div class="logo">
	   <h1>Dafime</h1>
	</div>
    
		<div class="form-box">
			<div class="button-box">
				<div id="btn">
					
				</div>
				<button type="button" class="toggle-btn" onclick="Login()">Login</button>
				<button type="button" class="toggle-btn" onclick="Register()">Register</button>
			</div>
			
		    <form action="" method="POST" id="Login" class="input-group" name="login">
		    	<input type="text" class="input-field" placeholder="Username" name="Username" required>
		    	<input type="password" class="input-field" placeholder="Password" name="Password" required>
		    	<input type="checkbox" class="chech-box"><span>Remember Password</span>
		    	<button type="submit" class="submit-btn" value="Login" name="login">Login</button>
		    </form>

		     <form action="" method="POST" id="Register"  class="input-group" name="regis"  >
		    	<input type="text" class="input-field" placeholder="Username" name="Username" required>
		    	<input type="email" class="input-field" placeholder="Email address" name="Email" required>
		    	<input type="text" class="input-field" placeholder="Identity Number" name="ID" required>
		    	<input type="password" class="input-field" placeholder="Enter Password" name="Password" required>
		    	<input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
		    	<button type="submit" class="submit-btn" name="regis" value="Register">Register</button>
		    </form>
		</div>
	

	<script>
		var x = document.getElementById('Login');
		var y = document.getElementById('Register');
		var z = document.getElementById('btn');

		function Register(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
		function Login(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}



	</script>
<!-- UNTUK FORM REGISTER -->

<?php


if (isset($_POST['regis'])){
  $Username = $_POST['Username'];
  $Email = $_POST['Email'];
  $ID = $_POST['ID'];
  $Password = $_POST['Password'];
  
  $conn=mysqli_connect("localhost","root","","REGISTRATION");
  if(mysqli_connect_errno()) {
    echo"Registration failed!";
    exit();
  }
  
  //menggabungkan form data inputan kita ke database
  
  $sql = "INSERT INTO REGIS VALUES('$Username','$Email','$ID','$Password')";
  
  mysqli_query($conn,$sql);
  
  //mencek data berhasil atau tidaknya disimpan
  
  $num = mysqli_affected_rows($conn);
  
  if ($num>0 ) {
	$file = fopen("REGISTRATION.txt","a");

	fwrite($file,"$Username,$Email,$ID,$Password");
	fclose($file);
  } else {
    echo "<h3> Error Server </h3>";
  }   
} 
?>

</body>
</html>