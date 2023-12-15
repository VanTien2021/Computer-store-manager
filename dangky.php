<?php
	if(isset($_POST['dangky'])) { //Sử dụng isset để kiểm tra xem nút đăng ký có được nhấn hay không.
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		//Lấy giá trị từ các trường nhập liệu trong mẫu đăng ký và lưu vào các biến tương ứng
		$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
		//chèn thông tin đăng ký vào bảng tbl_dangky trong cơ sở dữ liệu
		if($sql_dangky){ 
			//Nếu truy vấn thành công, hiển thị thông báo đăng ký thành công, lưu tên người dùng và ID 
			//vào session, và chuyển hướng đến trang giohang
			echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
			$_SESSION['dangky'] = $tenkhachhang;
			$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
			header('Location:index.php?quanly=giohang');
			//Hiển thị thông báo thành công, lưu thông tin đăng ký vào session và chuyển hướng người dùng đến trang giohang.
		}
	}
?>
<p>Đăng ký thành viên</p>
<!-- Một số định dạng CSS để cải thiện giao diện của bảng đăng ký -->
<style type="text/css">
	table.dangky tr td {
	    padding: 5px;
	}
	/* Form HTML để người dùng nhập thông tin đăng ký. */
</style>
<form action="" method="POST">
<table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
	<tr>
		<td>Họ và tên</td>
		<td><input type="text" size="50" name="hovaten"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" size="50" name="email"></td>
	</tr>
	<tr>
		<td>Điện thoại</td>
		<td><input type="text" size="50" name="dienthoai"></td>
	</tr>
	<tr>
		<td>Địa chỉ</td>
		<td><input type="text" size="50" name="diachi"></td>
	</tr>
	<tr>
		<td>Mật khẩu</td>
		<td><input type="text" size="50" name="matkhau"></td>
	</tr>
	<tr>
		<td><input type="submit" name="dangky" value="Đăng ký"></td>
		<td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
	</tr>
</table>
</form>