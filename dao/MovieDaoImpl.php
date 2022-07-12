<?php
/**
 * @author Sherly Santiadi 2072025
 **/
class MovieDaoImpl
{
    public function fetchAllMovie()
    {
        $resulted = ConnectionUtil::curl_get(ConnectionUtil::URL_FETCH_MOVIES.'now_playing?api_key='.ConnectionUtil::API_KEY, array()); // ApiService::URL_FETCH_CATEGORIES -> @util/ApiService.php
        $movies = json_decode($resulted);
        return $movies;
    }

    public function fetchFavorite($user_id)
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM fav_movie WHERE user_id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$user_id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $detail = $stmt->fetchAll();
        $stmt = null;
        return $detail;
    }
    /**
     * @param $id
     * @return Movie
     **/
    public function fetchMovieById($user_id, $id)
    {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT * FROM fav_movie WHERE movie_id = ? and user_id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$user_id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $detail = $stmt->fetchAll();
        $stmt = null;
        return $detail;
    }

    public function saveMovie($user_id, $movie_id, $title, $str_poster)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO fav_movie(movie_id, user_id, title, poster) VALUES(?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $movie_id);
        $stmt->bindValue(2, $user_id);
        $stmt->bindValue(3, $title);
        $stmt->bindValue(4, $str_poster);

        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function deleteMovie($user_id, $deletedId)
    {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM fav_movie WHERE movie_id = ? and user_id = ?';
        $stmt = $link->prepare($query);
        # default param = string
        $stmt->bindParam(1, $deletedId, PDO::PARAM_INT);
        $stmt->bindParam(2, $user_id, PDO::PARAM_STR);

        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return true;
    }

}