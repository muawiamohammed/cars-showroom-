<?php 
session_start();
if(!isset($_SESSION["admin_name"]))
{
    header("location: adminlogin.php");
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
			
           
            
		    <div class="menu-main">
		    
			   <ul class="dc_css3_menu">
					<li class="active"><a href="admin.php"> الرئيسية </a></li>
					 <li><a href="admincars.php"> السيارات </a></li>
                     <li><a href="adminaddcar.php"> إضافة عرض </a></li>
                     <li><a href="adminorders.php"> الطلبات </a></li>
                     <li><a href="adminlogout.php"> تسجيل الخروج</a></li> 
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
          <h2>السيارات المتاحة حاليا في صالة العرض
          </h2>
        </div>
      
        <div class="container-fluid row">
          
            <div class="col-md-3"></div>
          
      
         
         
         
          <div class="s">
                 
                 
                  <table class="table table-bordered table-responsive table-striped table-hover table-condensed text-center " >
        
                    <tr>
                        <th class = "text-center">رقم موديل السيارة</th>
                        <th class = "text-center">اسم السيارة</th>
                        <th class = "text-center">لا. متوفرة</th>   
                     </tr>
                              <?php
                                 $db=mysqli_connect("localhost","root","12345678","car");
            
                                    //to get his orders     
                                    $getcars= mysqli_query($db, "SELECT * from model");
                                    $numrows3 =mysqli_num_rows($getcars);
                                    if($numrows3 !=0)
                                    {
                                        while($row3=mysqli_fetch_assoc($getcars))
                                        {
                                                        $dbmodelno=$row3['model'];
                                                         $dbmodelname=$row3['name'];
                                                        
                                                    // get his car model name
                                                $getcarnumbers = mysqli_query($db, "SELECT * from car where model = '".$dbmodelno."'");
                                                $numrows2 =mysqli_num_rows($getcarnumbers);

                                                            echo "<tr>" ;
                                                            echo "<td>$dbmodelno</td>";
                                                           echo "<td>$dbmodelname</td>";
                                                           echo "<td> $numrows2</td>";  
                                                            echo" </tr>";
                                        }
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






        
        
       
    	
    	
            