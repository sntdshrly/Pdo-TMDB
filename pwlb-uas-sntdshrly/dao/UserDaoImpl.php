<?php
/**
 * @author Sherly Santiadi 2072025
 **/
class UserDaoImpl
{
    public function userLogin($userEmail, $userPassword){
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT id, first_name, last_name, password FROM fe_user WHERE id = ? AND password = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$userEmail);
        $stmt->bindParam(2,$userPassword);
        $stmt->execute();
        $user = $stmt->fetchAll();
        $stmt = null;
        return $user;
    }
}