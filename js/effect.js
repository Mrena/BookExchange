/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(".hide").hide();

 var colorEffect = function()
  {
  for(var i=50;i<1000;i+=100)
           {
  var canvas = document.getElementById("game");  
  var ctx = canvas.getContext("2d");
  var rand = Math.floor(Math.random()*796);
  ctx.fillStyle = "rgba("+rand+", "+rand*20+", 500, .6)";
  ctx.beginPath();
  ctx.arc(i, 50, 30 , 0, Math.PI*2, true); 
  ctx.closePath();
  ctx.fill();
           }
  }
  
 
    setInterval("colorEffect()",1000); 
    
    $("a").hover(function(){
        $(this).css("color","#6666ff");
        
    }, function(){
        
        $(this).css("color","teal");
    });
    
    
  
       
 
  
 