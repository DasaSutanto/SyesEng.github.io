<html>
	<head>

    <title>
        Bill
    </title>
<style>
  .inline-block{
				display: inline-block;
				
				background: #fff;
				float: auto;
				width: auto;
				height: auto;
				padding: 20px;
				opacity: 0.7;
				margin-top: 40px;
				border: 0.2px solid none;
				border-radius: 20px;
			}
				.inline-block h1{
					text-align: center;
					margin-top: -15px;
					margin-bottom: 5px;
					color: #B8860B;
					font-family: Photograph Signature;
					font-size: 20px;
				}

		.button{
				width: 35%;
				padding: 10px 30px;
				flow: left;
				cursor: pointer;
				display: block;
				margin: auto;
				background: linear-gradient(to right, #B8860B, white);
				box-shadow: 0 0 15px 9px #B8860B;
				border: 0;
				outline: none;
				border-radius: 30px;
			}
			.btn{
				width: 20%;
				height: 18px;
				padding: 10px 30px;
				flow: left;
				cursor: pointer;
				display: block;
				margin: auto;
				background: linear-gradient(to right, #B8860B, white);
				box-shadow: 0 0 15px 9px #B8860B;
				border: 0;
				outline: none;
				border-radius: 30px;
			}
			.btn a{text-decoration: none;
			color: black;}
			
			body{
				font-family: latha;
				color: white;
				background: linear-gradient( rgba(0,0,0,0.65),rgba(0,0,0,0.65),rgba(0,0,0,0.38),rgba(0,0,0,0))
				,url(Images/banner1.jpg)no-repeat;
				background-position: bottom;
				background-size: cover;
			}
		
</style>

</head>

<body>



    
    
    <?php
	if (isset($_POST['input'])) {
        $id_number=$_POST['id_number'];
		
		$conn =mysqli_connect("localhost","root","","RESERVATION");
		if(mysqli_connect_errno()) {
            echo"Koneksi ke server gagal dilakukan";
			exit();
		}
		echo 'Koneksi Berhasil : '.mysqli_get_host_info($conn)."<br />";
		
		//menggabungkan form data inputan kita ke database
		$sql = "DELETE a.*,b.* FROM RESER1 a,SERVICE1 b WHERE a.I_NUMBER=$id_number AND b.I_NUMBER=$id_number";
		mysqli_query($conn,$sql);
		
		//mencek data berhasil atau tidaknya disimpan
		$num = mysqli_affected_rows($conn);
		if ($num>0 ) {
            echo "<h3>Data yang anda masukan sudah disimpan.</h3>";
            
			header("Location:coba2.html");
            
		} else {
            echo "<h3>Data yang kamu batalkan gagal, periksa kembali id number kamu</h3>";
		}
	}
    ?>

<?php
            if(isset($_POST['service'])){
                
                
                $tema=$_POST['tema'];
                $makanan=$_POST['makanan'];
                $undangan=$_POST['undangan'];
                $sovenir=$_POST['sovenir'];
                $outfit=$_POST['outfit'];
                $deskripsi=$_POST['description'];
                $id_number=$_POST['ID'];
                
                if($tema=="Vintage"){
                    $hargatemacara=6000000;
                }
                
                if($tema=="Glamour"){
                    $hargatemacara=8000000;
                }
                
                if($tema=="Rustic"){
                    $hargatemacara=6500000;
                }
                
                if($makanan=="Sweet Food"){    
                    $hargamakanan=9000000;
                }
                if($makanan=="Japanese Food"){
                    $hargamakanan=13000000;
                }
                if($makanan=="Indonesian Food"){
                    $hargamakanan=12000000;
                }
                
                
                if($undangan=="Elegant"){    
                    $hargaundangan=3000000;
                }
                if($undangan=="Simple"){
                    $hargaundangan=2000000;
                }
                if($undangan=="Calm"){
                    $hargaundangan=25000000;
                }
                
                
                if($outfit=="couple"){    
                    $hargabaju=10000000;
                }
                if($outfit=="Family"){
                    $hargabaju=3000000;
                }
                if($outfit=="your own"){
                    $hargabaju=0;
                }
			$hargasovenir=3500000;
                
            }
            else{
                
                echo"data tidak terbaca";
            }  
            
            $price=$hargamakanan+$hargasovenir+$hargatemacara+$hargabaju+$hargaundangan;
            
            echo'<center><font face = "Gabriola" size = "7" color="white">Your Bill</h2></font> <center>';
            
            echo"<table border = 2 cellpadding = 10 cellspacing = 5 align=center>";
            echo'<tr bgcolor=white style="color:#B8860B;">';
            echo'<th width="120">CATEGORIES</th>';
			echo'<th width="120">ORDERED</th>';
            echo'<th width="120">PRICE</th>'; 
            echo"</tr>";
            echo'<tr bgcolor=white style="color:black;">';
            echo'<th style="color:#B8860B;"> Theme </th>';
			echo"<th> $tema </th>";
            echo"<th> $hargatemacara </th>";
            echo"</tr>";
            echo'<tr bgcolor=white style="color:black;">';
            echo'<th style="color:#B8860B;">Invitation Card</th>';
			echo"<th> $undangan </th>";
            echo"<th> $hargaundangan </th>";
            echo"</tr>";
            echo'<tr bgcolor=white style="color:black;">';
            echo'<th style="color:#B8860B;">Catering</th>';           
		    echo"<th> $makanan </th>";
            echo"<th> $hargamakanan </th>";
            echo"</tr>";
            echo'<tr bgcolor=white style="color:black;">';
            echo'<th style="color:#B8860B;">Outfit</th>';
			echo"<th> $outfit </th>";
            echo"<th> $hargabaju </th>";
            echo"</tr>";
            echo'<tr bgcolor=white style="color:black;">';
            echo'<th style="color:#B8860B;">Souvenir</th>';            
			echo"<th> $sovenir </th>";
            echo"<th> $hargasovenir </th>";
            echo"</tr>";
            echo'<tr bgcolor=#B8860B style="color:black ;">';
            echo'<th> Total Price </th>';
            echo"<th></th>";
			echo"<th> $price </th>";
            echo"</tr>";
            echo"</table>";

            
            
            $dbname = "RESERVATION";
            $host = "localhost";
            $username = "root";
            $password = "";
            $conn=mysqli_connect($host,$username,$password,$dbname);
            if(mysqli_connect_errno()) {
                echo"Koneksi ke server gagal";
                exit();
            }
            #MEMASUKAN NILAI NYA DALAM SEBUAH TABEL
            $query = "INSERT INTO  SERVICE1 VALUES('$tema','$hargatemacara','$makanan','$hargamakanan','$undangan','$hargaundangan','$sovenir','$hargasovenir','$outfit','$hargabaju','$price','$deskripsi','$id_number')";
            $result = mysqli_query($conn,$query);
            
            ?>

<br>
<div class="inline-block">
    <FORM ACTION="" METHOD="POST" NAME="input">
	<br>
     <h1>Please enter your id number for validation system :
	 <br>
	 <br>
	 <input type="text" name="id_number" placeholder="ID NUMBER" required>
	 <br>
</div>  
<br>      
<div class="inline-block">       
       <br><h1>Do you want to finish or cancel the reservation?</h1><br>
		<div class="btn"><a href="coba3.html">FINISH</a>  </div><br>
        <input class="button" type="submit" name="input" value="CANCEL">
        
  
    
    
</div>
    
</body>

</html>