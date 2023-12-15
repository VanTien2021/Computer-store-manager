<?php
	if(isset($_POST['dangnhap'])){ // Sử dụng isset để kiểm tra xem nút đăng nhập có được nhấn hay không.
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']); //Lấy giá trị từ các trường nhập liệu trong mẫu đăng nhập và mã hóa mật khẩu bằng hàm md5.
		$sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
// kiểm tra xem có bản ghi nào trong bảng tbl_dangky có đúng thông tin đăng nhập hay không.
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];
			$_SESSION['id_khachhang'] = $row_data['id_dangky'];
			header("Location:index.php?quanly=giohang");
			//Nếu có bản ghi, lưu thông tin đăng nhập vào session và chuyển hướng đến trang giohang. Ngược lại, hiển thị thông báo lỗi
		}else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>'; //Hiển thị thông báo lỗi nếu đăng nhập không thành công.
		}
	} 
?>
<form action="" autocomplete="off" method="POST">
		<table border="1" width="50%" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" size="50" name="email" placeholder="Email..."></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
			</tr>
	</table>
	</form>
	<!-- và sử dụng 1 số định dạng CSS để cải thiện giao diện của bảng đăng nhập -->