<?php
include './dbconfig.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Contact Us - Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
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
                    <div class="content">
                        <table  width="970" border="0" style="margin-left: -20px;float: left;">
                            <tr>
                                <td height="44" colspan="2" valign="top" class="title" style="padding-top: 10px;">
                                    <img src="images/tl-contactus.gif" width="110" height="30" alt="Samepal.com- Eshop"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="350" valign="top">
                                    <table cellpadding="10" cellspacing="10" width="100%">
                                        <tr>
                                            <td class="newuser_bold"><h2>Office Location</h2></td>
                                        </tr>
                                        <tr>
                                            <td class="boldmatter"><h3>Consulting Service</h3></td>
                                        </tr>
                                        <tr>
                                            <td class="boldmatter"><h4>Manav Rachna International University</h4></td>
                                        </tr>
                                        <tr>
                                            <td class="boldmatter"><h4>Surajkund Road</h4></td>
                                        </tr>
                                        <tr>
                                            <td class="boldmatter"><h4>Faridabad</h4></td>
                                        </tr>                                        
                                        <tr>
                                            <td class="boldmatter"><h4>Mobile No.: +91- 9874566123</h4></td>
                                        </tr>
                                        <tr>
                                            <td class="boldmatter"><h4> Email ID.: info@mriu.edu.in</h4></td>
                                        </tr>
                                        <tr><td><hr/></td></tr>
                                    </table>
                                </td>
                                <td width="600">
                                    <iframe width="600" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=manav%20rachna%20international%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                        </table>
                    </div>

                </div>


                <?php
                    include('footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
