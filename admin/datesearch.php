


<?php
include 'header_nav.php';
?>
<!-- search by date offcanvas   -->

 
 <!-- search by NAM#E$ offcanvas  -->





  <?php
$con=mysqli_connect('localhost','root','','aioservice');
$sub_sql="";
$toDate=$fromDate="";
if(isset($_POST['submit'])){
	$from=$_POST['from'];
	$fromDate=$from;
	$fromArr=explode("/",$from);
	$from=$fromArr['2'].'-'.$fromArr['1'].'-'.$fromArr['0'];
	$from=$from." 00:00:00";
	
	$to=$_POST['to'];
	$toDate=$to;
	$toArr=explode("/",$to);
	$to=$toArr['2'].'-'.$toArr['1'].'-'.$toArr['0'];
	$to=$to." 23:59:59";
	
	$sub_sql= " where created_at >= '$from' && created_at <= '$to' ";
}

$res=mysqli_query($con,"select * from users $sub_sql order by user_id");
?>

<div class="container">
  <br/><h1>Contact Us</h1><br/>
  
  <div>
	<form method="post">
		<label for="from">From</label>
		<input type="text" id="from" name="from" required value="<?php echo $fromDate?>">
		<label for="to">to</label>
		<input type="text" id="to" name="to" required value="<?php echo $toDate?>">
		<input type="submit" name="submit" value="Filter">
	</form>
  </div>
  <br/><br/>
  <?php if(mysqli_num_rows($res)>0){?>
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>

                            <th>Cetegory</th>
                            <th>Location</th>
                            <th>adhar Card</th>
                            <th>Pan Card</th>
                            <th>Registration Certi.</th>
                            <th>User_role</th>
                            <th>Joined At</th>
                            <th>TIME</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
      <td><?php echo $row['user_id'] ?></td>
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['user_email'] ?></td>
                                <td><?php echo $row['user_mobile'] ?></td>

                                <td><?php echo $row['user_cate'] ?></td>
                                <td><?php echo $row['user_locat'] ?></td>

                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $row['user_adhar'] ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $row['user_pan'] ?>"></td>
                                <td><img width="100" src="../uploads/vender_uploads/<?php echo $row['user_certi'] ?>"></td>



                                <td><?php echo $row['user_role'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td><?php echo $row['time'] ?></td>




       
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  <?php } else {
	echo "No data found";  
  }
  ?>
</div>
<script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>


















  
  </div>
</div>


<?php
include 'footer.php';
?>