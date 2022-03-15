<?php 

   // require '../Databases/Database.php';
     
    class Librarie{

		public static function getTodayDate(){
			$sql = "SELECT DATE_FORMAT(NOW(),'%Y-%m-%d %h:%i %s %p') as 'Date' ";
			$query = Database::query($sql);
			if ($row = Database::mysqli_fetch_array($query)) {
				return $row['Date'];
			}
	   }

	   public static function generateRandomString($length = 2) {
		// $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$date = "";
		$sql = "SELECT DATE_FORMAT(NOW(),'%y%m%d%h%i%s') as 'Date' ";
		$query = Database::query($sql);
			if ($row = Database::mysqli_fetch_array($query)) {
				$date =  $row['Date'];
			}
		 return $randomString."".$date;
		// return $date;
	}

	   public static function getcheckUsernameIfExist($username){
		   $txt = mysqli_real_escape_string(Database::getDatabaseConnect(),$username);
		   $sql = "SELECT username FROM users WHERE username = '$txt'";
		   $query = Database::query($sql);
			if ($row = Database::mysqli_fetch_array($query)) {
				return true;
			} else {
				return false;
			}
        }

		public static function getcheckPhonenumaberIfExist($phone_no){
			$txt = mysqli_real_escape_string(Database::getDatabaseConnect(),$phone_no);
			$sql = "SELECT phone_no FROM users WHERE phone_no = '$txt'";
			$query = Database::query($sql);
			 if ($row = Database::mysqli_fetch_array($query)) {
				 return true;
			 } else {
				 return false;
			 }
		 }

		 public static function getcheckEmailIfExist($phone_no){
			$txt = mysqli_real_escape_string(Database::getDatabaseConnect(),$phone_no);
			$sql = "SELECT email FROM users WHERE email = '$txt'";
			$query = Database::query($sql);
			 if ($row = Database::mysqli_fetch_array($query)) {
				 return true;
			 } else {
				 return false;
			 }
		 }

		public static function setUsersRegistration( $userID , $email ,$username , $phone_no ,$pws, $country , $userID_reg ,$date){
			$username_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$username);
			$phone_no_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$phone_no);
			$email_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$email);
			$country_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$country);
			$userID_reg_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$userID_reg);
			$sql = "INSERT INTO users VALUES ('$userID','' , '$username_' , '$phone_no_' , '$email_' , '$pws' , '$country_' , '','user','$date' ,'active') ";
			if (Database::query($sql)) {
				return true;
			} else {
				return false;
			}
		}




		public static function getUserPhoneNumber($id = '' ){
			$sql = "SELECT phone_no  FROM users  WHERE user_id ='$id' ";
			$query = Database::query($sql);
			if($row = Database::mysqli_fetch_array($query)){
					return $row['phone_no'];
			  }
	   }

	   public static function getUserIDByUsername($username = '' ){
		$sql = "SELECT user_id  FROM users  WHERE username  ='$username' ";
		$query = Database::query($sql);
		if($row = Database::mysqli_fetch_array($query)){
				return $row['user_id'];
		  }
   }

	

	  public static function getUserUsername($id = '' ){
		$sql = "SELECT username  FROM users  WHERE user_id ='$id' ";
		$query = Database::query($sql);
		if($row = Database::mysqli_fetch_array($query)){
				return $row['username'];
		  }
      }

	  public static function getUserEmailAddress($id = '' ){
		$sql = "SELECT email  FROM users  WHERE user_id ='$id' ";
		$query = Database::query($sql);
		if($row = Database::mysqli_fetch_array($query)){
				return $row['email'];
		  }
      }

	  public static function getUserType($id = '' ){
		$sql = "SELECT user_type  FROM users  WHERE user_id ='$id' ";
		$query = Database::query($sql);
		if($row = Database::mysqli_fetch_array($query)){
				return $row['user_type'];
		  }
	  }

	 
	  public static function getCheckIfUserExist($id = ''){
		$id_ = mysqli_real_escape_string(Database::getDatabaseConnect(),$id);
		$sql = "SELECT user_id  FROM users WHERE user_id ='$id_'";
		$query = Database::query($sql);
		if($row = Database::mysqli_fetch_array($query)){
			 return true; 
		  }else{
			  return false;
	      }
      }

	

	





	


	  public static function getDiplayUpdateActivationAccountLink(){
		echo "<a href='index.php' >Back</a><br>";
		die("Error : Not Successfully Try again");
	  }
    	
	  
   } 
?>