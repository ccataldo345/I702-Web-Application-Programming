<!DOCTYPE html>
<html>
<head>

<?php include("class_lib.php"); ?>
<?php include("employee.php"); ?>

	<title>OOP in PHP</title>

</head>
<body>

<?php
	
	$roman = new Person("+372.555.555");
	$ilaria = new Employee("John Doe");

	$roman->set_name("Victor Moses");

	echo "The name is ". $roman->get_name();
	echo "<br>";
	echo "Employee Class Name: ". $ilaria->get_name();
?>

</body>
</html>