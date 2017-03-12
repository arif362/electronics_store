<?php include("config.php");?> 	<!-- MySQL Database connection file included-->


	<!-- form validation and insertion code for product_category page start-->
<?php    
if(isset($_POST['category_form']))
{
	try {
		
		if(empty($_POST['category_name'])) {
			throw new Exception("Category Name can not be empty.");
		}
		
		$statement = $db->prepare("SELECT * FROM category_list WHERE category_name=?");
		$statement->execute(array($_POST['category_name']));
		$total = $statement->rowCount();
		
		if($total>0) {
			throw new Exception("Category Name already exists.");
		}
		$Entry_Date = date('d-M-Y');
		
		$statement = $db->prepare("INSERT INTO category_list (category_name,Entry_Date) VALUES (?,?)");
		$statement->execute(array($_POST['category_name'],$Entry_Date));
		
		$success_message = "Category name has been inserted successfully.";
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}
?>
<!-- form validation and insertion code for product_category page ended -->


<!-- form validation and update code for product_category page start-->
<?php

if(isset($_POST['form_update']))
{
	
	try {
		
		if(empty($_POST['category_name'])) {
			throw new Exception("Category Name can not be empty.");
		}
		
		$statement = $db->prepare("UPDATE category_list SET category_name=? WHERE category_ID=?");
		$statement->execute(array($_POST['category_name'],$_POST['hdn']));
		
		$success_message = "Category Name has been updated successfully.";
		
	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<!-- form validation and update code for product_category page ended-->


	<?php include('header.php')?>   <!-- Header portion included-->

<!--product add main content portion start -->
    <div id="top-panel">
            <div id="panel">
                <ul>
					<li><a href="product_add.php#adduser" class="manage_page">Add Product</a></li>
                    <li><a href="product_add.php" class="cart">Products</a></li>
            		<li><a href="" class="folder">Product categories</a></li>
                    <li><a href="" class="promotions">Promotions</a></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Product Category;</h3>
					
					<!--Message Display-->
				<?php
				if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
				if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
				?>
				
				
				
				
					
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#">Category Name</a></th>
                                <th width="60px"><a href="#">Action</a></th>
                            </tr>
						</thead>
						
						
						
				<tbody>
				<?php
						$i=0;
						$statement = $db->prepare("SELECT * FROM category_list ORDER BY category_ID ASC");
						$statement->execute();
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $row)
						{
							$i++;
							?>
							
							<!-- Loop execution portion Start  -->
	<tr>
		<td class="a-center" width="40px"><?php echo $i;?></td>
		<td><a href=""><?php echo $row['category_name'];?></a></td>
		
		<td width="60px"><a href="#"><img src="img/icons/cart.png" title="Show Product" width="16" height="16" /></a>
		
							<!-- Category Update code start   -->
		<a class="fancybox" href="#inline<?php echo $i; ?>"><img src="img/icons/brick_edit.png" title="Edit Category" width="16" height="16" /></a>
		<div id="inline<?php echo $i; ?>" style="width:400px;display: none;">
				<h3>Edit Category</h3>
				<p>
					<form action="" method="post">
					<input type="hidden" name="hdn" value="<?php echo $row['category_ID']; ?>">
					<table>
						<tr>
							<td>Category Name</td>
						</tr>
						<tr>
							<td><input type="text" name="category_name" value="<?php echo $row['category_name']; ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" value="UPDATE" name="form_update"></td>
						</tr>
					</table>
					</form>
				</p>
			</div>
			
						<!-- Category Update code end   -->
			
						<!-- Category delete code start   -->
		<a  onclick='return confirmDelete();' href="delete_category.php?id=<?php echo $row['category_ID']; ?>"><img src="img/icons/user_delete.png" title="Delete Category" width="16" height="16" /></a>
						<!-- Category delete code end   -->
		</td>
	</tr>

				</tbody>
								<?php
	}
	?>
	
						<!-- Loop execution portion ended  -->
				
					</table>
                    <div id="pager">
                    	Page <a href="#"><img src="img/icons/arrow_left.gif" width="16" height="16" /></a> 
                    	<input size="1" value="1" type="text" name="page" id="page" /> 
                    	<a href="#"><img src="img/icons/arrow_right.gif" width="16" height="16" /></a>of 42
                    pages | View <select name="view">
                    				<option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                    			</select> 
                    per page | Total <strong>420</strong> records found
                    </div>
                </div>
                <br />
                <div id="box">
                	<h3 id="adduser">Add Category</h3>
                    <form id="form" action="product_category.php" method="post">
                      <fieldset id="personal">
                        <legend>CATEGORY INFORMATION</legend>
                        <label for="category_name">Category name : </label> 
                        <input name="category_name" id="category_name" type="text" tabindex="1" />
                        <br />
                        
                      </fieldset>

					  
                     
					  
                      <div >
                      <input id="button1" type="submit" value="Save" name="category_form"/> 
                     
                      </div>
                    </form>

                </div>
            </div>
<!--product add main content portion ended -->

			
	<?php include('right_sidebar.php')?>		<!-- right_sidebar portion included-->
	<?php include('footer.php')?>				<!-- footer portion included-->