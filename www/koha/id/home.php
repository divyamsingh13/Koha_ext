<?php 

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ID Card</title>
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
    </style>  
 </head>
 <body>
     Enter Student ID : <input type="text" id="sid"> <input type="button" value="Add" id="addtolist">  
     <br>
     Enter Start Index : <input type="text" id="startindex">
     <br>
     Enter End Index : <input type="text" id="endindex"> <input type="button" value="Add Series" id="addseries">  
     
     <div id="list">
         
         <form action="card.php" method="POST" >
             No elements
             <input type="submit" name="submit" id="submit" value="Submit">
        </form>
         
     </div>
 	 
	 
	 <script type="text/javascript">
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
                return false;
            }
            el.appendChild(x);
            el.appendChild(btn);
            x.value = k;
	 		x.name = k;
            x.className="le";
	 		ge('list').firstElementChild.appendChild(el);
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