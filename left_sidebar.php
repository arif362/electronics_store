<?php include("config.php");?> 	<!-- MySQL Database connection file included-->

	<div class="left_content">
    <div class="title_box">Categories</div>
    
        <ul class="left_menu">
       <?php 
		$i=0;
		$statement = $db->prepare("SELECT * FROM category_list ORDER BY category_name ASC");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
		$i++;
		?>
		
        <li class="odd"><a href="index.php"><?php echo $row['category_name'];?></a></li>
       
		
		<?php
		}
		?>
        </ul> 
        
        
     <div class="title_box">Special Products</div>  
     <div class="border_box">
	 
							<?php
							$statement = $db->prepare("SELECT * FROM tbl_product ");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row)
							{
							}
							?>
	 
         <div class="product_title"><a href="details.php"><?php echo $row['product_model'];?></a></div>
         <div class="product_img"><a href="details.php"><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="170px" /></a></div>
         <div class="prod_price"><span class="price"><?php echo $row['Selling_price_BDT'];?> BDT</span></div>
     </div>  
     
     
     <div class="title_box">Newsletter</div>  
     <div class="border_box">
		<input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="" class="join">join</a>
     </div>  
     
     <div class="banner_adds">
     
     <a href=""><img src="uploads/<?php echo $row['product_full_image'];?>" alt="" title="" border="0" width="170px" /></a>
     </div>    
        
    
   </div><!-- end of left content -->