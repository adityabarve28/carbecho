<?php
error_reporting(E_ALL);
include "nav.php";
include "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKING Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- LINLING EXTERNAL STYLE SHEET -->
    <link rel="stylesheet" href="css/style.css">
    <!-- TITLE -->
    <title>Car Becho</title>
</head>
<body class="body">
<div class="container mt-4">
    <h2>Available Cars</h2>

    <?php
    // Fetch data from the cars table
    $sql = "SELECT * FROM sellcar";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card mt-3">
                <div class="card-header">
                    <?php echo $row['SELLERNAME']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['NAME']; ?></h5>
                    <p class="card-text">
                        <strong>Type:</strong> <?php echo $row['TYPE']; ?><br>
                        <strong>Price:</strong> <?php echo $row['PRICE'].' INR'; ?><br>
                        <strong>Speed:</strong> <?php echo $row['SPEED'].' KM/H'; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <div id="carousel-<?php echo $row['car_id']; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $images = explode(',', $row['IMAGES']);
                            foreach ($images as $index => $image) {
                                ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo trim($image); ?>" class="img-fluid img-thumbnail img" alt="Car Image">
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-<?php echo $row['car_id']; ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-<?php echo $row['car_id']; ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                
            </div>
            <?php
        }
    } else {
        echo "No cars found.";
    }
    ?>
</div>

</body>
</html>