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
    </head>
    <body>
        <div id="page">
            <header><h1>Preview</h1></header>
        
        
        <?php
        // put your code here
        require_once 'Seller.php';
        require_once 'Book.php';
        include_once 'includes/logged.php';
        include_once 'includes/search.php';
        include_once 'includes/menu.php';
        
        
        ?>
        <canvas id="game" width="890" height="100">  </canvas>    
        <section id="bookPreview">
            
        </section>
        <section id="reply">
            <p><b>Reply</b></p>
            <table>
                <tr><td>Name:</td><td><input type="text" name="name" id="name" /></td></tr>
                <tr><td>Message:</td><td><textarea name="userReply" id="userReply"></textarea></td></tr>
           <tr><td><button id="Send">Send</button></td></tr>
            <tr><td><div id="text"></div></td></tr>
            </table>
        </section>
        <footer><?php include_once 'includes/footer.php'; ?></footer>
        <?php
        include_once 'includes/searchlogic.php';
        ?>
        </div>
         <script src="js/jquery-1.8.3.min.js"></script>
         <script src="js/effect.js"></script>
         <script src="js/search.js"></script>
         <script>
             
             $("#Send").click(function(){
               
                
                Reply();
            
           
            
             }).keydown(function(e){
                 var enter = 13;
                 
                 if(e.which==enter)
                         Reply();
             });
         var Reply = function(){
              var name = $("#name").val(); 
                var reply = $("#userReply").val();
                $("#name").val("");
                $("#userReply").val("");
                $("#text").append(name+"<br />");
                $("#text").append(reply);
                $("#text").append("<hr />");
             
         }
     </script>
    </body>
</html>
