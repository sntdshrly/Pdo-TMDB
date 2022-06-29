<?php
/**
 * @author Sherly Santiadi 2072025
 **/
$movieDao = new MovieDaoImpl();
?>

<div class="row mx-lg-n5">
    <?php
    $movies = $movieDao->fetchAllMovie();
    foreach ($movies->results as $item) {
        echo '<div class="col py-3">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" alt="img" src="https://image.tmdb.org/t/p/w185/' . $item->poster_path . '">
                        <a href="index.php?webmenu=edgen3&id=' . $item->id . '"style="text-decoration: none;">' . $item->original_title . '</a>
                            <p class="card-text" style="height: 180px;">' . $item->overview . '</p>
                </div>
            </div>';
    }
    ?>
</div>

<script>
    function addMovie() {
        window.location = "index.php?webmenu=edgen2";
    }
</script>