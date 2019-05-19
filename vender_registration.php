<?php
include './dbconfig.php';
$error = "";


//registration form
if (isset($_POST['btnsubmit'])) {
    $Name = $_POST['txtName'];
    $Email = $_POST['txtEmailID'];
    $Mobile = $_POST['txtMobile'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $subscriptio_plan = $_POST['subscriptio_plan'];
    $name_on_card = $_POST['name_on_card'];
    $card_no = $_POST['card_no'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
    $start_date = date('Y-m-d');

    if($subscriptio_plan == "1 Month Plan Rs. 199/-"){
        $end_date = strtotime(date("Y-m-d", strtotime($start_date)) . " +1 month");
        $end_date = date("Y-m-d",$end_date);
    }else if($subscriptio_plan == "3 Month Plan Rs. 499/-"){
        $end_date = strtotime(date("Y-m-d", strtotime($start_date)) . " +3 month");
        $end_date = date("Y-m-d",$end_date);
    }else if($subscriptio_plan == "6 Month Plan Rs. 999/-"){
        $end_date = strtotime(date("Y-m-d", strtotime($start_date)) . " +6 month");
        $end_date = date("Y-m-d",$end_date);
    }else if($subscriptio_plan == "1 Year Plan Rs. 1999/-"){
        $end_date = strtotime(date("Y-m-d", strtotime($start_date)) . " +12 month");
        $end_date = date("Y-m-d",$end_date);
    }

    $sql_query = "select email from users where email = '" . $Email . "'";
    $res_data = mysqli_query($con, $sql_query);
    if (mysqli_num_rows($con, $res_data) > 0) {
        $error = "Email ID allready exits.";
    } else {
        echo $query = "insert into users(name,email,mobile,password,created,utype,address,city,state,pincode,subscription_plan,start_date,end_date) values('" . $Name . "','" . $Email . "','" . $Mobile . "','" . $password . "',now(),'vender','".$address."', '".$city."','".$state."','".$pincode."','".$subscriptio_plan."','".$start_date."', '".$end_date."')";
        $res_user = mysqli_query($con, $query);
        $user_id = mysqli_insert_id($con);
        if ($user_id > 0) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $Name;
            $_SESSION['user_type'] = "vender";

            //insert in payment tables
            $query2 = "INSERT INTO subscription_payment(user_id, name_on_card, card_no, expiry_date, cvv, payment_date) VALUES ('".$user_id."','".$name_on_card."', '".$card_no."','".$expiry."','".$cvv."',now())";
            mysqli_query($con, $query2);

            header("location:myprofile.php");
        } else {
            $error = "Your form has not been submited.";
        }
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Vendor Registration - Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/crawler.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menu1.js"></script>
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
                
                if(password.value.trim() != confirm_password.value.trim()){
                    alert('Password does not matched with confirm password.');
                    confirm_password.focus();
                    return false;
                }

            }
        </script>
        <script type="text/javascript">

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
                    <div class="content" style="height: 780px;padding: 20px;"> 
                        
                        <div style="width: 620px;background: #f2f2f2;margin: 20px auto 10px auto;padding: 20px 20px 20px 100px;">
                            <form action="" method="post">
                                <table cellpadding="12" cellspacing="12" border="0" width="100%">   
                                    <tr>
                                        <td colspan="2">
                                            <h2 class="login_title">Create an vendor account</h2>                                          
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
                                        <td class="newuser_bold" width="40%">Name</td>
                                        <td width="60%"><input type="text" name="txtName" id="txtName" class="newuser_input" maxlength="100"/></td>
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
                                        <td class="newuser_bold">Address</td>
                                        <td><input type="text" name="address" id="address" class="newuser_input" /></td>
                                    </tr>
                                     <tr>
                                        <td class="newuser_bold">City</td>
                                        <td><input type="text" name="city" id="city" class="newuser_input" /></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">State</td>
                                        <td><input type="text" name="state" id="state" class="newuser_input" /></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">Pin Code</td>
                                        <td><input type="text" name="pincode" id="pincode" class="newuser_input" onkeyup="CheckForIntegers(this);" maxlength="6"/></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">Suscription Plan</td>
                                        <td>
                                            <select name="subscriptio_plan" id="subscriptio_plan" class="newuser_input" required="">
                                                <option value="1 Month Plan Rs. 199/-">1 Month Plan Rs. 199/- </option>
                                                <option value="3 Month Plan Rs. 499/-">3 Month Plan Rs. 499/- </option>
                                                <option value="6 Month Plan Rs. 999/-">6 Month Plan Rs. 999/- </option>
                                                <option value="1 Year Plan Rs. 1999/-">1 Year Plan Rs. 1999/- </option>
                                            </select>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">Name on Card</td>
                                        <td><input type="text" name="name_on_card" id="name_on_card" class="newuser_input" required="" /></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">Card No.</td>
                                        <td><input type="text" name="card_no" id="card_no" class="newuser_input" onkeyup="CheckForIntegers(this);" maxlength="16" required="" /></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">Expiry</td>
                                        <td><input type="text" name="expiry" id="expiry" class="newuser_input" required="" /></td>
                                    </tr>
                                    <tr>
                                        <td class="newuser_bold">CVV.</td>
                                        <td><input type="text" name="cvv" id="cvv" class="newuser_input" onkeyup="CheckForIntegers(this);" maxlength="3" required="" /></td>
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

                    </div>
                </div>

                <?php
                include('footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
