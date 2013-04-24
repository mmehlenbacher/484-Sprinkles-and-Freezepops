<?php
    $db_host = "localhost";
    $db_user = "mlm1034";
    $db_pass = "mysqlpassword";
    $db_name = "mlm1034";
                
    // Instantiate the mySQLi object
    ###->
    $mysqli= new mysqli($db_host,$db_user,$db_pass,$db_name);
    // Check connection
    if ( $mysqli->connect_error ) {
        echo "Connection failed: " . $mysqli->connect_error;
        exit;
    }
            
    function construct($title){
        echo "<!DOCTYPE html>
	
	<html>
	<head>
	    <title>$title</title>
	    <link rel='stylesheet' href='reset.css'/>
	    <link rel='stylesheet' href='main.css'/>
	    <script type='text/javascript' src='main.js'></script>
	    <link href='http://fonts.googleapis.com/css?family=Days+One' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		<div id='wrap'>
			<h1><a href='index.php'>Sprinkles and Freezepops Co. Equipment Tracker</a></h1>
			<div id='inner'>";
    }
    function build_home(){
        echo "<form name='validate' method='POST' action='index.php'>
		Employee ID: <input name='empid' type='text' placeholder='09876554321'>
		<input type='submit' name='submit'/*onclick='clearDiv();addViewEquip()*/' value='enter'/></form>";
    }
    function build_user($userID){
        if(!empty($_POST['submit'])){
            if(isset($_POST['adminoption'])){
                admin_selection($_POST['adminoption']);
            }
            
        }
        echo "<form action='user.php' method='POST' name='userform'>
                <select name='useroption'><option value='add'>Add Equipment</option><option value='view'>View My Equipment</option>
                <input type='submit' name='submit' value='submit'/></select></form>";
    }
    function build_admin(){
        if(!empty($_POST['submit'])){
            if(isset($_POST['adminoption'])){
                admin_selection($_POST['adminoption']);
            }
            
        }
        echo "<form action='admin.php' method='POST' name='adminform'>
                <select name='adminoption'><option value='add'>Add Equipment</option><option value='view'>View My Equipment</option><option value='approve'>Approve Equipment</option><option value='viewall'>View All Stored Tables</option>
                <input type='submit' name='submit' value='submit'/></select></form>";
    }
    function admin_selection($choice){
        global $mysqli;
        if($choice=='add'){
            echo 'add stuff';
        }elseif($choice=='view'){
            $query = "SELECT * FROM Office_Hardware WHERE EmpID = '1234567890'";            
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "</table><h2>Office Hardware</h2><table border='1'><tr><th>Employee ID</th><th>Item Type</th><th>Serial #</th><th>Manufacturer</th><th>Memory</th></tr>";
                    while($row= $result->fetch_assoc()){
                        echo "<tr><td>".$row['EmpID']."</td><td>".$row['Item_Type']."</td><td>".$row['Serial_Num']."</td><td>".$row['Manufacturer']."</td><td>".$row['MemoryGB']."</td></tr>";
                    }
            }
            $query = "SELECT * FROM Office_Software WHERE EmpID = '1234567890'";
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "</table><h2>Office Software</h2><table border='1'><tr><th>Employee ID</th><th>Software Name</th><th>Development</th><th>Engineering</th><th>Financial</th><th>Design</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['Software_Name']."</td><td>".$row['Development_Software']."</td><td>".$row['Engineering_Software']."</td><td>".$row['Financial_Software']."</td><td>".$row['Design_Software']."</td></tr>";
                }
            }
            if($result->num_rows > 0){
                $query = "SELECT * FROM Personal_Items WHERE EmpID='1234567890'";
                $result = $mysqli->query($query);
                echo "</table><h2>Personal Items</h2><table border='1'><tr><th>Employee ID</th><th>Item Type</th><th>Item Description</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['Item_Type']."</td><td>".$row['Item_Description']."</td></tr>";
                }
                echo "</table>";
            }
            
        }elseif($choice=='approve'){
            echo 'approve stuff';
        }
        elseif($choice=='viewall'){
            //$query = "SELECT DISTINCT * FROM ((Office_Hardware JOIN Office_Software using (EmpID)) JOIN Personal_Items using (EmpID))";
            
            $query = "SELECT * FROM Stored_Employee";            
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "<h2>Stored Employees</h2><table border='1'><tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Extension</th><th>Email</th><th>Admin</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td><td>".$row['Extension']."</td><td>".$row['Email']."</td><td>".$row['Is_Admin']."</td></tr>";
                }
            }
            
            $query = "SELECT * FROM Office_Hardware";            
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "</table><h2>Office Hardware</h2><table border='1'><tr><th>Employee ID</th><th>Item Type</th><th>Serial #</th><th>Manufacturer</th><th>Memory</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['Item_Type']."</td><td>".$row['Serial_Num']."</td><td>".$row['Manufacturer']."</td><td>".$row['MemoryGB']."</td></tr>";
                }
            }
            $query = "SELECT * FROM Office_Software";
            $result = $mysqli->query($query);
            if($result->num_rows > 0){
                echo "</table><h2>Office Software</h2><table border='1'><tr><th>Employee ID</th><th>Software Name</th><th>Development</th><th>Engineering</th><th>Financial</th><th>Design</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['Software_Name']."</td><td>".$row['Development_Software']."</td><td>".$row['Engineering_Software']."</td><td>".$row['Financial_Software']."</td><td>".$row['Design_Software']."</td></tr>";
                }
            }
            if($result->num_rows > 0){
                $query = "SELECT * FROM Personal_Items";
                $result = $mysqli->query($query);
                echo "</table><h2>Personal Items</h2><table border='1'><tr><th>Employee ID</th><th>Item Type</th><th>Item Description</th></tr>";
                while($row= $result->fetch_assoc()){
                    echo "<tr><td>".$row['EmpID']."</td><td>".$row['Item_Type']."</td><td>".$row['Item_Description']."</td></tr>";
                }
                echo "</table>";
            }
        }
    }
    function build_footer(){
        echo "</div>
		</div>
            </body>
            </html>";
    }
?>