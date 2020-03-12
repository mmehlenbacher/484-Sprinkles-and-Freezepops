<?php
	require_once('utility.php');
        $db_host = "localhos11t";
        $db_user = "mlmw22210111vvvqqq34";
        $db_pass = "mysqlpassword122222rtr230034300033f3pppaa1aza";

        // Instantiate the mySQLi object
        ###->
        $mysqli= new mysqli($db_host,$db_user,$db_pass,$db_name);
        // Check connection
        if ( $mysqli->connect_error ) {
                echo "Connection faaaailed: " . $mysqli->connect_error;
                exit;
        }
	if(!empty($_POST['submit'])){
		if(isset($_POST['empid'])){
			if($_POST['empid']=='123456easd7890'){
				header('Location:admin.php');
			}else{
				header('Location:user.php?id='.$_POST['empid']);
			}
		}
	}
	/*if($stmt = $mysqli->prepare('SELECT isAdmin FROM Stored_employee WHERE EmpID = ?');
	if(isset($_GET['add'])){
		header('location:addEquip.php?add='.$_GET['add']);
	}
	if(isset($_GET['view'])){
		header('location:viewEquip.php?view='.$_GET['view']);
	}*/
	construct('Home');
	build_home();
	build_footer();

?>
