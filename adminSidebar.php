
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <div class="my-2 mx-auto ">
                <div class="ml-5">

                    <img src='<?php if($details["staff_photo"] != ""){
                        echo "upload/" .$details["staff_photo"];
                        }else{
                            echo"img/avatar.png";
                        }
        

                        ?>' class='img-fluid rounded-circle' style='height: 100px;'>
                </div>    
    
                <h5 class="text-center mt-3 ">
                    <a href="adminPage.php">
                        <?php
                            if (isset($_SESSION['staff'])) {
                                echo " Hello" . " ".ucfirst(strtolower($details['staff_fname'])); 
                            }                                    
                        ?>
                    </a>
                </h5>
            </div>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href='adminPage.php'>
                    <i class="fas fa-copy"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Menu
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="createMeal.php">Create Menu</a>
                    </li>
                    <li>
                        <a href="displayMeal.php">Edit Menu</a>
                    </li>
                    <li>
                        <a href="deleteMeal.php">Delete Menu</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-briefcase"></i>
                    View Order
                </a>
                <ul class="collapse list-unstyled" id="orderSubmenu">
                    <li>
                        <a href="adminOrder.php">Order Status</a>
                    </li>
                    <li>
                        <a href="adminOrder.php">Order History</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#orderSubstaff" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-briefcase"></i>
                    Staff
                </a>
                <ul class="collapse list-unstyled" id="orderSubstaff">
                    <li>
                        <a href="#">Create Staff</a>
                    </li>
                    <li>
                        <a href="#">Edit Staff</a>
                    </li>
                    <li>
                        <a href="#">Delete Staff</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href='#'>
                    <i class="fas fa-copy"></i>
                    Edit Profile
                </a>
            </li>
            
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <h5>
                        <?php
                        if (isset($_SESSION['staff'])) {
                            echo " <a href='adminLogout.php' class='download h2' >Sign Out</a>"; 
                        }else {
                            echo " <a href='' class='download h2' >Sign In</a>"; 

                        }                                  
                    ?>

                    

                </h5>
            </li>
        </ul>

        
    </nav>