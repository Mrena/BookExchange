<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
         <?php
        // put your code here
     require_once 'Authentication.php';
     
     if(isset($_POST['email']))
     {
        $obj = new Authentication();
        $obj->getEmailAddress($_POST['email']);
     }  
        ?>
    </head>
    <body>
        <div id="page">
        <header><h1>Password Recovery</h1> </header>
        <form action="" method="POST">
            <table class="text">
                <tr><td><p>Enter your email address to have your password send to it. </p></td> </tr>
                <tr><td class="text">Email Address:</td><td><input type="text" name="email" id="email" /></td></tr>
                
            </table>
        </form>
       
        <footer><?php include_once 'includes/footer.php'; ?> </footer>
        </div>
    </body>
</html>


