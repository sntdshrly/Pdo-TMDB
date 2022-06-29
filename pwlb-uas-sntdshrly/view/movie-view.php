<?php
// Sherly Santiadi 2072025
$movieDao = new MovieDaoImpl();
?>

<div class="row mx-lg-n5">
    <?php
    foreach ($result as $item) {
        echo '<div class="col py-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" alt="img" src="https://image.tmdb.org/t/p/w185/' . $item->poster . '">
                        <a href="index.php?webmenu=edgen3&id=' . $item->movie_id . '"style="text-decoration: none;">' . $item->title . '</a>
                </div>
            </div>';
    }
    ?>
</div>