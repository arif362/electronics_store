<?php include("config.php");?>  <!-- MySQL Database connection file included-->

<?php
if(!isset($_REQUEST['id']))
{
	header("location: product_add.php");
}
else
{
	$id = $_REQUEST['id'];
}
			$statement = $db->prepare("SELECT * FROM tbl_product WHERE product_ID=?");
			$statement->execute(array($id));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				$p_category_id=$row['category_ID'];
				
			}


?>

<!-- update code start-->
<?php
	if(isset($_POST['product_update_form']))
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
			
		
			
			
			
			//	<!-- for image file update product_full_image start-->
			
			if(empty($_FILES["product_full_image"]["name"]))
			{
					$statement = $db->prepare("UPDATE tbl_product SET
					category_ID=?,
					product_model=?,
					product_description=?,
					product_brand=?,
					Origin_country=?,
					Buying_price_BDT=?,
					Buying_price_USD=?,
					Selling_price_BDT=?,
					Selling_price_USD=?  WHERE product_ID=?");
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
					$id
					));
				
			}
			else
			{
				$up_filename=$_FILES["product_full_image"]["name"];
				$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); 
				$file_ext = substr($up_filename, strripos($up_filename, '.'));
				$f1 = $id . $file_ext;

				if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
				throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");
			
				$statement = $db->prepare("SELECT * FROM tbl_product WHERE product_ID=?");
				$statement->execute(array($id));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{
					//$real_path= "../uploads/".$row['product_full_image'];
					//unlink($real_path);
				}
				
				move_uploaded_file($_FILES["product_full_image"]["tmp_name"],"../uploads/" . $f1);
				
					$statement = $db->prepare("UPDATE tbl_product SET
					category_ID=?,
					product_model=?,
					product_description=?,
					product_brand=?,
					Origin_country=?,
					Buying_price_BDT=?,
					Buying_price_USD=?,
					Selling_price_BDT=?,
					Selling_price_USD=?,
					product_full_image=?,
					WHERE product_ID=?");
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
					$id));
			}

		$success_message = "Product has been updated successfully.";
			
			
		}
		catch(Exception $e)
		{
			$error_message = $e->getMessage();
		}
	}

?>


<!-- update code start-->




<?php include('header.php')?> 		<!-- Header portion included-->

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

				<!--Products information data insert box start-->
                <div id="box">
                	<h3 id="adduser">Edit Product</h3>
							<!--Message Display-->
				<?php
				if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
				if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
				?>
					
					<!--Products information data update form start-->
                    <form id="form" action="product_edit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" >
                      <fieldset id="personal">
                        <legend>PRODUCT INFORMATION</legend>
						
                        <label for="product_model">Model name : </label> 
                        <input name="product_model" value="<?php echo $row['product_model'];?>" id="product_model" type="text" tabindex="1" />
                        <br />
						<label for="product_description">Description : </label> 
                        <input name="product_description" value="<?php echo $row['product_description'];?>" id="firstname" type="text" tabindex="2"/>
			
						
                        <br />
                        <label for="product_brand">Brand name : </label>
                        <input name="product_brand" value="<?php echo $row['product_brand'];?>" id="product_brand" type="text" 
                        tabindex="2" />
                        <br />
                        
                        <label for="Origin_country">Origin Country : </label>
                        <input name="Origin_country" value="<?php echo $row['Origin_country'];?>" id="Origin_country" type="text" 
                        tabindex="2" />
                        <br />
         
                        <br />
                      </fieldset>
                      <fieldset id="address">
                        <legend>PRODUCT PRICE</legend>
                        <label for="Buying_price_BDT">Buying(BDT) : </label> 
                        <input name="Buying_price_BDT" value="<?php echo $row['Buying_price_BDT'];?>" id="Buying_price_BDT" type="text" 
                        tabindex="1"/>
                        <br />
                        <label for="Buying_price_USD">Buying(USD) : </label>
                        <input name="Buying_price_USD" value="<?php echo $row['Buying_price_USD'];?>" id="Buying_price_USD" type="text" 
                        tabindex="2" />
                        <br />
                        <label for="Selling_price_BDT">Selling(BDT) : </label> 
                        <input name="Selling_price_BDT" value="<?php echo $row['Selling_price_BDT'];?>" id="Selling_price_BDT" type="text" 
                        tabindex="1" />
                        <br />
                        <label for="Selling_price_USD">Selling(USD) : </label>
                        <input name="Selling_price_USD" value="<?php echo $row['Selling_price_USD'];?>" id="Selling_price_USD" type="text" 
                        tabindex="2" />
                        <br />
   
                      </fieldset>
					  
					    <fieldset id="address">
                        <legend>PRODUCT IMAGES</legend>
                        <label for="product_full_image">Full Image : </label> 
						
					<tr>
						<td>
							<img src="../uploads/<?php echo $row['product_full_image'];?>" alt="" width="200" height="200">
						</td>
					</tr>
					
         <input name="product_full_image" value="<?php echo $row['product_full_image'];?>" id="product_full_image" type="file"  tabindex="1"/>
						<br />
						
						
						
						<label for="product_image_1">Small Image-1 : </label> 
						
					<tr>
						<td>
							<img src="../uploads/<?php echo $row['product_image_1'];?>" alt="" width="200" height="200">
						</td>
					</tr>
						
                        <input name="product_image_1"  id="product_image_1" type="file" 
                        tabindex="1" />
						<br />
						
						
						
						
						<label for="product_image_2">Small Image-2 : </label> 
					<tr>
						<td>
							<img src="../uploads/<?php echo $row['product_image_2'];?>" alt="" width="200" height="200">
						</td>
					</tr>
						
                        <input name="product_image_2"   id="product_image_2" type="file" 
                        tabindex="1" />
						<br />
						
						
						
						<label for="product_image_3">Small Image-3 : </label> 
						
					<tr>
						<td>
							<img src="../uploads/<?php echo $row['product_image_3'];?>" alt="" width="200" height="200">
						</td>
					</tr>
						
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
								if($row['category_ID']==$p_category_id)
								{
									?>
									<option label="cg1a" value="<?php echo $row['category_ID'];?>" selected><?php echo $row['category_name'];?></option>
								
						  <?php
							}
							else
							{
							?>
								
								<option label="cg1a" value="<?php echo $row['category_ID'];?>"><?php echo $row['category_name'];?></option>
							
							<?php
							}
							}
						  ?>
						  
						  
                        </select>
						
                      </fieldset>
                      <div align="center">
                      <input id="button1" type="submit" value="Update" name="product_update_form" /> 
                      
                      </div>
                    </form>
					
					<!--Products information data insert form ended-->

                </div>
				<!--Products information data insert box ended-->
		</div>

				<?php include('right_sidebar.php')?> 	<!--right_sidebar portion included-->
				<?php include('footer.php')?>        	<!--Footer portion included-->