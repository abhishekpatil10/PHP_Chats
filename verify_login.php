<?php session_start();
require "connect.php";

	
$u = $_POST['username'];
$p = $_POST['password'];

//echo "select * from bcf_admin where username='{$u}' and password='{$p}'";
$chkExt = mysqli_query($conn, "select * from tripodslogin where username='{$u}' and password='{$p}'");
if($chkExt && mysqli_num_rows($chkExt)>0){
	//valid	
	// $_SESSION['name'] = "abhi";	
    $_SESSION['username'] = $u;
    // $_SESSION['name'] = "suvarna";	
    // $_SESSION['name'] = "rutuja";	
	header("location: chats.php");
}
else{
	//invalid
	$_SESSION['invUser'] = "yes";			
	header("location: home.php");
    		
}
?>
