<?php include('menu.php');

if(isset($_POST['prof'])){
$name = $_POST['name'];
$mob = $_POST['mob'];
$date = $_POST['date'];
$addr = $_POST['addr'];
$pkg = $_POST['pkg'];

$sql = mysqli_query($con,"update user set name='$name',mobile='$mob',date='$date',address='$addr',package='$pkg' where email=$userid");
}
if(isset($_POST['pswd'])){

$npwdc = $_POST['nnp'];
$npwd = $_POST['np'];
$oldp = $_POST['olp'];

$my = mysqli_query($con,"SELECT * FROM `user` WHERE email='$userid'");
$rows = mysqli_fetch_array($my);
$psws = $rows['password'];
if ($oldp == $psws) {

    $sql = mysqli_query($con,"UPDATE `user` SET `password` = '$npwd' WHERE email='$userid'");
    echo '<script>window.location.assign("index.php");</script>';
    # code...
}

}
if(isset($_POST['bnk'])){
$ba_name = $_POST['b_name'];
$ba_acc = $_POST['b_acc'];
$ba_aname = $_POST['b_aname'];
$bp_name = $_POST['b_pname'];
$aifsc = $_POST['ifsc'];

$sql = mysqli_query($con,"update user set b_name='$ba_name',b_pname='$bp_name',account='$ba_acc',b_aname='$ba_aname',ifsc='$aifsc' where email='$userid'");
}
$sql = mysqli_query($con, "select * from user where email='$userid'");
$row = mysqli_fetch_array($sql);
$b_name = $row['b_name'];
$b_pname = $row['b_pname'];
$b_acc = $row['account'];
$b_aname = $row['b_aname'];
$ifsc = $row['ifsc'];
 if ($b_name!='' && $b_acc!='' && $ifsc!='') {
     $tts = 'readonly';
 }

$sqll = mysqli_query($con, "select * from tree where userid='$userid'");
$rowl = mysqli_fetch_array($sqll);
$lc = $rowl['leftcount'];
$rc = $rowl['rightcount'];
$cc = $rowl['centercount'];

$sqls = mysqli_query($con, "select * from links where userid='$userid' order by id desc limit 1");
$rows = mysqli_fetch_array($sqls);
$ln = $rows['link'];
?>


    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">
                        <h3 style="color: white">&nbsp;&nbsp;<?php echo $name;?></h3><p style="color: white">&nbsp;&nbsp;User-id : <?php echo $userid ?></p></div>
                        <div class="profile-body">
                        
                            <!-- <div class="image-area">
                                <img src="dimages/user-lg.jpg" alt="AdminBSB - Profile Image">
                            </div> -->
                            <div class="content-area">
                                
                                
                                <p>Join Date : <?php echo $date ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Left</span>
                                    <span><?php echo $lc ?></span>
                                </li>
                                <li>
                                    <span>Right</span>
                                    <span><?php echo $rc ?></span>
                                </li>
                                <!-- <li>
                                    <span>Center</span>
                                    <span><?php echo $cc ?></span>
                                </li> -->
                            </ul>
                            <a href="<?php echo $ln ?>"> <button class="btn btn-primary btn-lg waves-effect btn-block">JOIN</button></a>
                        </div>
                    </div>

                    
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#bank" aria-controls="settings" role="tab" data-toggle="tab">Bank Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    
                                        <strong>Hi welcome to Profile editions please look forward for profile editiong</strong>
                                    
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input readonly type="text" class="form-control" id="NameSurname" name="name" placeholder="Name Surname" value="<?php echo $name?>" required="">
                                                    </div>
                                                </div>
                                           </div> 
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Mobile</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="text" readonly class="form-control" id="NameSurname" name="mob" placeholder="Name Surname" value="<?php echo $mobile?>" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Join Date</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input readonly type="text" class="form-control" id="Email" name="date" placeholder="Email" value="<?php echo $date ?>" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Address</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea readonly class="form-control" id="InputExperience" name="addr" rows="3" value="  "><?php echo $address?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Package</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input readonly type="text" class="form-control" id="InputSkills" name="pkg" value="<?php echo 'Rs.'.$package?>">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="prof" class="btn btn-danger">SUBMIT</button>
                                                    <button type="submit" name="reqp" class="btn btn-primary">Request For Profile Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="bank">
                                        <form class="form-horizontal" method="post" action="profile.php">
                                            <div class="form-group">
                                                <label for="Emailee" class="col-sm-2 control-label">Holder Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input <?php echo $tts ?> type="text" class="form-control" id="Emailee" name="b_pname" placeholder="Holder Name" value="<?php echo $b_pname?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name of Bank</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input <?php echo $tts ?> type="text" class="form-control" id="NameSurname" name="b_name" placeholder="Name Bank"  required="" value="<?php echo $b_name?>">
                                                    </div>
                                                </div>
                                           </div> 
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Account number</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input <?php echo $tts ?> type="text" class="form-control" id="NameSurname" name="b_acc" placeholder="account number" required="" value="<?php echo $b_acc ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Branch</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input <?php echo $tts ?> type="text" class="form-control" id="Email" name="b_aname" placeholder="Account name" value="<?php echo $b_aname?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">IFSC Code</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input <?php echo $tts ?> type="text" class="form-control" id="InputSkills" name="ifsc" value="<?php echo $ifsc?>">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="bnk" class="btn btn-danger">SUBMIT</button>
                                                    <button type="submit" name="reqb" class="btn btn-primary">Request For Bank Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form method="post" class="form-horizontal">


                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="olp" name="olp" placeholder="Old Password" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="np" placeholder="New Password" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="nnp" placeholder="New Password (Confirm)" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" name="pswd" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="djs/pages/examples/profile.js"></script>

</div></section></body></html>
<?php include('flinks.php');?>