<?php
include 'core/init.php';
include 'includes/overall/header.php';

if  (empty($_POST)===false) {
    $username =$POST['username'];
    $password =$POST['password'];

    if(empty($username)===true || empty($password) == true){
        $errors[] = 'you need to enter a username and also a password';
    }else if(user_exists($username) === false){
        $errors[] = 'We cant find your username have you registered';
    } else if(user_active($username)==- false){
        $errors[] = 'Activate your account';
    }else{
        $login = login($username, $password);

        if($login ==false) {
            $errors[] = 'That user name and password combination is incorrect';
        } else {

            // set the user session
            $_SESSION['user_id'] = $login;
            header('Location: index.php');
            exit();

            //redirect user to home
        }

    }
    print_r($errors);


}
?>
    </div>
<?php
include 'includes/overall/footer.php';
?>