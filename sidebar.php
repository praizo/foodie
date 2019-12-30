
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header mt-3">
                <div class="my-2 mx-auto ">
                    <div class="ml-5">

                        <img src='<?php if($details["cust_photo"] != ""){
                            echo "upload/" .$details["cust_photo"];
                            }else{
                                echo"img/avatar.png";
                            }
            

                            ?>' class='img-fluid' style='height: 100px;'>
                    </div>    
        
                    <h5 class="text-center mt-3 ">
                        <a href="user.php">
                            <?php
                                if (isset($_SESSION['user'])) {
                                    echo " Hello" . " ".ucfirst(strtolower($details['cust_fname'])); 
                                }                                    
                            ?>
                        </a>
                    </h5>
                    <!-- <strong>P A</strong> -->
                </div>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-briefcase"></i>
                    Order
                </a>
                <ul class="collapse list-unstyled" id="orderSubmenu">
                    <li>
                        <a href="userOrder.php">Order Status</a>
                    </li>
                    <li>
                        <a href="userOrder.php">Order History</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href='userProfile.php'>
                    <i class="fas fa-copy"></i>
                    Edit Profile
                </a>
            </li>
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <h5>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo " <a href='logout.php' class='download h2' >Sign Out</a>"; 
                        }else {
                            echo " <a href='' class='download h2' >Sign In</a>"; 

                        }                                  
                    ?>
                </h5>
            </li>
        </ul>

        
    </nav>