<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Panel</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

	<!-- Fancybox jQuery -->
	<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
	<!-- //Fancybox jQuery -->
	

	<!-- delete onclick -->
		<script type='text/javascript'>
	function confirmDelete()
	{
		return confirm("Do you sure want to delete this data?");
	}
	</script>
		<!-- delete onclick end -->
	
	<!-- CKEditor Start -->
	
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	
	<!-- // CKEditor End -->

</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>Admin Panel of Electronix</h2>
    <div id="topmenu">
            	<ul>
                	<li class="current"><a href="index.php">Dashboard</a></li>
                    <li ><a href="">Orders</a></li>
                	<li class=""><a href="users.php">Users</a></li>
                    <li><a href="product_add.php">Manage</a></li>
                    <li><a href="">CMS</a></li>
                    <li><a href="">Setting</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
					
					
					<!--
						<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn">Dropdown</button>
						<div id="myDropdown" class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
						</div>
						</div>
						-->
					
              </ul>
          </div>
      </div>