<?php
include './dbconfig.php';
$error = "";

//login form
if (isset($_POST['btnLogin'])) {
    $email = $_POST['txtUname'];
    $password = $_POST['txtPassword'];

    $query = "select id,name,utype from users where email = '" . $email . "' and `password` = '" . $password . "' and ustatus = '1'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_row($result);
        $_SESSION['user_id'] = $row[0];                
        $_SESSION['user_name'] = $row[1];        
        $_SESSION['user_type'] = $row[2];        
     
        header("location:admin_home.php");
    } else {
        $error = "Email and Password are wrong.";
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Login - Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/crawler.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menu1.js"></script>        
        <script type="text/javascript">


            function LogingValidate() {
                var email = document.getElementById('txtUname');
                if (email.value.trim() == "") {
                    alert('Please enter your email.');
                    return false;
                }
                var pwd = document.getElementById('txtPassword');
                if (pwd.value.trim() == "") {
                    alert('Please enter your password');
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
                    <div class="content" style="height: 500px;padding: 20px;"> 
                        <?php
                        if (!empty($_GET['status']) && $_GET['status'] == "login") {
                            ?>                            
                            <div colspan="2" class="message">
                                <span class="failed">                                               
                                    <img src="images/cross.gif"/>&nbsp;&nbsp;<b>Must be login for placing order.</b>
                                </span>
                            </div>

                            <?php
                        }
                        ?>
                        
                        <div style="width: 420px;float: left;background: #f2f2f2;margin: 70px 10px 10px 10px;padding: 10px;">
                            <form action="#" method="post">
                                <table cellpadding="10" cellspacing="10" border="0" width="100%">                                   
                                    <tr>
                                        <td colspan="2">
                                            <h2 class="login_title">Already registered?</h2>                                            
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
                                        <td class="newuser_bold">Email</td>
                                        <td><input type="text" name="txtUname" id="txtUname" class="newuser_input" maxlength="100"/></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold" width="150">Password</td>
                                        <td><input type="password" name="txtPassword" id="txtPassword" class="newuser_input" maxlength="25"/></td>
                                    </tr>       

                                    <tr>
                                        <td align="right" colspan="2"><input type="submit" name="btnLogin" id="btnLogin" value="Login" onclick="return LogingValidate();" class="prdbuttonmore"/></td>
                                    </tr>                                                                        
                                    <tr><td height="120">&nbsp;</td></tr>                                    
                                </table>
                            </form>
                        </div>

                    </div>
                </div>

                <?php
                include('footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
