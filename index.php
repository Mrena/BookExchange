<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>@import url("css/main.css");</style>
         <?php
        // put your code here
        require_once 'Authentication.php';
        if(isset($_GET['logout'])&& $_GET['logout']==true)
            session_destroy ();
        if(isset($_POST['username'],$_POST['password']))
        {
        $username =  $_POST['username'];
        $password = $_POST['password'];
        $obj = new Authentication($username,$password);
        $obj->login($username,$password);
        }
        
        ?>
    </head>
    <body>
        <div id="page">
        <header><h1>Login</h1> </header>
        <?php include_once 'includes/search.php'; ?>
        <canvas id="game" width="890" height="100">  </canvas>
        
       
        <form action="" method="POST">
            <table>
                <tr> <td>Username:</td><td><input type="text" name="username" id="username" /></td>
                <tr> <td>Password:</td><td><input type="password" name="password" id="password" /></td>
                <tr><td><input type="submit" name="submit" id="submit" value="Login" /></td> 
                <tr><td><a href="forgot.php">Forgot password? </a></td><td><a href="register.php">Register</a></td></tr>   
                    
            </table>
        </form>
        <div id="intro" class="text" style="line-height:15px;">
            BookExchange is a portal here to allow everyone to easily exchange new and used books. It is totally up to you, the owner of a book, to either sell or swipe your book with another book you need. The best part is that it is totally free.
        </div>
        <footer><?php include_once 'includes/footer.php'; ?> </footer>
         <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        </div>
    </body>
</html>
