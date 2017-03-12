<?php include("config.php");?>  <!-- MySQL Database connection file included-->

<!-- form validation php code for product insert page start -->

<?php
	if(isset($_POST['product_add_form']))
	{
		try
		{
			if(empty($_POST['category_ID']))
			{
				throw new Exception("Product Category name can not be empty.");
			}
			if(empty($_POST['product_model']))
			{
				throw new Exception("Product Model Name can not be empty.");
			}
			if(empty($_POST['product_description']))
			{
				throw new Exception("Product description can not be empty.");
			}
			if(empty($_POST['product_brand']))
			{
				throw new Exception("Product Brand Name can not be empty.");
			}
			if(empty($_POST['Origin_country']))
			{
				throw new Exception("Product Origin Country Name can not be empty.");
			}
			if(empty($_POST['Buying_price_BDT']))
			{
				throw new Exception("Product Buying price as BDT can not be empty.");
			}
			if(empty($_POST['Buying_price_USD']))
			{
				throw new Exception("Product Buying price as USD can not be empty.");
			}
			if(empty($_POST['Selling_price_BDT']))
			{
				throw new Exception("Product Selling price as BDT can not be empty.");
			}
			if(empty($_POST['Selling_price_USD']))
			{
				throw new Exception("Product Selling price as USD can not be empty.");
			}
			
		//	<!-- for image file upload product_full_image start-->
					$statement = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_product'");
					$statement->execute();
					$result = $statement->fetchAll();
					foreach($result as $row)
					$new_id = $row[10];
			
					$up_filename=$_FILES["product_full_image"]["name"];
					$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
					$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
					$f1 = $new_id . $file_ext;

					if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
					throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");

					move_uploaded_file($_FILES["product_full_image"]["tmp_name"],"../uploads/" . $f1);
					
		//	<!-- for image file upload product_image_1 start-->
					
					$up_filename=$_FILES["product_image_1"]["name"];
					$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
					$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
					$f2 = $new_id . $file_ext;

					if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
					throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");

					move_uploaded_file($_FILES["product_image_1"]["tmp_name"],"../uploads/" . $f2);
					
			//	<!-- for image file upload product_image_2 start-->
					
					$up_filename=$_FILES["product_image_2"]["name"];
					$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
					$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
					$f3 = $new_id . $file_ext;

					if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
					throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");

					move_uploaded_file($_FILES["product_image_2"]["tmp_name"],"../uploads/" . $f3);
					
		//	<!-- for image file upload product_image_3 start-->
					
					$up_filename=$_FILES["product_image_3"]["name"];
					$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
					$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
					$f4 = $new_id . $file_ext;

					if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
					throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");

					move_uploaded_file($_FILES["product_image_3"]["tmp_name"],"../uploads/" . $f4);
			
			
		//	<!--  image file upload  ended-->
		
				
			
		$entry_date = date('d-M-Y');
		$post_timestamp = strtotime(date('d-m-y'));
	
			
			
		$statement = $db->prepare("INSERT INTO tbl_product 
		(
		category_ID,
		product_model,
		product_description,
		product_brand,
		Origin_country,
		Buying_price_BDT,
		Buying_price_USD,
		Selling_price_BDT,
		Selling_price_USD,
		product_full_image,
		product_image_1,
		product_image_2,
		product_image_3,
		entry_date,
		post_timestamp
		) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array
		(
		$_POST['category_ID'],
		$_POST['product_model'],
		$_POST['product_description'],
		$_POST['product_brand'],
		$_POST['Origin_country'],
		$_POST['Buying_price_BDT'],
		$_POST['Buying_price_USD'],
		$_POST['Selling_price_BDT'],
		$_POST['Selling_price_USD'],
		$f1,
		$f2,
		$f3,
		$f4,
		$entry_date,
		$post_timestamp
		));
		
		$success_message = "Product has been inserted successfully.";
			
			
		}
		catch(Exception $e)
		{
			$error_message = $e->getMessage();
		}
	}

?>

<!-- form validation php code for product_add page ended -->


<!-- Product delete php code start -->
<?php
if(isset($_REQUEST['id'])) 
{
	$id = $_REQUEST['id'];
	
			$statement = $db->prepare("SELECT * FROM tbl_product where product_ID=?");
			$statement->execute(array($id));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{

			}
	
	$statement = $db->prepare("DELETE FROM tbl_product WHERE product_ID=?");
	$statement->execute(array($id));
	
	$success_message = "Product has been deleted successfully.";
	
}
?>
<!-- Product delete php code end -->

