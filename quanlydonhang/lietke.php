<p>Liệt kê đơn hàng</p>
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
  // lấy thông tin về đơn hàng từ bảng tbl_cart và tbl_dangky dựa trên điều kiện
  // id_khachhang=tbl_dangky.id_dangky, sau đó sắp xếp kết quả theo id_cart giảm dần.
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh); 
  // Truy vấn SQL được thực thi bằng hàm mysqli_query để nhận được một tập hợp các kết quả.
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
  	<th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){ //Sử dụng vòng lặp while để duyệt qua từng hàng kết quả của truy vấn.
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
    <!-- Dùng các thẻ <td> để hiển thị thông tin từ cơ sở dữ liệu vào từng ô trong bảng. -->
    	<?php if($row['cart_status']==1){
    		echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xem';
    	}
    	?>
    </td>
   	<td>
   		<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
     <!-- Dựa vào giá trị của cart_status, hiển thị trạng thái đơn hàng và tạo liên kết để xử lý đơn hàng mới hoặc xem đơn hàng. -->
  </tr>
  <?php
  } 
  ?>
 
</table>