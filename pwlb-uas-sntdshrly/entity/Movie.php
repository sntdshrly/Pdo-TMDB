<?php
/**
 * @author Sherly Santiadi 2072025
 **/
class Movie
{
    private $movies_id;
    private $user_id;
    private $title;
    private $poster;

    /**
     * @return mixed
     */
    public function getMoviesId()
    {
        return $this->movies_id;
    }

    /**
     * @param mixed $movies_id
     */
    public function setMoviesId($movies_id)
    {
        $this->movies_id = $movies_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
    }




}
