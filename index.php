<?php
include './dbconfig.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Welcome to Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/crawler.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menu1.js"></script>
        <!--Slider -->
        <link href="css/nivo-slider.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery-1.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $('#slider').nivoSlider();
            });
        </script>       
    </head>
    <body>
        <div id="wrapper">
            <div id="container">
                <div id="header">
                    <?php
                    include 'header.php';
                    ?>
                </div> 
                <div class="banner-middle">
                    <div id="slider" class="nivoSlider">   
                      <img src="images/slider.JPG" />
                      <img src="images/slider2.JPG" />
                      <img src="images/slider3.JPG" />
                      <img src="images/slider4.JPG" />
                    </div>                            
                </div>
                <div class="content" style="height: 320px;">
                    <br/><br/>                    
                    <div class="product-category">                     
                        <h1 style="padding-left: 10px;">About Project</h1>
                        <p style="line-height: 22px;padding: 10px;font-size: 14px;color: #666666;">
                                This Application is useful for preparing the timesheets, which are entered by the consultants. Time sheet
                                consists of company and project details and for each task like coding, design, testing, and documentation
                                etc, the number of hours they worked throughout the week. Consultants having the permission to enter the
                                time sheet. Also can check different types of reports based on project or client wise. These entered Time
                                sheets can be approved or rejected by the Manager (approver). This approving the time sheets is done by
                                manager at the end of week by selecting option called week ending dates. At the manager’s login there are
                                reports based on different search criteria. To maintain the details of users, projects, consultants, permission
                                to login users and define the new roles can be done at administrative tasks. This application is maintaining
                                three types of logins consultant, manager and administrator. Consultant can act as timesheet entry or
                                expense sheet entry. Manager role is to approve the time sheet or expense sheet. And admin maintain all
                                the details of consultants, managers, projects and roles. This reduces administrative costs for the company
                                side.
                            </p>  
                    </div>                     
                </div>   
                <div class="clear">&nbsp;</div>
                <?php
                include('footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
