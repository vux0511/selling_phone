<?php  
	include "connect.php";
	$json=$_GET['json'];
	$json1='[{"giasanpham":699000,"masanpham":3,"soluongsanpham":5,"tensanpham":"ghe"}]';
	$data=json_decode($json,true);	
	$data1=json_decode($json1,true);	
	var_dump($data) ; 
	echo '<br>';
	var_dump($data1) ;
	$sql_idcuoi="select MAX(id) as iddh from donhang ";
	$query_idcuoi=mysqli_query($connect,$sql_idcuoi);
	$row_idcuoi=mysqli_fetch_assoc($query_idcuoi);
	$madonhang=$row_idcuoi['iddh'];
		foreach ($data as $value) {
			// var_dump($value)  ;
		$masanpham= $value['masanpham'];
		$tensanpham= $value['tensanpham'];
		$soluongsanpham= $value['soluongsanpham'];
		$giasanpham= $value['giasanpham'];
		$query="INSERT INTO chitietdh(iddh,idsp,tensanpham,soluong,dongia) VALUES ($madonhang,$masanpham,'$tensanpham',$soluongsanpham,$giasanpham)";
		$datass= mysqli_query($connect,$query);

        $dataspmua=mysqli_query($connect,"SELECT * FROM hanghoa WHERE id=$masanpham");
        $row_spmua=mysqli_fetch_assoc($dataspmua);
        $slcu=$row_spmua['soluong'];
        $slmoi=$slcu-$soluongsanpham;
        
        $queryUpsp=mysqli_query($connect,"UPDATE hanghoa SET soluong=$slmoi WHERE id=$masanpham" );
        
		if ($datass) {
			echo "1";
		}
		else echo "2";
			if ($dataspmua) {
			echo "1";
		}
		else echo "2";
		if ($queryUpsp) {
			echo "1";
		}
		else echo "2";
	}
?>