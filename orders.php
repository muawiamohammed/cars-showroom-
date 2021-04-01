<?php 
session_start();
if(!isset($_SESSION["s_name"]))
{
    header("location: login.php");
}
?>







<!DOCTYPE HTML>
<html>
<head>
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div class="header">	
<div class="wrap"> 
	<div class="header-bot">
		 <div class="logo">
			 <a href="index.html"><img src="images/logo.png" alt="" style="width:450px; height: 160px;"></a>
		 </div>
		 
		 
		 <div class="cart">
			
           <div>
             <h3> مرحبا <?=$_SESSION['s_name'];?> !! </h3>
		 </div>
            
		    <div class="menu-main">
		    
			   <ul class="dc_css3_menu">
					<li class="active"><a href="indexlogin.php"> الرئيسية </a></li>
                    <li><a href="services.php"> العلامات التجارية </a></li>
                     <li><a href="booking.php">حجز</a></li>
                     <li><a href="orders.php"> الطلبات</a></li>
                     <li><a href="logout.php">تسجيل الخروج</a></li>
		     	</ul>
                
			 <div class="clear"></div>
			</div>	
						
		</div>	
		
		
		<div class="clear"></div> 
	   </div>
	  </div>	
</div>
<div class="header-bottom">
	<div class="wrap">
		<div class="page-not-found">
			<div class="text-center">
          <h2>تفاصيل طلبك
          </h2>
        </div>
      
        <div class="container-fluid row">
          
            <div class="col-md-3"></div>
          
      
         
         
         
          <div class="s">
                 
                 
                  <table class="table table-bordered table-responsive table-striped table-hover table-condensed text-center " >
                    <tr>
                        <th class = "text-center">رقم البيع</th>
                        <th class = "text-center"> رقم العميل</th>
                        <th class = "text-center"> موديل السيارة </th>
                        <th class = "text-center"> تاريخ الطلب </th>
                        
                       </tr>
                              <?php
                                    $db=mysqli_connect("localhost","root","12345678","car");
                                    $cname = $_SESSION["s_name"];

                                    // to get the customerid from his name  
                                   $getuserid= mysqli_query($db, "SELECT c_id from customer where name = '".$cname."'");
                                    $numrows =mysqli_num_rows($getuserid);
                                    if($numrows !=0)
                                    {
                                        while($row=mysqli_fetch_assoc($getuserid))
                                        {
                                            $dbuserid=$row['c_id'];
                                        }
                                    }
                      
                                    //to get his orders    
                                    $getorders= mysqli_query($db, "SELECT * from sale2 where customer_id = '".$dbuserid."'");
                                    $numrows3 =mysqli_num_rows($getorders);
                                    if($numrows3 !=0)
                                    {
                                        while($row3=mysqli_fetch_assoc($getorders))
                                        {
                                                        $dbsaleid=$row3['sale_id'];
                                                         $dbcustomerid=$row3['customer_id'];
                                                        $carnumber =$row3['carmodel'];
                                                        $date=$row3['ordertime'];
                                                
                                              // get his car model name
                                                $getusercarname = mysqli_query($db, "SELECT name from model where model = '".$carnumber."'");
                                                $numrows2 =mysqli_num_rows($getusercarname);
                                                if($numrows2 !=0)
                                                {
                                                    while($row2=mysqli_fetch_assoc($getusercarname))
                                                    {
                                                        $dbusercarname=$row2['name'];
                                                    }
                                                }

                                                        echo "<tr>" ;
                                                            echo "<td>$dbsaleid</td>";
                                                           echo "<td>$dbcustomerid</td>";
                                                           echo "<td>$dbusercarname</td>";  
                                                             echo "<td>$date</td>";
                                                            echo" </tr>";
                                        }
                                    }
                      else
                      {
                         $message = "You have no orders in your name yet ! !";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                      }
                                      
                            ?>
                   </table>

          </div>
          
         
          
          
          
          
          
          
            <div class="col-md-3"></div>
        
        </div>   
		</div>
	</div>
</div>








<div class="footer">
	<div class="wrap">
	   <div class="footer-top">				
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid twitts">
					<h3> معرض السيارات </h3>
						<div class="f_menu">
							 <ul>
						          <li> تاجر بيع سيارات</li>
						     	  <li>يرجى قراءة البنود والشروط </li>
						     </ul>
						</div>
				   </div>
				</div>
				
				<div class="col_1_of_5 span_1_of_5">
					<div class="footer-grid twitts">
						<h3>تواصل معانا</h3>
						<ul class="follow_icon">
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon1.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon2.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon3.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon4.png" alt=""></a></li>
							<li><a href="#" style="opacity: 1;"><img src="images/follow_icon5.png" alt=""></a></li>
						</ul>
						<p>+1 111-111-1111</p>
						<span>support@gmail.com</span>
					</div>
				</div>
				<div class="clear"></div>
		</div>
	</div>
</div>		

</body>
</html>






        
        
       
    	
    	
            