<?php include('menu.php'); ?>
         
    <section class="content">
        <div class="container-fluid">
        	<script type="text/javascript">
    function checkname()
{
 var name=document.getElementById( "UserName" ).value;
  
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="OK") 
   {
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}

  </script>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-info">
                           <form method="POST" action="insertdata.php" onsubmit="return checkall();">
  
     
Current Password:<br>
 <input class="form-control py-4" type="password" name="username" id="UserName" onkeyup="checkname();">
 <strong><span id="name_status"></span></strong>
<br>
New Password:<br>
<input class="form-control py-4" type="password" id="newPassword" name="newPassword">
<br>
Confirm Password:<br>
<input class="form-control py-4" type="password" id="confirmPassword" name="confirmPassword"></span>
 <strong><span id='message'></span></strong>
<br><br>
<input class="btn-primary col-lg-4 py-4" type="submit" name="submit">
</form>
                        </div>
                    </div>
                </div>
   
<script type="text/javascript">
        $('#newPassword, #confirmPassword').on('keyup', function () {
  if ($('#newPassword').val() == $('#confirmPassword').val()) {
    $('#message').html('Matched!').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
       </script>
