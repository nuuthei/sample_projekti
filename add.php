<?php

// For debugging uploads
//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";

include('config/db_connect.php');


$errors = array("image" =>'', 'nametag'=>'', 'title'=>'');


if(isset($_POST['submit'])) {

$target_dir = "uploadedimages/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
}

if(isset($_POST['submit'])) {

        if(empty($_FILES["image"]["name"])){
                $errors["image"] = 'An image is required <br />';
        } else {
                echo htmlspecialchars($_FILES["image"]["name"]);
        }

        
        //echo htmlspecialchars($_FILES["image"]["name"]);
     
    if(empty($_POST['nametag'])){
            $errors['nametag'] = 'A nametag is required <br />';
    } else {
            echo htmlspecialchars($_POST['nametag']);
    }
    if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br />';
    } else {
            echo htmlspecialchars($_POST['title']);  
} 


    if(array_filter($errors)){
    } else {

    $nametag = mysqli_real_escape_string($conn, $_POST['nametag']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = mysqli_real_escape_string($conn, $_FILES["image"]["name"]);

            // Create SQL
    $sql = "INSERT INTO uploads(nametag, title, image) VALUES('$nametag', '$title', '$image')";
            
            // Save to db and check
    if(mysqli_query($conn, $sql)){

                // Data sent successfully
    } else {
    echo 'query error: ' . mysqli_error($conn);
                
                // Failed to send data
    }


    


    header('Location: index.php');
}
}


?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Upload image</h4>
        <form class="grey darken-4" action="add.php" method="POST" enctype="multipart/form-data">
            <label>Nametag: </label>
            <input type="text" name="nametag">
            <div class="red-text"><?php echo $errors['nametag']; ?></div>
            <label>Title: </label>
            <input type="text" name="title">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>Image: </label>
            <input type="file" name="image">
            <div class="red-text"><?php echo $errors['image']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>

    <?php include('templates/footer.php'); ?>

</html>