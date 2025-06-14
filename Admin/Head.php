<?php
include('../Assets/Connection/Connection.php');

session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>

        <!-- <link rel="icon" href="../Assets/Templates/Admin/img/favicon.png" type="image/png"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/css/bootstrap.min.css" />
        <!-- themefy CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/themefy_icon/themify-icons.css" />
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/swiper_slider/css/swiper.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/select2/css/select2.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/niceselect/css/nice-select.css" />
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/owl_carousel/css/owl.carousel.css" />
        <!-- gijgo css -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/gijgo/gijgo.min.css" />
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/tagsinput/tagsinput.css" />
        <!-- datatable CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/datatable/css/buttons.dataTables.min.css" />
        <!-- text editor css -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/text_editor/summernote-bs4.css" />
        <!-- morris css -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/morris/morris.css">
        <!-- metarial icon css -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/vendors/material_icon/material-icons.css" />

        <!-- menu css  -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/css/metisMenu.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../Assets/Templates/Admin/css/style.css" />
        <link rel="stylesheet" href="../Assets/Templates/form.css" />
        <link rel="stylesheet" href="../Assets/Templates/Admin/css/colors/default.css" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">



        <!-- main content part here -->

        <!-- sidebar  -->
        <!-- sidebar part here -->
        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="HomePage.php"><h2 align="center">Welcome<br>Admin<br><?php echo $_SESSION["aname"]?></h2></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a  href="HomePage.php"  aria-expanded="false">
                        <img src="../Assets/Templates/Admin/img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                   
                </li>
                <li class="side_menu_title">
                    <span>Applications</span>
                </li>
                <li class="">
                    <a   class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <img src="../Assets/Templates/Admin/img/menu-icon/2.svg" alt="">
                        <span>Location</span>
                    </a>
                    
                   <ul>
                   <li>
                    
                        <li><a href="District.php">District</a></li>                     
                        <li><a href="Place.php">Place</a></li>
                    </ul>
                </li>
                
                <li>
                        <a   class="has-arrow" href="ViewFeedback.php" >
                            <img src="../Assets/Templates/Admin/img/menu-icon/2.svg" alt="">
                            <span>Feedback</span>
                        </a>	
                   </li>
                <li class="">
                        <a   class="has-arrow" href="ViewComplaint.php" aria-expanded="false">
                            <img src="../Assets/Templates/Admin/img/menu-icon/2.svg" alt="">
                            <span>Complaint</span>
                        </a>	
                   </li>
                   <li class="">
                    <a   class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <img src="../Assets/Templates/Admin/img/menu-icon/2.svg" alt="">
                        <span>Report</span>
                    </a>
                    
                   <ul>
                   <li>
                    
                        <li><a href="Report.php">Report</a></li>
                        
                        <li><a href="ReportList.php">Report list</a></li>
                    </ul>
                </li>
                
                   <li class="">
                        <a   class="has-arrow" href="../Guest/Login.php" aria-expanded="false">
                            <img src="../Assets/Templates/Admin/img/menu-icon/2.svg" alt="">
                            <span>Logout</span>
                        </a>	
                   </li>
            </ul>

        </nav>
        <!-- sidebar part end -->
        <!--/ sidebar  -->