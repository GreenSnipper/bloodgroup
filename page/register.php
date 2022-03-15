<?php 
    require '../private/Display.php';
    require '../Databases/Database.php';
    require '../private/libraries.php';
    require '../private/Session.php';

if ($session -> is_loged_in()) {
	header('Location:index.php');
}

$message = "";

if (isset($_POST['sign_up_reg'])) {
    $email = $_POST['email'];
    $phone_no = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['psw'];
    $psw_repeat  = $_POST['psw_repeat'];
    $country = $_POST['country'];
    
    if (empty($email) || empty($phone_no) || empty($username)  || empty($psw_repeat) || empty($country)) {
        if(empty($email)){
            $message =  " PLease fill you Email ";
        }elseif(empty($phone_no)){
            $message =  " PLease fill you Phone number ";
        }elseif(empty($username)){
            $message =  " PLease fill you Username ";
        }elseif(empty($password) ){
            $message =  " PLease fill you Password ";
        }elseif(strlen($password) <= 4){
            $message =  " You Password must be at least 4 characters ";
        }elseif(empty($country)){
            $message =  " PLease Select you Country ";
        }
    } else {
        if(Librarie::getcheckUsernameIfExist($username)){
            $message =  " That username is taken  ";
        }else{
                if(Librarie::getcheckEmailIfExist($email)){
                    $message =  " That email address is taken  ";
                }else{
            if($password != $psw_repeat){
                $message =  " PLease fill you Repeat Password Don`t macha";
            }else{
                if(strrpos($username," ") !== false ){
                    $message = " Space found in username  ";
                }else{
            $message = "";
            $date = Librarie::getTodayDate();
            $userID = md5($date);
            $password_txt = sha1($password);
            if(Librarie::setUsersRegistration($userID , $email , $username , $phone_no , $password_txt , $country , "" , $date)){
                $session -> login($userID);
                $email = "";
                $phone_no = "";
                $username = "";
                $psw_repeat = "";
                $password = "";
                $country = "";
                $date = "";
                $userID = "";
                $password_txt = "";
                header('Location:setprofile.php');
                exit();
            }else{
                 $message = " Not Successfully Try again ";
                 
            }
          }
          }
        }
        }
    } 
}else{
    $email = "";
    $phone_no = "";
    $username = "";
    $psw_repeat = "";
    $password = "";
    $country = "";
    $date = "";
    $userID = "";
    $password_txt = "";
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
        <title>Register</title>
    </head>
    <body>

      <form method="POST" action="<?php echo $s = $_SERVER['SCRIPT_NAME']; ?>" >
      <div class="container">
          <div class="_2j6WO">
          <h1>Get Started</h1>
          <p>Please fill in this Register form to create an account.</p><hr>
          <div id="message">
          <b><?php echo $message; ?></b>
          </div>
          <div class="div_login">Already have an account? <a href="login.php" >Log in</a></div>
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" value="<?php echo htmlentities($email)?>" name="email" id="email" required>
                    <label for="phone"><b>Phone number</b></label><br>
                    <input type="text" placeholder="Enter phone number" value="<?php echo htmlentities($phone_no)?>" name="phone" id="phone" minlength="9" maxlength="14" required><br>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" value="<?php echo htmlentities($username)?>"  name="username" id="username" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" value="<?php echo htmlentities($password)?>" id="psw" minlength="4"  required>
                    <label for="psw-repeat"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw_repeat" value="<?php echo htmlentities($psw_repeat)?>" id="psw-repeat" minlength="4" required><hr>
                    <label for="country" ><b>Country</b></label>
                    <select id="country" name="country" class="country">
                    <option value=""></option>
                    <option value="Kenya">Kenya</option>
                    <option value="Tanzania">Tanzania</option>
                </select>
                
                     <p>By clicking the "Sign up" button, you are creating an account, and agree to ______ <a href="#">Terms of Service and Privacy Policy</a>.
                     
                    </p>

                     <div>
                     <button type="submit" name="sign_up_reg" class="registerbtn _1VfsI _OD95i">Sign up</button>
                     </div>
            </div>
            </div>
       </form>



    </body>

<script>
//    const phoneInputField = document.querySelector("#phone");
//    const phoneInput = window.intlTelInput(phoneInputField, {
//        preferredCountries: ["tz", "ke"],
//        utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//     });
</script>

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

.nav-img{
     width: 100px;
     height: auto;
}

.div_login{
     text-align: right;
}

.div_login a {
    cursor: pointer;
    text-decoration: none;
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
  margin: 0px auto;
  width: 80%;
  height: auto;
}

}

</style>
</html>



