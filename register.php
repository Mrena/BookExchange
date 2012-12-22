<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>@import url("css/main.css");</style>
            <?php
        // put your code here
        require_once 'Authentication.php';
            if(isset($_POST['f_name'],$_POST['l_name'],$_POST['username'],$_POST['password'],$_POST['email_address']))
            {
                $f_name = $_POST['f_name'];
                $l_name = $_POST['l_name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email_address = $_POST['email_address'];
                $reg_type = $_POST['reg_type'];
                
                
                $obj = new Authentication();
                $obj->register($f_name,$l_name,$username,$password,$email_address);
                
            }
        ?>
        
    </head>
    <body>
        <div id="page">
        <header><h1>Register</h1> </header>
        <?php
                include_once 'includes/search.php';
                include_once 'includes/menu.php';
        ?>
        <form action="" method="POST">
            <table>
                <tr><td>Username:</td><td><input type="text" name="username" id="username" /></td></tr>
                <tr><td>Password:</td><td><input type="password" name="password" id="password" /></td></tr>
                <tr><td>Re-enter Password:</td><td><input type="password" name="rePassword" id="rePassword" value="" /></td></tr>
                <tr><td>First Name:</td><td><input type="text" name="f_name" id="f_name" /></td></tr>
                <tr><td>Last Name:</td><td><input type="text" name="l_name" id="l_name" /></td></tr>
                
                <tr><td>Email:</td><td><input type="text"  name="email_address" /></td></tr>
                
                <tr><td><input type="submit" name="submit" id="submit" value="Register" /></td></tr>
                <tr><td><a href="index.php">Login</a></td></tr>
             
            </table>
        </form>
        <footer><?php include_once 'includes/footer.php'; ?> </footer>
         <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script>
            $(document).ready(function(){
                $("#rePassword").blur(function(){
                   if($(this).val()!=$("#password").val())
                        {
                            alert("Passwords do not match");
                            $(this).val("");
                        }
                    
                });
                
            });    
    </script>
        </div>
    </body>
</html>
