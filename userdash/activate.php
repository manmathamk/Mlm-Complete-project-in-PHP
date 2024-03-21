<?php include "menu.php";
include "php-includes/connect.php";

// $id = $_POST['employee_id'];
if ($_GET['serid'] !='') {
    $userid = $_GET['serid'];
} else {
    $userid = $_SESSION['userid'];
}

echo "<script>alert(" . $userid . ")</script>";
// $sss = mysqli_query($con, "select * from activation where id='$id'");
// $rs = mysqli_fetch_array($sss);
// $userid = $rs['userid'];
$ssss = mysqli_query($con, "select * from user where email='$userid'");
$rss = mysqli_fetch_array($ssss);
$userid = $rss["email"];
$status = $rss["status"];
$side = $rss["side"];
$capping = 100000;
$under_userid = $rss["under_userid"];
echo $under_userid . $status . $userid;

$temp_under_userid = $under_userid;
$temp_side_count = $side . "count";

$temp_side = $side;
$total_count = 1;
$i = 1;
while ($total_count > 0) {
    $i;
    $q = mysqli_query(
        $con,
        "select * from tree where userid='$temp_under_userid'"
    );
    $r = mysqli_fetch_array($q);
    $current_temp_side_count = $r[$temp_side_count] + 1;
    $temp_under_userid;
    $temp_side_count;
    mysqli_query(
        $con,
        "update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'"
    );

    //income
    if ($temp_under_userid != "") {
        $income_data = income($temp_under_userid);
        $company_data = companyincome($temp_under_userid);
        //check capping
        //$income_data['day_bal'];
        if ($income_data["day_bal"] < $capping) {
            $tree_data = tree($temp_under_userid);
            $datesd = $income_data["date"];
            $countsdf = $income_data["counts"];
            $currentDateTime1 = date("Y-m-d H:i:s");
            $updatedDateTime1 = date(
                "Y-m-d H:i:s",
                strtotime($currentDateTime1 . " +5 hours 30 minutes")
            );
            $updatedDateOnly1 = date("Y-m-d", strtotime($updatedDateTime1));
            $updatedDateTime2 = date(
                "Y-m-d H:i:s",
                strtotime($datesd . " +11 hours 30 minutes")
            );
            $updatedDateTime2 = date("Y-m-d", strtotime($updatedDateTime2));
            $timestamp1 = strtotime($currentDateTime1);
            $timestamp2 = strtotime($datesd);
            $differenceInSeconds = abs($timestamp2 - $timestamp1);
            $daysDifference = floor($differenceInSeconds / (60 * 60 * 24));

            $temp_left_count = $tree_data["leftcount"];
            $temp_right_count = $tree_data["rightcount"];

            //Both left and right side should at least 1 user
            if ($temp_left_count > 1 && $temp_right_count > 1) {
                $temp_left_count;
                $temp_right_count;
                // echo '<script>alert("'.$daysDifference.'") </script>';
                if (
                    $temp_side == "left"
                ) {
                    if ($temp_left_count < $temp_right_count || $temp_right_count == $temp_left_count + 1) {
                    if ($countsdf < 10 && $daysDifference == 0) {
                        if ($company_data["count"] >= 10) {
                            $new_day_bal = $income_data["day_bal"] + 1000;
                            $new_current_bal =
                                $income_data["current_bal"] + 1000;
                            $new_total_bal = $income_data["total_bal"] + 1000;
                            $tds = ($income_data["current_bal"] + 1000) * 0.15;
                            $received =
                                $income_data["current_bal"] + 1000 - $tds;
                            $bv_bal = $income_data["bv"] + 1000;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                            );
                        } else {
                            if ($temp_left_count % 2 == 0) {
                                $new_day_bal = $company_data["amount"] + 300;
                                $new_current_bal = $company_data["count"] + 1;
                                // $new_total_bal = $income_data['total_bal'];
                                $temp_under_userid;
                                $countssd = $income_data["counts"] + 1;
                                $bv_bal = $income_data["bv"] + 300;
                                //update income
                                if (
                                    mysqli_query(
                                        $con,
                                        "update companyfunds set amount='$new_day_bal', count='$new_current_bal' where userid='$temp_under_userid'"
                                    )
                                ) {
                                }
                                mysqli_query(
                                    $con,
                                    "update income set bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                                );
                            } else {
                                $new_day_bal = $income_data["day_bal"] + 300;
                                $new_current_bal =
                                    $income_data["current_bal"] + 300;
                                $new_total_bal =
                                    $income_data["total_bal"] + 300;
                                $tds =
                                    ($income_data["current_bal"] + 300) * 0.15;
                                $received =
                                    $income_data["current_bal"] + 300 - $tds;
                                $bv_bal = $income_data["bv"] + 300;
                                $countssd = $income_data["counts"] + 1;
                                //update income
                                mysqli_query(
                                    $con,
                                    "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                                );
                            }
                        }
                        // if ($pkgs = 999) {
                    } elseif ($daysDifference > 0) {
                        //   echo '<script>alert("entered first difference more than 0") </script>';
                        if ($company_data["count"] >= 10) {
                            $new_day_bal = $income_data["day_bal"] + 1000;
                            $new_current_bal =
                                $income_data["current_bal"] + 1000;
                            $new_total_bal = $income_data["total_bal"] + 1000;
                            $tds = ($income_data["current_bal"] + 1000) * 0.15;
                            $received =
                                $income_data["current_bal"] + 1000 - $tds;
                            $bv_bal = $income_data["bv"] + 1000;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='1000', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        }else {
                            if ($temp_left_count % 2 == 0) {
                            $new_day_bal = $company_data["amount"] + 300;
                            $new_current_bal = $company_data["count"] + 1;
                            // $new_total_bal = $income_data['total_bal'];
                            $temp_under_userid;
                            $countssd = $income_data["counts"] + 1;
                            $bv_bal = $income_data["bv"] + 300;
                            //update income
                            if (
                                mysqli_query(
                                    $con,
                                    "update companyfunds set amount='$new_day_bal', count='$new_current_bal' where userid='$temp_under_userid'"
                                )
                            ) {
                            }
                            mysqli_query(
                                $con,
                                "update income set bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        } else {
                            $new_day_bal = $income_data["day_bal"] + 300;
                            $new_current_bal =
                                $income_data["current_bal"] + 300;
                            $new_total_bal = $income_data["total_bal"] + 300;
                            $tds = ($income_data["current_bal"] + 300) * 0.15;
                            $received =
                                $income_data["current_bal"] + 300 - $tds;
                            $bv_bal = $income_data["bv"] + 300;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        }
                        }
                        
                    }
                }
                } elseif (
                    $temp_side == "right"
                ) {
                    if ($temp_left_count > $temp_right_count || $temp_left_count == $temp_right_count + 1) {
                    // if ($pkgs = 999) {

                    if ($countsdf < 10 && $daysDifference == 0) {
                        if ($company_data["count"] >= 10) {
                            $new_day_bal = $income_data["day_bal"] + 1000;
                            $new_current_bal =
                                $income_data["current_bal"] + 1000;
                            $new_total_bal = $income_data["total_bal"] + 1000;
                            $tds = ($income_data["current_bal"] + 1000) * 0.15;
                            $received =
                                $income_data["current_bal"] + 1000 - $tds;
                            $bv_bal = $income_data["bv"] + 1000;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                            );
                        } else {
                            if ($temp_right_count % 2 == 0) {
                                $new_day_bal = $company_data["amount"] + 300;
                                $new_current_bal = $company_data["count"] + 1;
                                // $new_total_bal = $income_data['total_bal'];
                                $temp_under_userid;
                                $countssd = $income_data["counts"] + 1;
                                $bv_bal = $income_data["bv"] + 300;
                                //update income
                                if (
                                    mysqli_query(
                                        $con,
                                        "update companyfunds set amount='$new_day_bal', count='$new_current_bal' where userid='$temp_under_userid'"
                                    )
                                ) {
                                }
                                mysqli_query(
                                    $con,
                                    "update income set bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                                );
                            } else {
                                $new_day_bal = $income_data["day_bal"] + 300;
                                $new_current_bal =
                                    $income_data["current_bal"] + 300;
                                $new_total_bal =
                                    $income_data["total_bal"] + 300;
                                $tds =
                                    ($income_data["current_bal"] + 300) * 0.15;
                                $received =
                                    $income_data["current_bal"] + 300 - $tds;
                                $bv_bal = $income_data["bv"] + 300;
                                $countssd = $income_data["counts"] + 1;
                                //update income
                                mysqli_query(
                                    $con,
                                    "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='$bv_bal', counts='$countssd' where userid='$temp_under_userid' limit 1"
                                );
                            }
                        }
                    } elseif ($daysDifference > 0) {
                        // echo '<script>alert("entered second difference more than 0") </script>';
                        if ($company_data["count"] >= 10) {
                            $new_day_bal = $income_data["day_bal"] + 1000;
                            $new_current_bal =
                                $income_data["current_bal"] + 1000;
                            $new_total_bal = $income_data["total_bal"] + 1000;
                            $tds = ($income_data["current_bal"] + 1000) * 0.15;
                            $received =
                                $income_data["current_bal"] + 1000 - $tds;
                            $bv_bal = $income_data["bv"] + 1000;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='1000', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        }else{
                           if ($temp_right_count % 2 == 0) {
                            $new_day_bal = $company_data["amount"] + 300;
                            $new_current_bal = $company_data["count"] + 1;
                            // $new_total_bal = $income_data['total_bal'];
                            $temp_under_userid;
                            $countssd = $income_data["counts"] + 1;
                            $bv_bal = $income_data["bv"] + 300;
                            //update income
                            if (
                                mysqli_query(
                                    $con,
                                    "update companyfunds set amount='$new_day_bal', count='$new_current_bal' where userid='$temp_under_userid'"
                                )
                            ) {
                            }
                            mysqli_query(
                                $con,
                                "update income set bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        } else {
                            $new_day_bal = $income_data["day_bal"] + 300;
                            $new_current_bal =
                                $income_data["current_bal"] + 300;
                            $new_total_bal = $income_data["total_bal"] + 300;
                            $tds = ($income_data["current_bal"] + 300) * 0.15;
                            $received =
                                $income_data["current_bal"] + 300 - $tds;
                            $bv_bal = $income_data["bv"] + 300;
                            $countssd = $income_data["counts"] + 1;
                            //update income
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                            );
                        } 
                        }
                        
                    }
                }
                } else {
                    if ($temp_right_count <= $temp_left_count) {
                        $new_day_bal = $income_data["day_bal"];
                        $new_current_bal = $income_data["current_bal"];
                        $new_total_bal = $income_data["total_bal"];
                        $temp_under_userid;
                        //update income
                        if (
                            mysqli_query(
                                $con,
                                "update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid'"
                            )
                        ) {
                        }
                    }
                }
            } elseif ($temp_left_count == 1 && $temp_right_count == 2) {
                $new_day_bal = $income_data["day_bal"] + 300;
                $new_current_bal = $income_data["current_bal"] + 300;
                $new_total_bal = $income_data["total_bal"] + 300;
                $tds = ($income_data["current_bal"] + 300) * 0.15;
                $received = $income_data["current_bal"] + 300 - $tds;
                $bv_bal = $income_data["bv"] + 300;
                $countssd = $income_data["counts"] + 1;
                //update income
                mysqli_query(
                    $con,
                    "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                );
            } elseif ($temp_left_count == 2 && $temp_right_count == 1) {
                $new_day_bal = $income_data["day_bal"] + 300;
                $new_current_bal = $income_data["current_bal"] + 300;
                $new_total_bal = $income_data["total_bal"] + 300;
                $tds = ($income_data["current_bal"] + 300) * 0.15;
                $received = $income_data["current_bal"] + 300 - $tds;
                $bv_bal = $income_data["bv"] + 300;
                $countssd = $income_data["counts"] + 1;
                //update income
                mysqli_query(
                    $con,
                    "update income set day_bal='$new_day_bal', current_bal='$received', total_bal='$new_total_bal', tds='$tds', received='$received', bv='300', counts='1' where userid='$temp_under_userid' limit 1"
                );
            }

            //Both left and right side should at least 1 user
        }
        //change under_userid
        $next_under_userid = getUnderId($temp_under_userid);
        $temp_side = getUnderIdPlace($temp_under_userid);
        $temp_side_count = $temp_side . "count";
        $temp_under_userid = $next_under_userid;

        $i++;
    }

    //Chaeck for the last user
    if ($temp_under_userid == "") {
        $total_count = 0;
    }
} //Loop

function pin_check($pin)
{
    global $con, $userid;

    $query = mysqli_query(
        $con,
        "select * from pin_list where pin='$pin' and userid='$userid' and status='open'"
    );
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}
function email_check($email)
{
    global $con;

    $query = mysqli_query($con, "select * from user where email='$email'");
    if (mysqli_num_rows($query) > 0) {
        return false;
    } else {
        return true;
    }
}
function side_check($email, $side)
{
    global $con;

    $query = mysqli_query($con, "select * from tree where userid='$email'");
    $result = mysqli_fetch_array($query);
    $side_value = $result[$side];
    if ($side_value == "") {
        return true;
    } else {
        return false;
    }
}
function income($userid)
{
    global $con;
    $data = [];
    $query = mysqli_query($con, "select * from income where userid='$userid'");
    $result = mysqli_fetch_array($query);
    $data["day_bal"] = $result["day_bal"];
    $data["current_bal"] = $result["current_bal"];
    $data["total_bal"] = $result["total_bal"];
    $data["bv"] = $result["bv"];
    $data["date"] = $result["date"];
    $data["counts"] = $result["counts"];
    return $data;
}

function companyincome($userid)
{
    global $con;
    $data = [];
    $query = mysqli_query(
        $con,
        "select * from companyfunds where userid='$userid'"
    );
    $result = mysqli_fetch_array($query);
    $data["amount"] = $result["amount"];
    $data["count"] = $result["count"];

    return $data;
}
function tree($userid)
{
    global $con;
    $data = [];
    $query = mysqli_query($con, "select * from tree where userid='$userid'");
    $result = mysqli_fetch_array($query);
    $data["left"] = $result["left"];
    $data["right"] = $result["right"];
    $data["leftcount"] = $result["leftcount"];
    $data["rightcount"] = $result["rightcount"];

    return $data;
}
function getUnderId($userid)
{
    global $con;
    $query = mysqli_query($con, "select * from user where email='$userid'");
    $result = mysqli_fetch_array($query);
    return $result["under_userid"];
}
function getUnderIdPlace($userid)
{
    global $con;
    $query = mysqli_query($con, "select * from user where email='$userid'");
    $result = mysqli_fetch_array($query);
    return $result["side"];
}

$sqql = mysqli_query(
    $con,
    "Update user set status='active' where email='$userid'"
);

echo '<script>alert("user Activated");
window.location.replace("http://akshaya.asia/userdash/home.php"); </script>';
?>
