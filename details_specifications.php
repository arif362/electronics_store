<?php include("config.php");?> 	<!-- MySQL Database connection file included--> 

<div class="center_content">

			<?php
			$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_ID ASC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
			}
			?>
							
   	<div class="center_title_bar"><?php echo $row['product_model'];?></div>
    
    	<div class="prod_box_big">
        	<div class="top_prod_box_big"></div>
            <div class="center_prod_box_big">            
                 
                 <div class="product_img_big">
                 <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0"width="100" /></a>
                 <div class="thumbs">
                 <a href="" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img src="uploads/<?php echo $row['product_image_1'];?>" alt="" title="" border="0" width="30" /></a>
                 <a href="" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img src="uploads/<?php echo $row['product_image_2'];?>" alt="" title="" border="0" width="30" /></a>
                 <a href="" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img src="uploads/<?php echo $row['product_image_3'];?>" alt="" title="" border="0" width="30" /></a>
                 </div>
                 </div>
                     <div class="details_big_box">
                         <div class="product_title_big"><?php echo $row['product_description'];?></div>
                         <div class="specifications">
                            Model Name: <span class="blue"><?php echo $row['product_model'];?></span><br />
                            Brand Name: <span class="blue"><?php echo $row['product_brand'];?></span><br />
                            Origin Country: <span class="blue"><?php echo $row['Origin_country'];?></span><br /> 
                            Release Date:<span class="blue"><?php echo $row['entry_date'];?></span><br />
                         </div>
                         <div class="prod_price_big"><span class="price"><?php echo $row['Selling_price_BDT'];?>BDT</span></div>
                         
                         <a href="" class="addtocart">add to cart</a>
                         <a href="" class="compare">compare</a>
                     </div>                        
            </div>
            <div class="bottom_prod_box_big"></div>                                
        </div>
    
    
 

 
 
 
 <div class="center_title_bar">Similar products</div>
  <!-- Similar products images display start  -->
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
                 <div class="product_img"><a href="details.php"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="100" /></a></div>
                 <div class="prod_price"><span class="price"><?php echo $row['Selling_price_BDT'];?>-BDT</span></div>                        
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
 
   <!-- Similar products images display end  -->
 
 
    
    
   
   </div><!-- end of center content -->