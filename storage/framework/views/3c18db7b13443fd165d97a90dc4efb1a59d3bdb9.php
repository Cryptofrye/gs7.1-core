<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($game->title); ?></title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>



<body style="margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="position:fixed;top:0px;margin:0px;border:0px;width:100%;height:100vh;" src='/games/Fantastico7AM/mobile/fantastico.html/?curr=<?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?>&lang=en&w=&lang=en' allowfullscreen>


</iframe>




</body>

<script>

document.cookie = 'phpsessid=; Max-Age=0; path=/; domain=' + location.host; 
document.cookie = 'PHPSESSID=; Max-Age=0; path=/; domain=' + location.host;

 window.console={ log:function(){}, error:function(){} };       
 window.onerror=function(){return true};

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }







		
		        if(document.location.href.split("?")[1]==undefined){
		document.location.href=document.location.href+'/?curr=<?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?>&lang=en&w=&lang=en';	
		}


addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");	
}	
document.location.href='../../';	
}
	
	});
	
	
function	FormatViewport(){
	
var gm=document.getElementById("game");	
	
gm.style['height']=window.innerHeight+'px';	
gm.style['top']=window.scrollY+'px';	
	
}
	
	
window.onresize=FormatViewport;	
setTimeout(function(){FormatViewport();},1000);	
	
</script>
</html>
<?php /**PATH C:\OSPanel\domains\rustam\resources\views/frontend/games/list/Fantastico7AM.blade.php ENDPATH**/ ?>