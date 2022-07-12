<?php
/**
 * @author Sherly Santiadi 2072025
 **/
?>

<?php

class MoviesController
{
    public function index()
    {
        $moviesDao = new MovieDaoImpl();
        $result = $moviesDao->fetchFavorite($_SESSION['web_user_id']);

		include_once 'view/movie-view.php';
    }

    public function detail($movies_id)
    {
        $moviesDao = new MovieDaoImpl();
        $movies = null;
        if (empty($movies_id) || $movies_id == null) {
            echo '<div class="alert alert-danger">Please select movies</div>';
        }
        else {
            $result = $moviesDao->fetchMovieById($_SESSION['web_user_id'], $movies_id);
            $is_avail = ($result) ? true : false;
            $resulted = ConnectionUtil::curl_get(ConnectionUtil::URL_FETCH_MOVIES.$movies_id.'?api_key='.ConnectionUtil::API_KEY, array()); // ApiService::URL_FETCH_CATEGORIES -> @util/ApiService.php
            $movies = json_decode($resulted);
        }

        #UNTUK ADD FAVORITES
        $submitPressed = filter_input(INPUT_POST, 'btnFilter',FILTER_SANITIZE_STRING);
        if (isset($submitPressed)) {
            $idMovie = filter_input(INPUT_POST, 'idMovie',FILTER_SANITIZE_STRING);
            $tMovie = filter_input(INPUT_POST, 'tMovie',FILTER_SANITIZE_STRING);
            $strPoster = filter_input(INPUT_POST, 'strPoster',FILTER_SANITIZE_STRING);
            if($submitPressed == 'Add to Favorite'){
                $insert = $moviesDao->saveMovie($_SESSION['web_user_id'], $idMovie, $tMovie, $strPoster);
            }elseif ($submitPressed  == 'Delete to Favorite'){
                $moviesDao->deleteMovie($_SESSION['web_user_id'], $idMovie);
            }
            header('location:index.php?webmenu=movie');
        }
        include_once 'view/select-movie.php';
    }
}