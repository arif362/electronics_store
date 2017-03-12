<?php include("config.php");?> 	<!-- MySQL Database connection file included--> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Electronics Store</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>

<div id="main_container">
	<div class="top_bar">
    	<div class="top_search">
        	<div class="search_text"><a href="">Advanced Search</a></div>
            <input type="text" class="search_input" name="search" />
            <input type="image" src="images/search.gif" class="search_bt"/>
        </div>
        
        <div class="languages">
        	<div class="lang_text">Languages:</div>
            <a href="" class="lang"><img src="images/bangladesh.png" alt="" title="" border="0" /></a>
            <a href="" class="lang"><img src="images/de.gif" alt="" title="" border="0" /></a>       
        </div>
    
    </div>
	
	
	<div id="header">
	
	       <?php
			$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_ID ASC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
			}
			?>
        
        <div id="logo">
            <a href="index.php"><img src="images/logo.png" alt="" title="" border="0" width="237" height="140" /></a>
	    </div>
        
        <div class="oferte_content">
        	<div class="top_divider"><img src="images/header_divider.png" alt="" title="" width="1" height="164" /></div>
        	<div class="oferta">
            
           		<div class="oferta_content">
                	<img src="images/laptop.png" width="94" height="92" border="0" class="oferta_img" />
                	
                    <div class="oferta_details">
                            <div class="oferta_title"><?php echo $row['product_model'];?></div>
                            <div class="oferta_text">
								<?php echo $row['product_description'];?>
                            </div>
                            <a href="details.php" class="details">details</a>
                    </div>
                </div>
                <div class="oferta_pagination">
                
                     <span class="current">1</span>
                     <a href="?page=2">2</a>
                     <a href="?page=3">3</a>
                     <a href="?page=3">4</a>
                     <a href="?page=3">5</a>  
                             
                </div>        

            </div>
            <div class="top_divider"><img src="images/header_divider.png" alt="" title="" width="1" height="164" /></div>
        	
        </div> <!-- end of oferte_content-->
        

    </div>
    
   <div id="main_content"> 
   
            <div id="menu_tab">
            <div class="left_menu_corner"></div>
                    <ul class="menu">
                         <li><a href="index.php" class="nav1">  Home </a></li>
                         <li class="divider"></li>
                         <li><a href="" class="nav2">Products</a></li>
                         <li class="divider"></li>
                         <li><a href="" class="nav3">Specials</a></li>
                         <li class="divider"></li>
                         <li><a href="login.php" class="nav4">My account</a></li>
                         <li class="divider"></li>                         
                         <li><a href="" class="nav5">Shipping </a></li>
                         <li class="divider"></li>
                         <li><a href="contact.php" class="nav6">Contact Us</a></li>
                         <li class="divider"></li>
                         <li class="currencies">Currencies
                         <select>
                         <option>BDT</option>
                         <option>Euro</option>
                         <option>US Dollar</option>
                         </select>
                         </li>
                    </ul>

             <div class="right_menu_corner"></div>
            </div><!-- end of menu tab -->
            
    <div class="crumb_navigation">
    Navigation: <span class="current">Home</span>
    
    </div> 