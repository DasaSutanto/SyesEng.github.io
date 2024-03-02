<html>
    <head>
        <title>menghapus data</title>
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
			echo "<h3>Data gagal disimpan ke dalam database.</h3>";
		}
	}
?>

<FORM ACTION="" METHOD="POST" NAME="input">
    id number : <input type="text" name="id_number">
<input type="submit" name="input" value="delete">