 <?php include("config.php");?> 	<!-- MySQL Database connection file included--> 
 
 
 <div class="right_content">
			<?php
			$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_ID ASC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
			}
			?>
 
   		<div class="shopping_cart">
        	<div class="cart_title">Shopping cart</div>
            
            <div class="cart_details">
            3 items <br />
            <span class="border_cart"></span>
            Total: <span class="price">350$</span>
            </div>
            
            <div class="cart_icon"><a href="#" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></a></div>
        
        </div>
   
   
     <div class="title_box">What’s new</div>  
     <div class="border_box">
         <div class="product_title"><a href="details.php"><?php echo $row['product_model'];?></a></div>
         <div class="product_img"><a href="details.php"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="100" /></a></div>
         <div class="prod_price"> <span class="price"><?php echo $row['Selling_price_BDT'];?>-BDT</span></div>
     </div>  
     
     
     
    <div class="title_box">Manufacturers</div>
    
        <ul class="left_menu">
		 <?php 
		$i=0;
		$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_brand ASC");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
		$i++;
		?>
        <li class="odd"><a href="index.php"><?php echo $row['product_brand'];?></a></li>
		
		<?php
		}
		?>
        </ul>      
     
     <div class="banner_adds">
     
     <a href=""><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="100" /></a>
     </div>        
     
   </div><!-- end of right content -->   
   
            
   </div><!-- end of main content -->