<?php
	include "dbconnect.php";
	$sql = "SELECT image FROM product ";
	//order by id desc
	$image=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>

<center>	
	<h1>Show the uploaded image</h1>
	<?php if($image)
	{
		while($result=$image->fetch_assoc()){
	?>
	<img src="<?php echo $result['file_address']?>" height="100px" width="100px">
	<?php }}?>
</center>

</body>
</html>