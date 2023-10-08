<?php
    error_reporting(0);
    include "header.php";
	include "dbconnect.php";


    $ID=$_GET['edit_ID'];


   
    $s="SELECT * FROM post   WHERE id='$ID' ";

   
	$result=$conn->query($s);
    // <div class="w-100 d-flex justify-content-center border">
	// 			<div class="border w-80" >
 
    while($r=$result->fetch_assoc()){
        $username=$r['username'];
        $title=$r['title'];
        $ID=$r['id'];   
        $image=$r['image'];
        $description= $r['description'];
        $date = $r['date'];
    
        
       
      
       ?>
       <center>
       <div class="card mb-3" style="max-width: 900px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= $image ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><h3><b><?= $title ?></b><h3></h5>
				<p class="card-text">
					<?=($description) ?>
					<a href='postDetails.php?edit_ID=<?= $ID ?>' class='card-link'></a>
					</p>
                <p class="card-text">
                    <small class="text-body-secondary">
                        <b> posted on:</b> <?= date('d-M-Y', strtotime($date)) ?>
                        <b> by: <?= " " . $username ?>  </b>
                    </small>
                </p>
            </div>
			<div class=" w-50 d-flex justify-content-around">
		<?php
			if(!empty( $_SESSION['username']) && $_SESSION['username']=== $username){
				  echo	"<a class='btn btn-warning' href='editForm.php?edit_ID=$ID'>Edit</a>";
				  echo	"<a class='btn btn-danger' href='delete.php?del_ID=$ID'>Delete</a>";
	     }	
		?>
			</div>
        </div>
    </div>
</div>
    </center>

  
		<?php 

    }
    // echo $ID;
    $s2 = "SELECT * FROM comments WHERE post_id='$ID' ";
    $result2 = $conn->query($s2);
  
    while($r2=$result2->fetch_assoc()){
        ?>
        <div class="d-flex justify-content-center "> 
            
            <div style="width:80%" class="card ">
                <div class="card-header">
                <?= $r2['username'] ?>
                </div>
                 <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $r2['description'] ?></p>
                      
                    </blockquote>
                  </div>
            </div>



        </div>
        <br>

  
		<?php 



    }

    ?>
    <div class="d-flex justify-content-center border "> 
        <div style="width:80%">  
            <form method="POST" action="postComment.php?edit_ID=<?=$ID?>" >
    
                <div style="width:80%" class="form-group">
                    <label for="exampleFormControlTextarea1"><b>ADD YOUR COMMENT:</b> </label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="ADD COMMENT">

            </form>
       </div>
    </div>
  
	<?php 
   
   


    




?>
