<p>Xem đơn hàng</p>
<?php
	$code = $_GET['code']; //lấy giá trị của code từ URL để truyền qua GET.
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
  //lấy thông tin chi tiết đơn hàng từ bảng tbl_cart_details và tbl_sanpham dựa trên điều kiện
  // id_sanpham = tbl_sanpham.id_sanpham và code_cart bằng giá trị đã lấy từ tham số code.
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh); //Truy vấn SQL được thực thi bằng hàm mysqli_query để nhận được một tập hợp các kết quả.
?>
<table style="width:100%" border="1" style="border-collapse: collapse;"> 
<!-- sử dụng để hiển thị thông tin chi tiết đơn hàng -->
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){ //Sử dụng vòng lặp while để duyệt qua từng hàng kết quả
  	$i++;
  	$thanhtien = $row['giasp']*$row['soluongmua'];
  	$tongtien += $thanhtien ;
    //Tính tổng tiền từ mỗi sản phẩm + dồn nó lên
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<td colspan="6">
   		<p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</td>
  </tr>
</table>