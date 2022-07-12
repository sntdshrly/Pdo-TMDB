<?php
# Sherly Santiadi 2072025

$movieDao = new MovieDaoImpl();
$movieId = filter_input(INPUT_GET, 'id');
?>
<form method="post">
<div style="width: 20%; float:left;">
    <?php
    if (isset($movieId) && $movieId != '') {
    /** @var  $item Movie */
    echo '<img class="card-img-top" alt="img" src="https://image.tmdb.org/t/p/w185/' . $movies->poster_path . '">';
    ?>
</div>

<div style="width: 80%; float:right">
    <?php
    echo '<h3>Title</h3>';
    echo '<p>' . $movies->original_title . '</p>';
    echo '<h3>Summary</h3>';
    echo '<p>' . $movies->overview . '</p>';
    echo '<h3>Release Year</h3>';
    echo '<p>' . $movies->release_date . '</p>';
    echo '<h3>Popularity</h3>';
    echo '<p>' . $movies->popularity . '</p>';
    echo '<h3>Homepage</h3>';
    echo '<p><a href="' . $movies->homepage . '" style="text-decoration: none;">Link Website</a></p>';
    }
    else{
        echo '<p>Error!</p>';
    }
    ?>
    <input type="hidden" name="idMovie" value="<?php echo $movies->id ?>">
    <input type="hidden" name="tMovie" value="<?php echo $movies->original_title ?>">
    <input type="hidden" name="strPoster" value="<?php echo $movies->poster_path ?>">
    <input type='submit' id="btnFilter" name="btnFilter" value="<?php echo ($is_avail) ? 'Delete to Favorite' : 'Add to Favorite';?>" class="btn btn-danger mt-4 my-4">
</div>
</form>