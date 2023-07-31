<?php include '../classes/Category.php'?>
<?php
   $cat = new Category();
   if ($_SERVER['REQUEST_METHOD']=='POST') {
      $catName=$_POST['categories'];
      $insertCat=$cat->catInsert($catName);
   }
   
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer</title> 

   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

   
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    
		<script src="js/jquery-3.6.1.min.js"></script>
		<script src="js/customer.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>
            .custom-button-class {
                background-color: #FF0000; /* Set your desired button color */
                color:black; /* Set your desired text color */
                
                 }
 
                 .swal-button:focus,
                 .swal-button:hover {
                  box-shadow: none !important;
                 outline: none !important;
 }
             
         </style>





</head>

<body id="page-top">

  
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3 text-light-900"> Admin Panel </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 ">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
                <a class="nav-link text-light-900" href="index.html">
                    <i class="fa fa-home text-light-900"></i>
                    <span >Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-light-900">
                Manage
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed text-light-900" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-user text-light-900" ></i>
                    <span>Customer</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-light-900">Manage Customer:</h6>
                        <a class="collapse-item" href="customerInsert.html">Add</a>
                        <a class="collapse-item" href="customerView.html">View</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed text-light-900" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-car text-light-900"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseUtilities" class="collapse text-light-900" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-light-900">Manage Admin:</h6>
                        <a class="collapse-item" href="vehicleInsert.html">Add</a>
                        <a class="collapse-item" href="VehicleView.html">View</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed text-light-900" href="#" data-toggle="collapse" data-target="#collapseTwo2"
                    aria-expanded="true" aria-controls="collapseTwo2">
                    <i class="fa fa-address-card text-light-900"></i>
                    <span>Product</span>
                </a>
                <div id="collapseTwo2" class="collapse text-light-900" aria-labelledby="headingTwo2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded text-light-900">
                        <h6 class="collapse-header text-light-900">Manage Product:</h6>
                     
                        <a class="collapse-item" href="BookingInsert.html">Add</a>
                        <a class="collapse-item" href="BookingView.html">View</a>
                  
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link collapsed text-light-900" href="#" data-toggle="collapse" data-target="#collapseTwo3"
                    aria-expanded="true" aria-controls="collapseTwo3">
                    <i class="fa fa-wrench text-light-900"></i>
                    <span>Damage</span>
                </a>
                <div id="collapseTwo3" class="collapse text-light-900" aria-labelledby="headingTwo2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-light-900">Manage Damage:</h6>
                        <a class="collapse-item" href="damageInsert.html">Add</a>
                        <a class="collapse-item" href="DamageView.html">View</a>
                    </div>
                </div>
            </li> -->



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-light-900">
               Genarate Reports
            </div>

            
            <li class="nav-item text-light-900">
                <a class="nav-link text-light-900" href="TransactionViewReport.html">
                    <i class="fa fa-file text-light-900"></i>
                    <span>Income Report</span></a>
            </li>

            <li class="nav-item text-light-900">
                <a class="nav-link text-light-900" href="DamageViewReport.html">
                    <i class="fa fa-file text-light-900"></i>
                    <span>Damage Report</span></a>
            </li>



           
           
    

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block ">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline text-light-900">
                <button class="rounded-circle border-0 " id="sidebarToggle"></button>
            </div>


        </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

              

                <!-- Topbar Navbar-->
                <ul class="navbar-nav ml-auto">

                   

                    <!-- Nav Item - User Information -->
                    <!-- <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="message.html">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="message">Message</span>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </a>
                    </li> -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <script>
                                $(document).ready(function() {
                                        // Read the query parameters from the URL
                                        var params = new URLSearchParams(window.location.search);
                                        var uname = params.get("id");

                                  
                                     

                                        // Set the values of the elements on the page
                                         $('#fname').text(uname);
                                        
                                       
                                    });

                                
                            </script>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="fname"></span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                           
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block" style="padding-top:100px;">
                                    <img src="" width="80%">
                                </div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Create a Category!</h1>
                                            <div class="cat-error"><?php 
                                                if (isset($insertCat)) {
                                                   echo $insertCat;
                                                }
                                          ?></div>
                                              
                                        </div>
                                        <form class="user" method="post">
                                           
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="cat" name="categories"
                                                    placeholder="Category">
                                            </div>

                                         
                                            <button type="submit" name="add" class="btn btn-success btn-block">Insert</button>
                                      
                                                
                                            
                                    
                        

                                            
                                            <!-- <button type="button" class="submit btn btn-primary btn-user btn-block" onclick="saveCustomer()">Submit</button>  -->
                                          
                                          
                                        </form >


                                    
                                     
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            
            
            

               

            </div>
            <!-- End of Main Content -->



       

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>

          

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Southern Lanka Rent & Car</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

 

</body>

</html>