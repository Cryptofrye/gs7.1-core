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
<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
	
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){

console.log(window != window.top || document != top.document || self.location != top.location);
	
if(window != window.top || document != top.document || self.location != top.location){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}

if(isFramed ){
window.parent.postMessage('CloseGame',"*");	
}		
window.parent.postMessage({
    'func': 'parentFunc',
    'message': 'close'
}, "*");
	
}else{
document.location.href='../../';	
}	
	
	
}
	
	});
</script>


<iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;" src='/games/FruitCocktail2IG/index.html?curr=<?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?>&lang=en' allowfullscreen>


</iframe>




</body>
<script>
	function	FormatViewport(){
	
var gm=document.getElementById("game");	

gm.style['height']=window.innerHeight+'px';	
	
}
	
	
window.onresize=FormatViewport;	
FormatViewport();	
</script>
</html>
<?php /**PATH C:\OSPanel\domains\rustam\resources\views/frontend/games/list/FruitCocktail2IG.blade.php ENDPATH**/ ?>