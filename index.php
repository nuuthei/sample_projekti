<?php

include('config/db_connect.php');

$sql = 'SELECT image, title, nametag, id, created_at FROM uploads ORDER BY created_at DESC';

$result = mysqli_query($conn, $sql);

$uploads = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
    <style type="text/css">
        .container {
            color: #757575 !important;
        }
        .card {
            color: #757575 !important;
            background: #757575 !important;
        }
        .col s6 md3 {
            color: #757575 !important;
        }
        img {
            height: 100%;
            max-height: 100px;
        }
    </style>

    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Uploads</h4>
    
    <div class="container">
        <div class="row">
            <?php foreach($uploads as $upload){ ?>
                <div class="col s6 md3" color="#757575">
                    <div class="card z-depth-0" color="#757575">
                        <div class="card-content center">
                            <h6>"<?php echo htmlspecialchars($upload['title']); ?>"</h6>
                            <div>
                                <a href="uploadedimages/<?php echo htmlspecialchars($upload['image']);?>">
                                    <img src="uploadedimages/<?php echo htmlspecialchars($upload['image']);?>"></img>
                                </a>
                            </div>
                            <h6>From: <?php echo htmlspecialchars($upload['nametag']); ?></h6>
                            <h6><?php echo htmlspecialchars($upload['created_at']); ?></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>
</body>
</html>