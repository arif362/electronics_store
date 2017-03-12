<?php include("config.php");?> 	<!-- MySQL Database connection file included-->
<?php
if(isset($_POST['login_form']))
{
	try{
			if(empty($_POST['username']))
			{
				throw new Exception("User Name Can not be empty.");
			}
			if(empty($_POST['password']))
			{
				throw new Exception("Password Can not be empty.");
			}
			
			
			$password = $_POST['password'];  //user login password convert into md5 mode
			$password = md5($password);
			
			
		
			
		$num=0;
		$statement = $db->prepare("select * from tbl_login where username=? and password=?");
		$statement->execute(array($_POST['username'],$password));		
		$num = $statement->rowCount();
		
		if($num>0)
		{	
			session_start();
			
			$_SESSION['password'] = "password";
			$_SESSION['username'] = $_POST['username'];
			
			header('location: Admin/index.php');
			
		}
		else
		{
			throw new Exception ('User Name , Password or User Type are Invalid');
		
		}
		
		
		}
	catch(Exception $e)
	{
		$error_message=$e->getMessage();
	}
	
	
}
	
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    
    
    
    
        <link rel="stylesheet" href="css/login_style.css">

    
    
    
  </head>

  <body>
  
     <?php
					if(isset($error_message)) {echo $error_message;}
	?>
	
    <div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
	
    <form class="login-form" action="" method="post">
	  <?php
	 if(isset($error_message)) {echo $error_message;}
	  ?>
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
       <input type="submit" name="login_form" value="Login" />
      <p class="message">Not registered? <a href="">Create an account</a></p>
    </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
