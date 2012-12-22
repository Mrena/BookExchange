<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>@import url("css/main.css");</style>
         <?php
        // put your code here
     require_once 'Authentication.php';
     
     if(isset($_POST['email'],$_POST['submit']))
     {
        $obj = new Authentication();
       echo $obj->getEmailAddress($_POST['email']) ? "An email containing your password has been send to you." : "Could not send email";
     }  
        ?>
    </head>
    <body>
        <div id="page">
        <header><h1>Password Recovery</h1> </header>
        <?php include_once 'includes/search.php'; ?>
        <canvas id="game" width="890" height="100">  </canvas>
        <table>
            <tr><td><a href="index.php">Home</a></td></tr>
        </table>
        <form action="" method="POST">
            <table>
                <tr><td><p>Enter your email address to receive your password from it. </p></td> </tr>
                <tr><td>Email Address:</td><td><input type="text" name="email" id="email" /></td></tr>
                <tr><td><input type="submit" id="submit" value="Send" /></td></tr>
            </table>
        </form>
       
        <footer><?php include_once 'includes/footer.php'; ?> </footer>
         <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        </div>
    </body>
</html>


