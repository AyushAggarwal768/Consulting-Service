<?php
include './dbconfig.php';
if (!empty($user_id)) {
    //registration form
    if (isset($_POST['btnsubmit'])) {
        $Name = $_POST['txtName'];
        $Email = $_POST['txtEmailID'];
        $Mobile = $_POST['txtMobile'];
        $password = $_POST['password'];

        $sql_query = "select email from users where email = '" . $Email . "'";
        $res_data = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($con, $res_data) > 0) {
            $error = "Email ID allready exits.";
        } else {
            $query = "insert into users(name,email,mobile,password,created,utype,admin_id) values('" . $Name . "','" . $Email . "','" . $Mobile . "','" . $password . "',now(),'employee','$user_id')";
            $res_user = mysqli_query($con, $query);
            $user_id = mysqli_insert_id($con);
            if ($user_id > 0) {                
                header("location:employee-list.php");
            } else {
                $error = "Your form has not been submited.";
            }
        }
    }
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Add Employee - Consulting Service</title>
            <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
            <script type="text/javascript" src="js/crawler.js"></script>
            <script type="text/javascript" src="js/menu.js"></script>
            <script type="text/javascript">
                function regValidation() {

                    var fname = document.getElementById('txtName');
                    if (fname.value.trim() == "") {
                        alert('Name fileld cannot be blank left. !!');
                        fname.focus();
                        return false;
                    }

                    var email = document.getElementById('txtEmailID');
                    if (email.value.trim() == "") {
                        alert('Email ID field cannot be blank left. !!');
                        email.focus();
                        return false;
                    }
                    var mobile = document.getElementById('txtMobile');
                    if (mobile.value.trim() == "") {
                        alert('Mobile No. field cannot be blank left. !!');
                        mobile.focus();
                        return false;
                    }
                    var password = document.getElementById('password');
                    if (password.value.trim() == "") {
                        alert('password. field cannot be blank left. !!');
                        password.focus();
                        return false;
                    }
                    var confirm_password = document.getElementById('confirm_password');
                    if (confirm_password.value.trim() == "") {
                        alert('Confirm Password. field cannot be blank left. !!');
                        confirm_password.focus();
                        return false;
                    }

                    if (password.value.trim() != confirm_password.value.trim()) {
                        alert('Password does not matched with confirm password.');
                        confirm_password.focus();
                        return false;
                    }
                }
                function validateEmail() {
                    //alert('calling');
                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    var address = document.getElementById('txtEmailID').value;
                    if (reg.test(address) == false) {
                        alert('Invalid Email Address');
                        return false;
                    }
                }
            </script>
        </head>
        <body>
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
                                    <div style="width: 750px;float: left;background: #f2f2f2;margin: 10px 10px 10px 10px;padding: 10px;">
                                        <form action="" method="post">
                                            <table cellpadding="12" cellspacing="12" border="0" width="100%">   

                                                <tr>
                                                    <td colspan="2">
                                                        <h2 class="login_title">Add Employee</h2>                                          
                                                    </td>
                                                </tr>
                                                <tr><td height="15"></td></tr>
                                                <?php
                                                if (!empty($error)) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="2" class="message">
                                                            <span class="failed">                                               
                                                                <img src="images/cross.gif"/>&nbsp;&nbsp;<b><?php echo $error; ?></b>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td class="newuser_bold" width="150">Name</td>
                                                    <td><input type="text" name="txtName" id="txtName" class="newuser_input" maxlength="100"/></td>
                                                </tr>                                       
                                                <tr>
                                                    <td class="newuser_bold">Email ID</td>
                                                    <td><input type="text" name="txtEmailID" id="txtEmailID" class="newuser_input"  onblur="return validateEmail();" maxlength="100"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Mobile No.</td>
                                                    <td><input type="text" name="txtMobile" id="txtMobile" class="newuser_input" onkeyup="CheckForIntegers(this);" maxlength="10"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Password</td>
                                                    <td><input type="password" name="password" id="password" class="newuser_input" maxlength="25"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Confirm Password</td>
                                                    <td><input type="password" name="confirm_password" id="confirm_password" class="newuser_input" maxlength="25"/></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" onclick="return regValidation();" class="prdbuttonbuynow" style="cursor: pointer;"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
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
