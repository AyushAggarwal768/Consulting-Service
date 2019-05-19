<?php
include './dbconfig.php';
$error = "";
if (!empty($user_id)) {

    if (isset($_POST['btnupdate'])) {
        extract($_POST);
        $query_user = "update users set name= '" . $name . "',email = '" . $email . "',mobile='" . $mobile . "',gender='" . $gender . "',address='" . $address . "',city='" . $city . "',state='" . $state . "',pincode='" . $pincode . "',news_letter ='" . $news_letter . "',updated=now() where id = '" . $user_id . "'";
        $res_user = mysqli_query($con, $query_user);
        if (mysqli_affected_rows($con)) {
            $error = "Your profile has been updated.";
        } else {
            $error = "Your profile has not been updated.";
        }
    }
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>My Profie - Consulting Service</title>
            <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
            <script type="text/javascript" src="js/crawler.js"></script>
            <script type="text/javascript" src="js/menu.js"></script>
            <script type="text/javascript">
                function formValidation() {
                    var name = document.getElementById('name');
                    if (name.value.trim() == "") {
                        alert('Please enter your name.')
                        name.focus();
                        return false;
                    }
                    var gender = document.getElementById('gender');
                    if (gender.value.trim() == "") {
                        alert('Please select gender.')
                        gender.focus();
                        return false;
                    }
                    var email = document.getElementById('email');
                    if (email.value.trim() == "") {
                        alert('Please select email.')
                        email.focus();
                        return false;
                    }
                    var mobile = document.getElementById('mobile');
                    if (mobile.value.trim() == "") {
                        alert('Please select mobile.')
                        mobile.focus();
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
                                <td valign="top">
                                    <?php
                                    include('custmenu.php');
                                    ?>
                                </td>
                                <td valign="top" width="800">
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
                                                <td><h2>My Account</h2></td>
                                            </tr>
                                            <?php
                                            $result = mysqli_query($con, "select * from users where id = '$user_id'");
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>                                                                
                                                <tr>
                                                    <td class="teamname">Name</td>
                                                    <td><input type="text" name="name" id="name" class="input_text" value="<?php echo $row ['name']; ?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">Gender</td>
                                                    <td>
                                                        <select name="gender" id="gender" class="input_text" style="width: 206px;">
                                                            <option value=""> - - - - - Select - - - - -</option>
                                                            <?php
                                                            if ($row ['name'] == "Male") {
                                                                echo '<option value="Male" selected>Male</option>';
                                                                echo '<option value="Female">Female</option>';
                                                            } else {
                                                                echo '<option value="Male">Male</option>';
                                                                echo '<option value="Female" selected>Female</option>';
                                                            }
                                                            ?>


                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">Email</td>
                                                    <td><input type="text" name="email" id="email" class="input_text" readonly value="<?php echo $row ['email']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">Mobile No.</td>
                                                    <td><input type="text" name="mobile" id="mobile" class="input_text" value="<?php echo $row ['mobile']; ?>"onkeyup="CheckForIntegers(this);" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">Address</td>
                                                    <td>
                                                        <textarea name="address" id="address" class="input_text" style="height: 80px;"><?php echo $row ['address']; ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">Pin Code</td>
                                                    <td><input type="text" name="pincode" id="pincode" class="input_text" onkeyup="CheckForIntegers(this);" value="<?php echo $row ['pincode']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">City</td>
                                                    <td><input type="text" name="city" id="city" class="input_text" value="<?php echo $row ['city']; ?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="teamname">State</td>
                                                    <td>
                                                        <select name="state" id="state" class="input_text" style="width: 206px;">
                                                            <option value="na" > - - - - - Select - - - - -</option>
                                                            <?php
                                                            $sql_query = "SELECT StateID,State FROM z_state"; //execute query
                                                            $result = mysqli_query($con, $sql_query);
                                                            while ($row1 = mysqli_fetch_array($result)) {
                                                                if ($row1 ['State'] == $row['state']) {
                                                                    echo '<option value="' . $row1 ['State'] . '" selected>' . $row1 ['State'] . '</option>';
                                                                } else {
                                                                    echo '<option value="' . $row1 ['State'] . '">' . $row1 ['State'] . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>                                                                
                                                <tr>
                                                    <td colspan="2" class="text">
                                                        <?php
                                                        if ($row ['news_letter'] == "yes") {
                                                            ?>
                                                            <input type="checkbox" name="news_letter" id="news_letter" value="yes" checked/>&nbsp;&nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input type="checkbox" name="news_letter" id="news_letter" value="no"/>&nbsp;&nbsp;
                                                            <?php
                                                        }
                                                        ?>

                                                        Please tick here if you do not wish to receive email newsletters and other email<br/>
                                                        based offers relating to  products and services from us
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2" align="right">
                                                    <input type="submit" name="btnupdate" id="btnupdate" class="prdbuttonmore" value="Update" onclick="return formValidation()"/>
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

