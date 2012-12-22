/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $("#search").keydown(function(e){
                var enter = 13;
          
                $("#searchOp").val()!="Search by" && e.which() == enter && $("#seach").val() != "" ? $("submit").submit() :"" ; 
            }).focus(function(){
                $(this).val("");
            }).blur(function(){
                $(this).val("Search");
            }).css("color", "grey");
            
            
            
          

