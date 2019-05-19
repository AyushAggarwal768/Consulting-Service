<?php
include './dbconfig.php';
$error = "";
if (!empty($user_id)) {

    if (isset($_GET['reg_id']) && !empty($_GET['reg_id'])) {
        $id = mysqli_real_escape_string($con, $_GET['reg_id']);
        $sql = "DELETE FROM time_sheet WHERE id='" . $id . "'";
        $result = mysqli_query($con, $sql);
        $valueInsert = (int) $result;
        if ($valueInsert > 0) {
            $error = "Task has been deleted.";
        } else {
            $error = "Task has not been deleted.";
        }
    }
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Time Sheet List - Consulting Service</title>
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
                                    <table cellpadding="2" cellspacing="2" width="100%" >
                                        <h1 style="padding: 10px;">Time Sheet List</h1>
                                        <?php
                                        if (!empty($error)) {
                                            echo '<tr><td colspan="6" align="center" style="font-size:14px;">' . $error . '</td></tr>';
                                        }
                                        ?>
                                        <tr style="background: #ccc;font-size: 14px;padding: 5px;height: 30px;font-weight: bold;color: #000;">
                                            <td width="10%" align="center">Employee</td>
                                            <td width="25%" align="center">Task</td>
                                            <td width="20%" align="center">Description</td>
                                            <td width="20%" align="center">Priority</td>
                                            <td width="20%" align="center">Type</td>                                            
                                            <td width="20%" align="center">Billable</td>                                            
                                            <td width="20%" align="center">Hour</td>                                            
                                            <td width="20%" align="center">Date</td>
                                            <td width="10%" align="center">&nbsp;Delete&nbsp;</td>
                                        </tr>
                                        <?php
                                        $sql_query = "";
                                        if ($user_type == "vender" || $user_type == "admin") {
                                            $sql_query = "select * from time_sheet order by id desc";
                                        } else {
                                            $sql_query = "select * from time_sheet where username = '$user_name' order by id desc";
                                        }

                                        $result = mysqli_query($con, $sql_query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr style="background: #f2f2f2;font-size: 14px;padding: 5px;height: 24px;color: #000;">
                                                <td><?php echo $row ['username']; ?></td>
                                                <td><?php echo $row ['task']; ?></td>
                                                <td align="center"><?php echo $row ['description']; ?></td>
                                                <td align="center"><?php echo $row ['priority']; ?></td>
                                                <td align="center"><?php echo $row ['type']; ?></td>
                                                <td align="center"><?php echo $row ['billable_hour']; ?></td>
                                                <td align="center"><?php echo $row ['work_hour']; ?></td>
                                                <td align="center"><?php echo $row ['task_date']; ?></td>
                                                <td align="center"><a href="time-sheet-list.php?reg_id=<?php echo $row ['id']; ?>" class="linka">Delete</a></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
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

