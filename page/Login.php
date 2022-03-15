<?php 
    require '../private/Display.php';
    require '../Databases/Database.php';
    require '../private/libraries.php';
    require '../private/Session.php';

if ($session -> is_loged_in()) {
	header('Location:index.php');
}

$message = "";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['psw'];

  if (empty($username) || empty($password)){
    if(empty($username)){
      $message =  " PLease fill you Username ";
    }elseif(empty($password)){
      $message =  " PLease fill you Password ";
    }
  }else{
    $message = "";
    $password_txt = sha1($password);
    $username_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$username);
    $sql = "SELECT user_id   FROM users WHERE username IN('$username_','$username_') AND password IN('$password_txt','$password_txt') AND  status ='active' ";
    $query = Database::query($sql);
    if ($row = Database::mysqli_fetch_array($query)) { 
      $session -> login($row['user_id']);
          header('Location:index.php');
    }else{
        $message = " Invalid username and password !! ";
    }  
  }

}else{

  $message = "";
  $username = "";
  $password = "";


}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="icon" type="image/png" href="../img/logo.png" sizes="96x96" />
	  <link rel="icon" type="image/png" href="../img/logo.png" sizes="32x32" />
	  <link rel="icon" type="image/png" href="../img/logo.png" sizes="16x16" />
	  <link rel="icon" type="image/png" href="../img/logo.png" sizes="128x128" />
    <link href="../css/nav.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in</title>
    </head>
    <body>
     <div class="div_logo"><img src="../img/logo.png" /></div>
      <form method="POST" action="<?php echo $s = $_SERVER['SCRIPT_NAME']; ?>" >
      <div class="container">
          <div class="_2j6WO">
          <h1>Log in </h1>
          <!-- <p>Please fill in this form to sign in</p><hr> -->
          <div id="message">
          <b><?php echo $message; ?></b>
          </div>
          <div class="div_login">Need an account? <a href="register.php" >Sign up</a></div>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" value="<?php echo htmlentities($username)?>"  name="username" id="username" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" value="<?php echo htmlentities($password)?>" name="psw" id="psw" required>
                    <div ><a href="forgot.php">Forgot password?</a></div>
                    <button type="submit" name="submit" class="registerbtn _1VfsI _OD95i">Sign in</button>
                     </div>
            </div>
            </div>
       </form>
    </body>
    <style type="text/css">
/* Add padding to containers */
.container {
  padding: 16px;
  background-color: whitesmoke;
  margin: 0px auto;
  width: 40%;
  height: auto;
  border: 1px solid #e3e3e3;
  padding: 48px;
  border-radius: 16px;
  font-family: 'Quicksand Medium';
}

h1{
    font-size: 25px;
    font-family: 'Quicksand-Regular';
}

.div_login{
     text-align: right;
}

.div_login a {
    cursor: pointer;
    text-decoration: none;
}

.div_logo {
  margin: 0px auto;
  width: 40%;
  height: auto;

}

.div_logo img{
  display:block;
  margin:auto;
  width: 35%;
  height: auto;
}

#message {
    padding: 10px;
    margin: 10px;
    text-align: center;
    font-family: 'Inconsolata Regular';
    font-size: 18px;
    color: #f44336;
}

/* Full-width input fields */
input[type=text], input[type=password]  , input[type=tel] , select , input[type=email] {
    width: 100%;
    padding: 14px;
    margin: 6px 0;
    border-radius: 4px;
    border: 1px solid #ced4da;
    background-color: #fff;
    box-sizing: border-box;
  
}

input[type=text]:focus, input[type=password]:focus ,  input[type=tel]:focus , select:focus , input[type=email]:focus{
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    margin: 8px 0;
    font-family: Source Sans Pro,sans-serif;
    font-size: 18px;
    font-weight: 600;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.17;
    letter-spacing: normal;
    text-align: center;
    white-space: nowrap;
    position: relative;
    cursor: pointer;
    height: 50px;
    opacity: 0.9;
    padding-left: 40px;
    padding-right: 40px;
    border-radius: 25px;
    border: 0;
    box-sizing: border-box;
    display: inline-block;
    text-decoration: none;
}

._1VfsI._OD95i {
    color: #fff;
    background-color: #04aa6d;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}


@media screen and (max-width: 720px) and (max-width: 600px){
 /* Add padding to containers */
.container {
  width: 100%;
  height: auto;
  border: 1px solid #e3e3e3;
  padding: 15px;
  border-radius: 10px;
}

h1{
    font-size: 15px;
}

.div_login{
     text-align: right;
     font-size: medium;
}

.div_logo {
  width: 80%;

}

.div_logo img{
  width: 50%;
  height: auto;
}

#message {
    padding: 5px;
    margin: 5px;
    font-size: 18px;
}

/* Full-width input fields */
input[type=text], input[type=password]  , input[type=tel] , select , input[type=email] {
    width: 100%;
    padding: 10px;
    margin: 6px 0;
    border-radius: 4px;
}

/* Overwrite default styles of hr */

/* Set a style for the submit button */
.registerbtn {
    margin: 8px 0;
    font-family: Source Sans Pro,sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.17;
    height: 45px;
}
}

</style>
</html>



