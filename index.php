<?php include("includes/header.php"); ?>

<?php

// Pagination Variables
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1; // If not set, then its 1
$items_per_page = 4;
$items_total_count = Photo::count_all();


$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photos ";
$sql.= "LIMIT {$items_per_page} ";
$sql.= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);

?>

        <div class="row">
            <div class="col-md-12">
                <div class="thumbnails row">
                    <?php foreach ($photos as $photo):?>
                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail" href="photo.php?id=<?php echo $photo->id ?>">
                            <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path();?>" alt="">
                            </a>
                        </div> <!-- /.col-xs-6 col-md-3 -->
                    <?php endforeach; ?>
                </div> <!-- /.thumbnails row -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->

        <?php include("includes/footer.php"); ?>
