<?php
	include "dbconnect.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
		$permitted=array('jpg','jpeg','png','gif','pdf');
		
		$file_title=$_FILES['file_name']['name'];
		$file_size=$_FILES['file_name']['size'];
		$file_temp=$_FILES['file_name']['tmp_name'];
		//echo $file_title. ", ". $file_size. ", ".$file_temp;
		
		//generate unique name
		$div=explode('.',$file_title);
		$file_ext=strtolower(end($div)); // jpg
		$unique_name=substr(md5(time()),0,10).".".$file_ext;
		$final_name="uploads/".$unique_name;
		
		//echo $final_name;
		//file verification
		if(empty($file_title)){
			echo "No file choosen, Please select a file.";
		}
		elseif($file_size>300000){
			echo "Image size should be less than 300KB.";
		}
		elseif(in_array($file_ext,$permitted)==false){
			echo "You can upload only: ".implode(',',$permitted);
		}
		else{		
			move_uploaded_file($file_temp,$final_name);
			$sql = "INSERT INTO file_holder(file_address) 
			VALUES ('$final_name')";
			
			if($conn->query($sql)){
				echo "Image Upload Success";
			}	
			else{
				echo "Upload Failed";
			}
		}
		
		
	}
?>