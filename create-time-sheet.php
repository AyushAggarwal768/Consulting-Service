<?php
include './dbconfig.php';
if (!empty($user_id)) {
    //registration form
    if (isset($_POST['btnsubmit'])) {
        $task = $_POST['task'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $type = $_POST['time_type'];
        $billable_hour = $_POST['billable_hour'];
        $work_hour = $_POST['work_hour'];

        $query = "insert into time_sheet(task,description,priority,type,task_date,billable_hour,work_hour,username) values('" . $task . "','" . $description . "','" . $priority . "','" . $type . "',now(),'$billable_hour','$work_hour','$user_name')";
        $res_user = mysqli_query($con, $query);
        $user_id = mysqli_insert_id($con);
        if ($user_id > 0) {
            header("location:create-time-sheet.php?status=success");
        } else {
            $error = "Task has not been submited.";
        }
    }
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Create Time Sheet - Consulting Service</title>
            <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet/form-field.css" rel="stylesheet" type="text/css" />
            <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
            <script type="text/javascript" src="js/crawler.js"></script>
            <script type="text/javascript" src="js/menu.js"></script>            
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
                                                        <h2 class="login_title">Create Time Sheet</h2>                                          
                                                    </td>
                                                </tr>
                                                <tr><td height="15"></td></tr>
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
                                                    <?php
                                                if (!empty($_GET['status']) && $_GET['status'] == "success") {
                                                    ?>
                                                    <tr>
                                                        <td colspan="2" class="message">
                                                            <span class="failed">                                               
                                                                Task have been successfully submitted.
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td class="newuser_bold" width="150">Task</td>
                                                    <td><input type="text" name="task" id="task" class="newuser_input" maxlength="100"/></td>
                                                </tr>                                       
                                                <tr>
                                                    <td class="newuser_bold">Description</td>
                                                    <td><input type="text" name="description" id="description" class="newuser_input"  maxlength="200"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Task Priority.</td>
                                                    <td>
                                                        <select name="priority" id="priority" class="newuser_input" required="">
                                                            <option value="" selected="">----------</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="High">High</option>
                                                            <option value="Urgent">Urgent</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Time Type.</td>
                                                    <td>
                                                        <select name="time_type" id="time_type" class="newuser_input" required="">
                                                            <option value="" selected="">----------</option>
                                                            <option value="Regular Time">Regular Time</option>
                                                            <option value="Double Time">Double Time</option>
                                                            <option value="Holiday">Holiday</option>
                                                            <option value="Overtime">Overtime</option>
                                                            <option value="PTO">PTO</option>
                                                            <option value="Salary">Salary</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Billable Hour.</td>
                                                    <td>
                                                        <select name="billable_hour" id="billable_hour" class="newuser_input">
                                                            <option value="" selected="">----------</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>                                                            
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="newuser_bold">Work Hour</td>
                                                    <td>
                                                        <select name="work_hour" id="work_hour" class="newuser_input" required="">
                                                            <option value="" selected="">----------</option>
                                                            <option value="15 Min">15 Min</option>
                                                            <option value="30 Min">30 Min</option>
                                                            <option value="45 Min">45 Min</option>
                                                            <option value="1 Hour">1 Hour</option>
                                                            <option value="2 Hour">2 Hour</option>
                                                            <option value="3 Hour">3 Hour</option>
                                                            <option value="4 Hour">4 Hour</option>
                                                            <option value="5 Hour">5 Hour</option>
                                                            <option value="6 Hour">6 Hour</option>
                                                            <option value="7 Hour">7 Hour</option>
                                                            <option value="8 Hour">8 Hour</option>
                                                            <option value="9 Hour">9 Hour</option>
                                                            <option value="10 Hour">10 Hour</option>
                                                            <option value="12 Hour">12 Hour</option>
                                                            <option value="16 Hour">16 Hour</option>
                                                            <option value="20 Hour">20 Hour</option>
                                                            <option value="24 Hour">24 Hour</option>
                                                            <option value="30 Hour">30 Hour</option>
                                                            <option value="36 Hour">36 Hour</option>
                                                            <option value="48 Hour">48 Hour</option>
                                                            <option value="72 Hour">72 Hour</option>
                                                        </select>
                                                    </td>
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
