<?php include("includes/header.php"); ?>

<?php $photos = Photo::find_all() ?>
        <div class="row">
            <div class="col-md-12">
                <div class="thumbnails row">
                    <?php foreach ($photos as $photo):?>
                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail" href="">
                            <img src="admin/<?php echo $photo->picture_path();?>" alt="">
                            </a>
                        </div> <!-- /.col-xs-6 col-md-3 -->
                    <?php endforeach; ?>
                </div> <!-- /.thumbnails row -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->

        <?php include("includes/footer.php"); ?>
