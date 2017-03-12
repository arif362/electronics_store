<?php
include("config.php"); 
if(!isset($_REQUEST['id'])) {
	header("location: product_category.php");
}
else {
	$id = $_REQUEST['id'];
}
?>
<?php


$statement = $db->prepare("DELETE FROM category_list WHERE category_ID=?");
$statement->execute(array($id));

header("location: product_category.php");

?>