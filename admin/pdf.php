<?php
require('vendor/autoload.php');
require_once '../includes/db.php';


$d_id = $_POST['dataid'];



$res=mysqli_query($connection,"SELECT * from booked_service where book_id=$d_id");
  
if(mysqli_num_rows($res)>0){
	$html='<style></style><table class="table table-striped data-table" style="width: 100%">';
		$html.='<tr>

        <th>booking Id</th>
                <th>order Id</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Mobile</th>
                <th>Customer Location</th>
                <th>Order Date</th>
                <th>Order Time</th>
                <th>Service Name</th>
                
                <th>Cetegory</th>
                <th>Vender Id</th>
                <th>Vender Name</th>
                <th>Vender Email</th>
                <th>Vender Mobile</th>
                <th>PayMode</th>
                <th>Amount</th>
                <th>Status</th>

        </tr>';
		while($row=mysqli_fetch_assoc($res)){

			$html.='<tr>

            <td>'.$row['book_id'].'</td>
            <td>'.$row['order_id'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['user_name'].'</td>
            <td>'.$row['user_email'].'</td>
            <td>'.$row['user_mobile'].'</td>
            <td>'.$row['user_address'].'</td>

            <td>'. $row['order_date'].'</td>
            <td>'.$row['order_time'].'</td>
            <td>'.$row['item_name'].'</td>
            <td>'.$row['item_cate'].'</td>
            <td>'.$row['vender_id'].'</td>
            <td>'.$row['vender_name'].'</td>
            <td>'.$row['vender_email'].'</td>
            <td>'.$row['vender_mobile'].'</td>
            <td>'.$row['paymode'].'</td>
            <td>'.$row['item_price'].'</td>
            <td>'.$row['status'].'</td>
          




            </tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S


?>