$sql= " select * from customer where (cust_email='$cust_email' or cust_mobile='$cust_mobile');";
     $res=mysqli_query($dbc,$sql);
     if (mysqli_num_row($res) > 0){
       $row = mysqli_fetch_assoc($res);

       if($cust_email==$row['cust_email'])
       {
         $error[] = 'Email alredy Exits';
       }
       if($cust_mobile==$row['cust_mobile'])
       {
         $error[] = 'Number alredy Exits';
       }