<?php
include './dbconfig.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Message - Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
        <link type="text/css" href="stylesheet/form-field.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/crawler.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menu1.js"></script>
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
                    <div class="content" style="min-height: 500px;">
                        <div class="message" align="center" style="margin-top: 50px;">
                            <?php
                            $type = $_GET['type'];                            
                            if ($type == "CustomerAdded") {
                                ?>
                                <span class="readyToBuy">
                                    <br/><br/>
                                    <br/><br/>
                                    <img src="images/tick.gif"/>&nbsp;&nbsp;you are successfully registered in our company.<br/><br/>
                                    your mobile no is default password.!!
                                    <br/><br/>
                                    for login <a href="login.php" class="handshape">CLICK HERE</a>
                                    <br/><br/>
                                    <br/><br/>
                                </span>

                                <?php
                            } else if ($type == "CustomerNotAdded") {
                                ?>
                                <span class="failed">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/cross.gif"/>&nbsp;&nbsp;you are not registered in our company.  !!
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>

                                <?php
                            } else if ($type == "LoginFailed") {
                                ?>
                                <span class="failed">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/cross.gif"/>&nbsp;&nbsp;<b>Your Email address and password are wrong.<br/><br/>
                                        !! Please Login Again.<br/><br/></b>
                                    <a href="login.php" class="handshape">CLICK HEAR</a>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>


                                <?php
                            } else if ($type == "EnquirySubmit") {
                                ?>
                                <span class="readyToBuy">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/tick.gif"/>&nbsp;&nbsp;<b>Your query has been successfully submitted.</b>
                                    <br/><br/> I will contact as soon possible.!!
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>
                                <?php
                            } else if ($type == "EnquiryNotSubmit") {
                                ?>
                                <span class="failed">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/cross.gif"/>&nbsp;&nbsp;<b> Your Enquiry has not been submitted.!!</b>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>
                                <?php
                            } else if ($type == "sessionExpired") {
                                ?>
                                <span class="failed">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/cross.gif"/>&nbsp;&nbsp;<b>Session Time has been Expired.</b>
                                    <br/><br/>
                                    <b>Login Again</b>
                                    <br/><br/>
                                    <a href="login.php" class="handshape">Click Here</a>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>

                                <?php
                            } else if ($type == "admin") {
                               session_unset("user_id");
                                session_unset("user_name");
                                session_unset("user_type");                           
                                session_destroy();
                                ?>
                                <span class="readyToBuy">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/tick.gif"/>&nbsp;&nbsp;<b>Your are successfully logout.</b>
                                    <br/><br/>
                                    <b>Login Again</b>
                                    <br/><br/>
                                    <a href="login.php" class="handshape">Click Here</a>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>
                                <?php
                            } else if ($type == "customer") {

                                session_unset("user_id");
                                session_unset("user_name");
                                session_unset("user_type");                           
                                session_destroy();
                                ?>
                                <span class="readyToBuy">
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <img src="images/tick.gif"/>&nbsp;&nbsp;<b>Your are successfully logout.</b>
                                    <br/><br/>
                                    <b>Login Again</b>
                                    <br/><br/>
                                    <a href="login.php" class="handshape">Click Here</a>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                </span>
                                <?php
                            } else if ($type == "ProfileUpdated") { //ProfileUpdated
                                ?>
                                <span class="readyToBuy"><img src="images/tick.gif"/>&nbsp;&nbsp;Your profile has been successfully updated.!!</span>
                                <?php
                            } else if ($type == "ProfileNotUpdated") {//ProfileNotUpdated
                                ?>
                                <span class="failed"><img src="images/cross.gif"/>&nbsp;&nbsp;Your profile has not been updated.!!</span>

                                <?php
                            }
                            ?>

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
