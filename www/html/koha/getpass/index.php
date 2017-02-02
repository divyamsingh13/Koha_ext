<?php 

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Hostel GatePass Card Generator</title>
    <style>
        div#list {
            position: relative;
            width: 200px;
            text-align: center;
            margin: auto;
        }
        .le {
            position: relative;
            width: 100px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }
        .row2 {
            display: block;
            position: relative;
            width: 30%;
            float: left;
            text-align: left;
        }
        .row1 {
            display: block;
            position: relative;
            width: 50%;
            float: left;
            text-align: center;
        }
    </style>  
 </head>
 <body>
  <h3>
    Hostel GatePass Card Generator
 </h3>
 <div class="row1">
     <div class="aa">Enter Student ID : <input type="text" id="sid"> <input type="button" value="Add" id="addtolist">  </div>
     <br>
     <div class="aa">Enter Start Index : <br><input type="text" id="startindex"> </div>
     <br>
     <div class="aa">Enter End Index : <br><input type="text" id="endindex"> <br> <input type="button" value="Add Series" id="addseries">  </div>

</div>
<div class="row2">
     <div id="list">
         <form action="getpass.php" method="POST" >
             <p id="noid">No elements</p>
             <input type="submit" name="submit" id="submit" value="Submit">
        </form>
         
     </div>
</div>	 
	 
	 <script type="text/javascript">
	 	var id=0;
        var ge = function(ID){
            return document.getElementById(ID);
        };
        var ce = function(div){
            return document.createElement(div);
        };
         var seriestolist = function(){
             var start = ge('startindex').value;
             var end = ge('endindex').value;
             for(var k= parseInt(start) ;k<=parseInt(end);k++){
                 addtolist(k);
             }
         }
         var trigernoid=function() {
            if(id)
            {
                ge('noid').style.display="none";
            }
            else
            {
                ge('noid').style.display="block";
            }
            // body...
         };
         var addtolist = function(k){
            //var k = ge('sid').value;
            var el = ce('div');
            el.id = k;
            var x = ce("input");
            var btn = ce("input");
            btn.type="button";
            btn.value="X";
            btn.onclick = function() {
                var elem = document.getElementById(k);
                elem.parentNode.removeChild(elem);
                id--;
                trigernoid();
                return false;
            }
            el.appendChild(x);
            el.appendChild(btn);
            x.value = k;
            x.name = k;
            x.className="le";
            ge('list').firstElementChild.appendChild(el);
            id++;
            trigernoid();
         }
        ge('addtolist').onclick = function(e){
            var k = ge('sid').value;
            addtolist(k);
        };
         ge('addseries').onclick = function(){
             seriestolist();
         }
         
         
	 </script>
 </body>
 </html>