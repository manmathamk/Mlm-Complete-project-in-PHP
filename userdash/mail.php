<?php
if(isset($_POST['submit'])){
  $userid = $_POST['userid'];
  $name = $_POST['name'];
  $pass = $_POST['password'];
  $pack = $_POST['package'];
  $email = $_POST['email'];
  $under = $_POST['under_userid'];

  $email_from = $email;

    $email_subject = "New Register Form submission";

    $email_body = "You have received a new message\n"."Child Details:\nName:"." $name\n"."Userid:$userid\n"."Password:$pass\n"."Upline:$under\n"."Package: $pack\n";

 $to = $email;

  $headers = "From: manmathamk126@gmail.com \r\n";

  echo $to.$email_subject.$email_body.$headers.
mail($to,$email_subject,$email_body,$headers);

 header('location:home.php');

}
 
?>
<form method="POST">
  name
  <input type="text" name="name">
  password
  <input type="text" name="password">
  package
  <input type="text" name="package">
  under_userid
  <input type="text" name="under_userid">
  userid
   <input type="text" name="userid">
   email
    <input type="text" name="email">
    <input type="submit" name="submit" value="submit">

</form>

