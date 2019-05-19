<?php
include './dbconfig.php';
$error = "";
if (!empty($user_id)) {

    if (isset($_POST['btnupdate'])) {
        extract($_POST);
        if (empty($oldpassword)) {
            $error = "Please enter current password.";
        }
        if (empty($newpwd)) {
            $error .= "Please enter new password.";
        }
        if (empty($conpwd)) {
            $error .= "Please enter conform password.";
        }
        if ($newpwd != $conpwd) {
            $error .= "Password is not matching with conform password";
        }
        if (empty($error)) {


            $query_user = "update users set password= '" . $newpwd . "' where id='" . $user_id . "' AND password='" . $oldpassword . "'";
            $res_user = mysqli_query($con, $query_user);
            if (mysqli_affected_rows($con) > 0) {
                $error = "Your Password has been Changed.";
            } else {
                $error = "Your Password has not been Changed.";
            }
        }
    }
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Change Password - Consulting Service</title>
            <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
            <script type="text/javascript" src="js/crawler.js"></script>
            <script type="text/javascript" src="js/menu.js"></script>
            <script type="text/javascript">
                function formValidation() {
                    var oldpassword = document.getElementById('oldpassword');
                    if (oldpassword.value.trim() == "") {
                        alert('Please enter your Current Password.');
                        oldpassword.focus();
                        return false;
                    }
                    var newpwd = document.getElementById('newpwd');
                    if (newpwd.value.trim() == "") {
                        alert('Please enter new password.');
                        newpwd.focus();
                        return false;
                    }
                    var conpwd = document.getElementById('conpwd');
                    if (conpwd.value.trim() == "") {
                        alert('Please enter conform password.');
                        conpwd.focus();
                        return false;
                    }
                    if (newpwd.value.trim() != conpwd.value.trim()) {
                        alert('Password does not matched with confirm password.');
                        conpwd.focus();
                        return false;
                    }

                }
            </script>
        </head>
        <body onload="emailchk();">
            <div id="wrapper">
                <div id="container">
                    <div id="header">
                        <?php
                        include('header.php');
                        ?>
                    </div>
                    <div id="center-page">
                        <table border="0" width="100%">
                            <tr>
                                <td>
                                    <?php
                                    include('custmenu.php');
                                    ?>
                                </td>
                                <td width="800" valign="top">
                                    <form action="" method="post">
                                        <table cellpadding="10" cellspacing="10" border="0">
                                            <?php
                                            if (!empty($error)) {
                                                ?>
                                                <tr>
                                                    <td colspan="2" class="message">
                                                        <span class="failed">                                               
                                                            <b><?php echo $error; ?></b>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td><h2>Change Password</h2></td>
                                            </tr>
                                            <tr>
                                                <td class="teamname">Old Password</td>
                                                <td><input type="password" name="oldpassword" id="oldpassword" class="input_text" placeholder="Current Password"  /></td>
                                            </tr>
                                            <tr>
                                                <td class="teamname">New Password</td>
                                                <td><input type="password" name="newpwd" id="newpwd" class="input_text" placeholder="New Password" /></td>
                                            </tr>
                                            <tr>
                                                <td class="teamname">Confirm Password</td>
                                                <td><input type="password" name="conpwd" id="conpwd" class="input_text" placeholder="Confirm Password" /></td>
                                            </tr>


                                            <tr>
                                                <td colspan="2" align="right">
                                                    <input type="submit" name="btnupdate" id="btnupdate" class="prdbuttonmore" value="Change Now" onclick="return formValidation()"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>                                
                        </table>
                    </div>

                    <?php
                    include('footer.php');
                    ?>
                </div>
            </div>
        </body>
    </html>
    <?php
} else {
    header("location:login.php?logout=success");
}
?>

