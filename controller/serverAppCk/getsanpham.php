<?php
 	include "connect.php";
 	$page = $_GET["page"];
 	$idloaisp=$_GET["idloaisp"];
 	$space=5;
 	$limit = ($page-1)*$space;
 	$mangsanpham= array();
 	$query= "SELECT * FROM hanghoa WHERE iddanhmuc=".$idloaisp." LIMIT $limit,$space";
 	$data= mysqli_query($connect,$query);
	while($row =mysqli_fetch_assoc($data)){
			array_push($mangsanpham, new Sanpham(
				$row['id'],
				$row['tenhang'],
				$row['soluong'],
				$row['dongia'],
				$row['anh'],
				$row['ngay'],
				$row['mota'],
				$row['iddanhmuc']));
		}
	$mangsanpham = [ 
		
		"data" => $mangsanpham 
	];			
			

	echo json_encode($mangsanpham);

 	Class Sanpham{
 		function __construct($id,$tenhang,$soluong,$dongia,$anh,$ngay,$mota,$iddanhmuc){
			$this->id=$id;
			$this->tenhang=$tenhang;
			$this->soluong=$soluong;
			$this->dongia=$dongia;
			$this->anh=$anh;
			$this->ngay=$ngay;
			$this->mota=$mota;
			$this->iddanhmuc=$iddanhmuc;
			
		}
 	} 
?>