<?php include('header.php')?> 		<!-- Header portion included-->

<!--product add main content portion start -->

      <div id="top-panel">
            <div id="panel">
                <ul>
					<li><a href="product_add.php#adduser" class="manage_page">Add Product</a></li>
                    <li><a href="product_add.php" class="cart">Products</a></li>
            		<li><a href="product_category.php" class="folder">Product categories</a></li>
                    <li><a href="addvertisement.php" class="promotions">Advertisement</a></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>List of All Products</h3>
					
					<!--Message Display-->
				<?php
				if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
				if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
				?>
				
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="">Category</a></th>
                                <th><a href="">Model</a></th>
                                <th width="70px"><a href="">Brand</a></th>
                                <th width="110px"><a href="">Buying Price(BDT)</a></th>
                                <th width="110px"><a href="">Selling Price(BDT)</a></th>
                                <th width="60px"><a href="">Action</a></th>
                            </tr>
						</thead>
						
						<!--List of product select code start-->
						
						<?php 
						$i=0;
						$statement = $db->prepare("SELECT * FROM tbl_product ORDER BY product_model ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row)
							{
								$i++;
						?>
						<tbody>
						
							<tr>
                            	<td class="a-center"><?php echo $i;?></td>
                            	<td><a href=""><?php echo $row['category_ID'];?></a></td>
                                <td><?php echo $row['product_model'];?></td>
                                <td><?php echo $row['product_brand'];?></td>
                                <td><?php echo $row['Buying_price_BDT'];?></td>
                                <td><?php echo $row['Selling_price_BDT'];?></td>
								
                                <td>
								<a class="fancybox" href="#inline<?php echo $i; ?>"><img src="img/icons/cart.png" title="Show profile" width="16" height="16" /></a>
		<div id="inline<?php echo $i; ?>" style="width:700px;display: none;">
								
								
								
								<!-- Product show start-->
								
				<h3 style="border-bottom:2px solid #808080;margin-bottom:10px;">Details of Product</h3>
				<p>
					<form action="product_add.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td><b>Model Name</b></td>
						</tr>
						<tr>
							<td><?php echo $row['product_model']; ?></td>
						</tr>
						<tr>
							<td><b>Description</b></td>
						</tr>
						<tr>
							<td><?php echo $row['product_description']; ?></td>
						</tr>
						<tr>
							<td><b>Brand Name</b></td>
						</tr>
						<tr>
							<td><?php echo $row['product_brand']; ?></td>
						</tr>
						<tr>
							<td><b>Origin Country</b></td>
						</tr>
						<tr>
							<td><?php echo $row['Origin_country']; ?></td>
						</tr>
						<tr>
							<td><b>Brand Name</b></td>
						</tr>
						<tr>
							<td><?php echo $row['product_brand']; ?></td>
						</tr>
						<tr>
							<td><b>Buying Price(BDT)</b></td>
						</tr>
						<tr>
							<td><?php echo $row['Buying_price_BDT']; ?></td>
						</tr>
						<tr>
							<td><b>Buying Price(USD)</b></td>
						</tr>
						<tr>
							<td><?php echo $row['Buying_price_USD']; ?></td>
						</tr>
						<tr>
							<td><b>Selling Price(BDT)</b></td>
						</tr>
						<tr>
							<td><?php echo $row['Selling_price_BDT']; ?></td>
						</tr>
						<tr>
							<td><b>Selling Price(USD)</b></td>
						</tr>
						<tr>
							<td><?php echo $row['Selling_price_USD']; ?></td>
						</tr>
						<tr>
							<td><b>Full Product Image</b></td>
						</tr>
						<tr>
							<td><img src="../uploads/<?php echo $row['product_full_image']; ?>" alt=""></td>
						</tr>
						<tr>
							<td><b>Small Product Image_1</b></td>
						</tr>
						<tr>
							<td><img src="../uploads/<?php echo $row['product_image_1']; ?>" alt=""></td>
						</tr>
						<tr>
							<td><b>Small Product Image_2</b></td>
						</tr>
						<tr>
							<td><img src="../uploads/<?php echo $row['product_image_2']; ?>" alt=""></td>
						</tr>
						<tr>
							<td><b>Small Product Image_3</b></td>
						</tr>
						<tr>
							<td><img src="../uploads/<?php echo $row['product_image_3']; ?>" alt=""></td>
						</tr>
						<tr>
							<td><b>Category</b></td>
						</tr>
						<tr>
							<td>
								<?php
								$statement1 = $db->prepare("SELECT * FROM category_list WHERE category_ID=?");
								$statement1->execute(array($row['category_ID']));
								$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
								foreach($result1 as $row1)
								{
									echo $row1['category_name'];
								}
								?>
							</td>
						</tr>	
						
					</table>
					</form>
				</p>
								
								
			</div>
		<!-- Product show end-->
								
	
								
<a href="product_edit.php?id=<?php echo $row['product_ID'];?>"><img src="img/icons/brick_edit.png" title="Edit Product" width="16" height="16" /></a>
         
			
			
			     <!-- Product delete code start   -->
				 
<a onclick='return confirmDelete();' href="product_add.php?id=<?php echo $row['product_ID'];?>"><img src="img/icons/user_delete.png" title="Delete product" width="16" height="16" /></a>
				
				<!-- Product delete code ended   -->
								</td>
								
			<!--List of product select code end-->
                            </tr>
							
						</tbody>
						
						<?php
							}
							?>
							
						<!-- list of product show end-->	
							
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
				
				<!--Products information data insert box start-->
                <div id="box">
                	<h3 id="adduser">Add new Product</h3>
					
					<!--Products information data insert form start-->
                    <form id="form" action="product_add.php" method="post" enctype="multipart/form-data" >
                      <fieldset id="personal">
                        <legend>PRODUCT INFORMATION</legend>
						
                        <label for="product_model">Model name : </label> 
                        <input name="product_model" id="product_model" type="text" tabindex="1" />
                        <br />
						<label for="product_description">Description : </label> 
                        <input name="product_description" id="firstname" type="text" tabindex="2"/>
			
						
                        <br />
                        <label for="product_brand">Brand name : </label>
                        <input name="product_brand" id="product_brand" type="text" 
                        tabindex="2" />
                        <br />
                        
                        <label for="Origin_country">Origin Country : </label>
                        <input name="Origin_country" id="Origin_country" type="text" 
                        tabindex="2" />
                        <br />
         
                        <br />
                      </fieldset>
                      <fieldset id="address">
                        <legend>PRODUCT PRICE</legend>
                        <label for="Buying_price_BDT">Buying(BDT) : </label> 
                        <input name="Buying_price_BDT" id="Buying_price_BDT" type="text" 
                        tabindex="1" />
                        <br />
                        <label for="Buying_price_USD">Buying(USD) : </label>
                        <input name="Buying_price_USD" id="Buying_price_USD" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="Selling_price_BDT">Selling(BDT) : </label> 
                        <input name="Selling_price_BDT" id="Selling_price_BDT" type="text" 
                        tabindex="1" />
                        <br />
                        <label for="Selling_price_USD">Selling(USD) : </label>
                        <input name="Selling_price_USD" id="Selling_price_USD" type="text" 
                        tabindex="2" />
                        <br />
   
                      </fieldset>
					  
					    <fieldset id="address">
                        <legend>PRODUCT IMAGES</legend>
                        <label for="product_full_image">Full Image : </label> 
                        <input name="product_full_image" id="product_full_image" type="file" 
                        tabindex="1" />
						<br />
						
						<label for="product_image_1">Small Image-1 : </label> 
                        <input name="product_image_1" id="product_image_1" type="file" 
                        tabindex="1" />
						<br />
						
						<label for="product_image_2">Small Image-2 : </label> 
                        <input name="product_image_2" id="product_image_2" type="file" 
                        tabindex="1" />
						<br />
						
						<label for="product_image_3">Small Image-3 : </label> 
                        <input name="product_image_3" id="product_image_3" type="file" 
                        tabindex="1" />
                      
   
                      </fieldset>
					  
					  
                <fieldset id="opt">
                        <legend>CATEGORY OPTIONS</legend>
                        <label for="choice">Category : </label>
                        <select name="category_ID">
                          <option selected="selected" label="none" value="">
                          Select a Category
                          </option>
						  
							<?php
							$statement = $db->prepare("SELECT * FROM category_list ORDER BY category_name ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row)
							{
							?>
							
                            <option label="cg1a" value="<?php echo $row['category_ID'];?>"><?php echo $row['category_name'];?></option>
                          
						  <?php
							}
						  ?>
                        </select>
						
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Save" name="product_add_form" /> 
                      <input id="button2" type="reset" />
                      </div>
                    </form>
					
					<!--Products information data insert form ended-->

                </div>
				<!--Products information data insert box ended-->
				
            </div>
			
			<!--product add portion end -->


				<?php include('right_sidebar.php')?> 	<!--right_sidebar portion included-->
				<?php include('footer.php')?>        	<!--Footer portion included-->