<?php
/**
 * @author Sherly Santiadi 2072025
 **/
$userDao = new UserDaoImpl();
$loginPressed = filter_input(INPUT_POST, 'btnLogin');

if (isset($loginPressed)) {
    $email = filter_input(INPUT_POST, 'txtEmail');
    $password = filter_input(INPUT_POST, 'txtPassword');
    $md5Password = md5($password);

    $result = $userDao->userLogin($email, $md5Password);
    if (isset($result) && $result != null && $result[0]['id'] == $email) {
        $_SESSION['web_is_logged'] = true;
        $_SESSION['web_full_name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
        $_SESSION['web_user_id'] = $result[0]['id'];
        header('location:index.php');
    } else {
        echo '<div class="bg-error">Invalid email or password</div>';
    }
}

?>
<form method="post">
    <div class="form-group">
        <label for="userEmail">ID</label>
        <input type="text" class="form-control" id="userEmail" placeholder="Enter ID" name="txtEmail" autofocus
               required>
    </div>
    <div class="form-group">
        <label for="passwordId">Password</label>
        <input type="password" class="form-control" id="passwordId" placeholder="Password" name="txtPassword" required>
    </div>
    <button type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin">Submit</button>
</form>