<?php 

require("header.php");

 ?>

    <div class="container-fluid">
    
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php  

                require("sidebar.php");
            ?>

            <!-- Page Content  -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <!-- <div class="col"> -->
                        <button type="button" id="sidebarCollapse" class="btn btn-custom">
                            <i class="fas fa-align-left"></i>
                            <span>View Profile</span>
                        </button>
                    <!-- </div> -->
                    

                        <div class="col-8 offset-md-2 ">
                            <h2 class="text-custom">EDIT PROFILE</h2>
                        </div>
                    </div>
                </nav>

                <div class="row px-1 mx-auto">
                    <div class="offset-2 col-8 ">
                        <form class="border shadow p-3" enctype="multipart/form-data" action="editProfile.php" method="POST">
                            <h3 class="text-custom"> Profile Details</h3>
                            <hr>
                            <div class="form-row">
                            
                            <?php  if(isset($_GET['status']) &&($_GET['status'] == 'success')){
                                    echo'<div class="alert alert-info alert-dismissible fade show col-12" >';
                                    echo'Profile Updated Successfully ';
                                    echo'</div>';
                                    } else if(isset($_GET['status']) &&($_GET['status'] == 'failed')){
                                    echo'<div class="alert alert-warning alert-dismissible fade show col-12">';
                                    echo'registration failed';
                                    echo'</div>';
                                }     
                            ?>
                                
                                <div class="form-group col-md-6">
                                    <div> <img src='<?php if($details["cust_photo"] != ""){
                                        echo "upload/" .$details["cust_photo"];
                                    }else{
                                        echo"img/avatar.png";
                                    }?>' class='img-fluid' style='height: 100px;'></div>
                                    <input type='file' name='profilePics' > 
                                    
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="fname" class="text-custom"><i class="fas fa-user"></i>  Firstname</label>
                                    <input type="text" class="form-control" id="fname" placeholder="enter firstname" name="fname"  value="<?php echo $details['cust_fname'];?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname" class="text-custom"><i class="fas fa-user"></i>  Lastname</label>
                                    <input type="text" class="form-control" id="lname" placeholder="enter lastname" name="lname"  value="<?php echo $details['cust_lname'];?>" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail" class="text-custom"><i class="fas fa-envelope"></i> Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email"  value="<?php echo $details['cust_email'];?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="reg_id" value="<?php echo $details['cust_id'];?>" >
                                    <label for="phoneNo" class="text-custom"><i class="fas fa-mobile-alt"></i> Phone</label>
                                    <input type="tel" class="form-control" id="phoneNo" placeholder="phone number" name="phoneNo"  value="<?php echo $details['cust_phone'];?>" required>
                                </div>
                            
                            </div>

                            <button type="submit" class="btn btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>

                <div class="row px-1 mx-auto">
                    <div class="offset-2 col-8 ">
                        
                        <form class="border shadow p-3" enctype="multipart/form-data" action="editPassword.php" method="POST">
                            <h3 class="text-custom">Change Password</h3>
                            <hr>
                            <div class="form-row">
                            <?php  if(isset($_GET['pstatus']) &&($_GET['pstatus'] == 'success')){
                                    echo'<div class="alert alert-info alert-dismissible fade show col-12">';
                                    echo'Password Updated Successfully';
                                    echo'</div>';
                                    } else if(isset($_GET['pstatus']) &&($_GET['pstatus'] == 'fail')){
                                    echo'<div class="alert alert-warning alert-dismissible fade show col-12">';
                                    echo'Password Update Failed';
                                    echo'</div>';
                                }     
                            ?>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="reg_id" value="<?php echo $details['cust_id'];?>" >
                                    <label for="oldPass" class="text-custom"><i class="fas fa-key"></i> Old Password</label>
                                    <input type="password" class="form-control" id="oldPass" placeholder="Old Password" name="oldPass" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="newPass" class="text-custom"><i class="fas fa-key"></i> New Password</label>
                                    <input type="password" class="form-control" id="newPass" placeholder=" New Password" name="newPass" required>
                                </div>
                            </div>                          

                            <button type="submit" class="btn btn-custom">Change Password</button>
                        </form>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-12 mt-0">
                        <footer class="d-flex justify-content-center bg-dark pt-4">
                            <p class="text-custom">Designed by Praise Adekunle &copy; Foodie 2019</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay"></div>

    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="script.js"></script>

    <script>
    function add_cart(p_id=""){
        var quantity = $(".quantity"+p_id).val();
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'add',p_id:p_id,quantity:quantity},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }


    add_cart();
    function remove_cart(p_id){
        //alert(p_id);
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'delete',p_id:p_id},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }
    function empty_cart(){
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'empty'},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }



        //function addTocart(thebtn,mealid){
                // alert(mealid);
                //$.ajax({
                  //type: "POST",
                  //url: "addtoCart.php",
                  //data: "mealid="+mealid,
                  //success: function(msg){
                    // alert(msg);
                   // $("#content2").html(msg);
                    // $(thebtn).html("Added");
                    // $(thebtn).attr('disabled','disabled');
                 // }
               // });

       // }
        
    </script>

  

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-shopping-basket"></i>Foodie Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body cart_data">
                    
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</body>

</html>