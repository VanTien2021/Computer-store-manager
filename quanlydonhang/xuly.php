<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){ //Sử dụng isset để kiểm tra xem tham số code đã được truyền qua URL hay chưa
		$code_cart = $_GET['code']; //Lấy giá trị của tham số code từ URL để sử dụng trong truy vấn SQL
		$sql_update ="UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code_cart."'"; 
		//cập nhật trạng thái của đơn hàng trong bảng tbl_cart thành 0 (đã xem) dựa trên giá trị của tham số code.
		$query = mysqli_query($mysqli,$sql_update); 
		header('Location:../../index.php?action=quanlydonhang&query=lietke');
		//Sử dụng hàm header để chuyển hướng người dùng về trang quản lý đơn hàng sau khi cập nhật trạng thái.
	} 
?>