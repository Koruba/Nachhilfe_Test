<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login</title>
 </head>
 <body>
 	<h1>Login</h1>
 	<?php 
	 if(isset($error))
	 {
	    echo $error;
	 }
	 echo validation_errors();
	 echo form_open('user/setUserLogin'); 
	 ?>
 <ul>
	 <br />
	 <label for="E_Mail_Address">E-Mail:</label>
	 <div>
	 <input type="text" size="50" id="E_Mail_Address" name="E_Mail_Address"/>
	 </div>
	 <br/>
	 <label for="Password">Password:</label>
	 <div>
	 <input type="Password" size="20" id="Password" name="Password"/>
	 </div>
	 <br/>
 </ul>
	 <input type="submit" value="Login"/>
	   </form>
	 </body>
</html>