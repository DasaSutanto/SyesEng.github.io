<html>
	<head>
		<title>Reservation-DaFiMe</title>
		<style>
		
			body{
				font-family: latha;
				color: white;
				background: linear-gradient( rgba(0,0,0,0.65),rgba(0,0,0,0.65),rgba(0,0,0,0.38),rgba(0,0,0,0))
				,url(Images/banner1.jpg)no-repeat;
				background-position: bottom;
				background-size: cover;
			}
		
			.box{ width: 900px;
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
				}
					.box ul li a:hover{ 
						color:#B8860B; 
					}
			.logo h1{
				position: absolute;
				font-family: Photograph Signature;
				font-size: 40px;
				left: 30px;
				top: -30px;
				color: #B8860B;
			}
			.inline-block{
				display: inline-block;
				box-shadow: 0 0 20px 6px #B8860B;
				background: #fff;
				float: auto;
				width: 360px;
				height: 450px;
				padding: 20px;
				opacity: 0.7;
				margin-top: 70px;
				margin-left: 35px;
				border: 0.2px solid none;
				border-radius: 20px;
			}
				.inline-block h1{
					text-align: center;
					margin-top: -15px;
					margin-bottom: 5px;
					color: #B8860B;
					font-family: Photograph Signature;
					font-size: 40px;
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

	</style>
</head>
<body>
	<div class="box">
		<ul type="none">
		<ul>
			<li><a href="contact.html"> Contact</a></li>
			<li><a href="team.php"> Team</a></li>
			<li><a href="wedding.html"> Home</a></li>
		</ul>

		<div class="inline-block">
			<h1>Reservation</h1>
			<form action="" method="POST" name="input">
		    	<input type="text" class="input-field" placeholder="First name" name="firstname" required>
		    	<input type="text" class="input-field" placeholder="Last name" name="lastname" required>
				<input type="text" class="input-field" placeholder="Identity number" name="identity" required>
		    	<input type="text" class="input-field" placeholder="Phone number" name="phonenumber" required>
		    	<font type="sans-serif" color="#999" >Time :</font><input type="time" class="input-field" placeholder="time" name="time" required>
		    	<font type="sans-serif" color="#999" >Date :</font><input type="date" class="input-field" placeholder="date" name="date" required>
		    	<br>
		    	<br>
		    	<button type="submit" class="submit-btn" name="input">Reserve</button>
		    </form>
			
		</div>
		
	</div>
	<div class="logo">
	   <h1>Dafime</h1>
	</div>



    <?php
        if(isset($_POST['input'])){
            $first = $_POST['firstname'];
            $lastname= $_POST['lastname'];
			$identity =$_POST['identity'];
            $phone =$_POST['phonenumber'];
            $time=$_POST['time'];
            $date=$_POST['date'];

            $dbname = "RESERVATION";
            $host = "localhost";
            $username = "root";
            $password = "";
            $conn=mysqli_connect($host,$username,$password,$dbname);
            if(mysqli_connect_errno()) {
                echo"Koneksi ke server gagal";
                exit();
            }
			else {
				echo"koneksi berhasil";
			}
            $query = "INSERT INTO RESER1 VALUES('$first','$lastname','$identity','$phone','$time','$date')";
            $result = mysqli_query($conn,$query);



            header("Location:ourservice1.php");

}

?>


</body>
</html>