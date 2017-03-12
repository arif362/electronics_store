<?php
include("config.php"); 
if(!isset($_REQUEST['id'])) {
	header("location: product_add.php");
}
else {
	$id = $_REQUEST['id'];
}
?>
<?php


$statement = $db->prepare("DELETE  FROM tbl_product WHERE product_ID=?");
$statement->execute(array($id));

header("location: product_add.php");

?>