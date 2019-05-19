<div class="leftbacground">
    <div id="cssmenu">
        <ul style="">
            <li><a href="admin_home.php">Dashboard</a></li>
            <li><a href="myprofile.php">My Profile</a></li>
            <?php
            if ($user_type == "admin") {
                ?>            
                <li><a href="add-employee.php">Add Employee</a></li>
                <li><a href="employee-list.php">Employee List</a></li>                
                <li><a href="time-sheet-list.php">Time Sheet</a></li>                
                <li><a href="venderlist.php">Vender List</a></li>                
                <?php
            } else if ($user_type == "vender") {
                ?>
                <li><a href="add-employee.php">Add Employee</a></li>
                <li><a href="employee-list.php">Employee List</a></li>                
                <li><a href="time-sheet-list.php">Time Sheet</a></li>                
                <?php
            } else {
                ?>                
                <li><a href="create-time-sheet.php">Create Time Sheets</a></li>
                <li><a href="time-sheet-list.php">Time Sheets List</a></li>                
                <?php
            }
            ?>
            <li><a href="changepwd.php">Change Password</a></li>  
            <li><a href="Message.php?type=customer">Logout.</a></li>

        </ul>
    </div>
</div>