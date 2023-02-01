<?php
include 'header_nav.php';
?>

<?php
if (isset($_SESSION['username'])) {
  if ($_SESSION['username']['user_role'] == 'customer') {
    header("Location: ../index.php");
  }
}
else{
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}}
?>
<div class="col-md-12 fw-bold fs-3">
    Feedback
</div>


<div class="col-xs-6">

    <?php
    $query = "SELECT *  FROM  feedback";
    $select_feedback = mysqli_query($connection, $query);
    ?>

    <table id="example" class="table table-striped data-table" style="width: 100%">
        <thead>
            <tr>
                <th>Feedback Id</th>
                <th>User Id</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Mobile</th>
                <th> Category Id</th>
                <th> Category Title</th>
                <th>Feedback Image</th>
                <th>Feedback Rating</th>
                <th>Feedback </th>
                <th>Send Response</th>
                

            </tr>
        </thead>
        <tbody>


            <?php
            while ($row = mysqli_fetch_assoc($select_feedback)) {
                $feed_id = $row['feed_id'];
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $user_mobile = $row['user_mobile'];
                $categorie_id = $row['categorie_id'];
                $categorie_tittle = $row['categorie_tittle'];
                $feed_image = $row['feed_image'];
                $feed_rating = $row['feed_rating'];
                $feed_message = $row['feed_message'];
                 
                

                echo "<tr>";
                echo "<td> {$feed_id} </td>";
                echo "<td> {$user_id} </td>";
                echo "<td> {$user_name} </td>";
                echo "<td> {$user_email} </td>";
                echo "<td> {$user_mobile} </td>";
                echo "<td> {$categorie_id} </td>";
                echo "<td> {$categorie_tittle} </td>";
                echo "<td> <img src='../uploads/feedback_uploads/".$feed_image. "'  width='150px' height='150px'> </td>";
                echo "<td> {$feed_rating} </td>";
                echo "<td> {$feed_message} </td>";
                echo "<td><a href='../admin/fedback.php?confirm=$feed_id'>Response </a></td>";
                
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

</div>

<?php

if (isset($_GET['confirm'])) {
    

    $to = "$user_email";
    $subject = "Thanks For your feedback";
    $message = "


Hi $user_name ,




Thanks for chhosing AIOservice!

Your Feedback is important for us.

it helps to iprove our service.

Have a great day!
AIOservice

";
    $from = "bpccs.abhipatel007@gmail.com";
    $headers = "FROM : $from";

    mail($to, $subject, $message, $headers);

    if (mail($to, $subject, $message, $headers)) {
        echo ("<script LANGUAGE='JavaScript'>
window.alert('Successfully Email Sent');

</script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
window.alert('Error While Sending Email Please Try Again!!');

</script>");
    }
    // end email




}
?>


<?php

include 'footer.php';
?>