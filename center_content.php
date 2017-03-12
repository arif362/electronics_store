<?php include("config.php");?> 	<!-- MySQL Database connection file included-->  

  <div class="center_content">					
   	<div class="center_title_bar">Latest Products</div>
	<!-- Latest Products images display start  -->
							<?php
								$i=0;
								$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_ID ASC");
								$statement->execute();
								$result = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach($result as $row)
								{ 
								$i++;
							?>
								<div class="prod_box" >

								<div class="top_prod_box"></div>
								<div class="center_prod_box">            
								<div class="product_title"><a href="details.php"><?php echo $row['product_model'];?></a></div>
								<div class="product_img"><a href="details.php"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="80px"/></a></div>
								<div class="prod_price"><span class="price"><?php echo $row['Selling_price_BDT'];?> BDT</span></div>                        
								</div>
								<div class="bottom_prod_box"></div>             
								<div class="prod_details_tab">
								<a href="" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
								<a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
								<a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
								<a href="details.php" class="prod_details">details</a>            
								</div>                     
								</div>
							<?php
							}
							?>
 <!-- Latest Products images display end  -->
 
 <div class="center_title_bar">Recommended Products</div>
 <!-- Recommended Products images display start  -->
							<?php
								$i=0;
								$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_ID ASC");
								$statement->execute();
								$result = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach($result as $row)
								{ 
								$i++;
							?>
							
								<div class="prod_box">
								<div class="top_prod_box"></div>
								<div class="center_prod_box">            
								<div class="product_title"><a href="details.php"><?php echo $row['product_model'];?></a></div>
								<div class="product_img"><a href="details.php"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="80px"/></a></div>
								<div class="prod_price"><span class="price"><?php echo $row['Selling_price_BDT'];?> BDT</span></div>                        
								</div>
								<div class="bottom_prod_box"></div>             
								<div class="prod_details_tab">
								<a href="" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
								<a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
								<a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
								<a href="details.php" class="prod_details">details</a>            
								</div>                     
								</div>
							
							<?php
							}
							?>
<!-- Recommended Products images display end  -->
 
 
 
 
    
    
   
   </div><!-- end of center content -->