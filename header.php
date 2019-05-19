<div id="header">
    <div class="header_inner">
        <div id="logo">
            <a href="index.php" style="text-decoration: none;padding-top: 15px;padding-left: 25px;">
                <h1 style="color: #fff;">Consulting Service</h1>
            </a>
        </div>
        <div class="shopping-cart">
            <a href="cart.php">
                <?php
                /*if (isset($_COOKIE[$cookie_name])) {
                    $cartArr = json_decode($_COOKIE[$cookie_name]);
                    $count = 0;
                    foreach ($cartArr as $cartd) {
                        $count++;
                    }
                    echo $count . ' item(s) in Shopping Cart';
                } else {
                    echo '0 item(s) in Shopping Cart';
                }*/
                ?>
            </a>
            </div>
        
    </div>

    <div id="menu-base">
        <ul id="menu">          
            <li><a href="index.php" class="drop">Home</a></li>
            <li><a href="aboutus.php" class="drop">About Us</a></li>
            <?php /* <li>
                <a href="#" class="drop">Category</a>
                <div class="dropdown_4columns">
                    <!-- Begin 4 columns container -->
                    <div class="col_1">
                        <ul>
                            <?php
                            $sql_query2 = "SELECT cat_id,cat_name FROM a_category WHERE is_deleted = '0'";
                            $result2 = mysqli_query($con, $sql_query2);
                            while ($row2 = mysqli_fetch_array($result2)) {
                                $cat_id = $row2 ['cat_id'];
                                ?>
                            <li style="width: 155px;"><a href="category.php?category_id=<?php echo $cat_id; ?>"><?php echo $row2 ['cat_name']; ?></a></li>                                
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </li>  */ ?>          
            <li><a href="contactus.php" class="drop">Contact</a></li>
            <?php
            if (empty($user_id)) {
                ?>                
                <li><a href="login.php" class="drop">Sign In</a></li>
                <li><a href="vender_registration.php" class="drop">Vender</a></li>

            <?php } else { ?>                
                <li style="width: auto;float: right;padding-right: 10px;">                    
                    <a href="myprofile.php" class="drop">
                        Welcome,&nbsp;<?php echo $user_name ?>, <span>Login As - <strong><?php echo ucfirst($user_type); ?></strong></span>
                    </a>
                    
                </li>                
            <?php } ?>
        </ul>
    </div>
</div>


