<!--
/*	Author Name : Md.Arman Ahmed
	Date : 21 - 11 - 2014
	Copyright : GravityBD
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="css/style.css" rel="stylesheet" />
<title>Sign Up</title>
</head>
<body>   
<?php 
	//If name & email address given then...
	if(isset($_POST['fname']) && $_POST['email_address']){
		$stu_name=$_POST['fname'];//taking the name from input field and put it into a variable
		$stu_email=$_POST['email_address'];//taking the email_address from input field and put it into a variable
		$password=$_POST['password'];//taking the password from input field and put it into a variable
		$password2=$_POST['password2'];//taking the confirm password from input field and put it into a variable
	
		//If the two password mathces
		if($password == $password2)
		{	
			//if the length of the password is greater than or equal 4
			if(strlen($password) >= 4)
			{
				//connecting to the database
				$conn=mysql_connect("localhost","root","vertrigo");//giving hostname,username,password
				if(!$conn)//if not connected throwing error
				{
					die('Could not connect:'.mysql_error());
				}
				mysql_select_db("git_signup",$conn);//giving db name
				
				$pass1=md5($password);//md5 function for the password security
				$pass2=md5($password2);
				
				//checking the email is already exits or not
				if(mysql_num_rows(mysql_query("SELECT * FROM  student where stu_email = '$stu_email'")))
				{
					//throwing error messege
					$_SESSION['msg']= "This student Email is already registered!";
				}
				else{
				//inserting registered users or students information
				mysql_query("INSERT INTO  student (	stu_id,stu_name,stu_email,pass,con_pass) VALUES('','$stu_name','$stu_email','$pass1','$pass2') ");
				//throwing Registration success messege
				$_SESSION['msg']="You Have been registered.....!";
				
				}
			}
			else
			{
				//throwing error messege
				$_SESSION['msg']="Password is too short...Reg Again!";
			}
		}
		else
		{
			//throwing error messege
			$_SESSION['msg'] ="Password do not match...Try Again!";	
		}
	}
?>
  <!--main started-->      
   	<div class="main fix" >
		<div class="maincontent fix" id="maincontent">	
        	<!--Allocating Header--> 
			<h1 class="signup_class">Signup</h1>
            <!--End Header-->
            <!--Error messege display start-->  
            	<div class="error_msg">
					<?php
                        if(isset($_SESSION['msg']))
                            {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                    ?>	
                </div>	
                <!--Error messege display end-->
                <!--SignUp form start-->
            	<div class="fix signup_settings">
				<form method="post" name="my_form">
                	<table border="0" align="center"  class="table">
                    	<tr>
                        	<td class="fname">First Name</td>
                            <td>
                            	<input type="text" name="fname"  placeholder="First Name" maxlength="50"  tabindex="1"  class="filed_one" required="1" /><span class="required">*</span><td id="progressbar1" class="progress">
                        </tr>
                    
                        <tr>
                        	<td class="fname">Email Address</td>
                            <td>
                            	<input type="email" name="email_address" placeholder="Email Address"   tabindex="3"  class="filed_three" required="1" /><span class="required">*</span>
                            </td>
                        </tr>                                                                                                            
                        <tr>
                        	<td class="fname">Password</td>
                            <td>
                            	<input type="password" name="password" placeholder="********"   tabindex="5"  class="filed" required="1"  /><span class="required">*</span>
                            	<td class="warning">(minimum 5 digit/character)</td>
                            </td>                          
                        </tr>                                  
                        
                        <tr>
                        	<td class="fname">Confirm Password</td>
                            <td class="fname">
                            	<input type="password" name="password2" placeholder="********"   tabindex="6" equals="password" class="filed"  /><span class="required">*</span>
                            </td>
                        </tr>                                
                        
                        <tr>
                        	<td>&nbsp;</td>
                            <td>
                            	<input type="submit" name="btn" value="Save"  class="back"  onclick="button_actions()"/>
        						<input type="reset" name="reset" class="back" />
                               
                                </td>
                        </tr>
                        
                    </table>
                </form>
                </div>
                <!--SignUp form end-->
		 </div>	
		          
    </div>   
<!--Main End-->               
</body>
</html>