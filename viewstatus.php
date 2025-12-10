<?php
error_reporting(0);
session_start();
include("dbconfig.php");

if($_REQUEST['id'])
{
	$id=$_REQUEST['id'];
	$qry="delete from doctor where doctorid='$id'";
	
//$execution=$db->query($qry);
//if($execution)
//{
	echo"<script>alert('deleted successfully')</script>";
//}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->    <title>Hospitel Appointment System</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="admin/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="admin/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="admin/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="admin/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="admin/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="admin/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
      
          
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                
                                 <li class="nav-item">
                                    <a class="nav-link"  href="cusdoctor.php">Book Appointment</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link"href="viewstatus.php">View Status</a>
                                 </li>
                                 
                                  
                                 <li class="nav-item">
                                    <a class="nav-link"  href="login.php" >logout</a>
                               
                                </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
 <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="text-bg">
                 <center><h2 class="h2">View Status</h2></center>
<form method="post">
<?php 


$sql="select * from appointment";
$execute=$db->query($sql);


?>

<?php 
if(mysqli_affected_rows($db)>0)
{?>
<p><table border="1" width="960px" align="center"  style="font-size:18px; color:#936; font-weight:bold">
<tr><th>Appointmentid</th><th>Appointer Name</th><th>Phone No</th><th>Appointment Date</th><th>Time</th><th>Doctor Name</th><th>Hospital Name</th><th>Reason</th><th>previous receipt </th><th>Status</th></tr>
 <?php 
 $s="1";
 while($row = $execute->fetch_assoc())
{

$row['appointmentid	'];?>
<tr><td><?php echo $s;?> </td><td><?php echo $row['appointmenttype'];?></td><td><?php echo $row['phoneno'];?></td><td><?php echo $row['appointdate'];?></td><td><?php echo $row['time'];?></td><td><?php echo $row['doctorid'];?></td><td><?php echo $row['hospital'];?></td><td><?php echo $row['reason'];?></td><td><img src="<?php echo $row['receipt'];?>"></td><td><?php echo $row['status'];?></td></tr>

<?php  
$s++;
}}
else
{
	echo"<script>alert('No project Record Found')</script>";
}
?>
<table></form>
</p>
   </div>
    </div>
     </div>
      </div>
      </section>
      <script src="admin/js/jquery.min.js"></script>
      <script src="admin/js/popper.min.js"></script>
      <script src="admin/js/bootstrap.bundle.min.js"></script>
      <script src="admin/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="admin/js/custom.js"></script>

</body>
</html>