@extends('frontend.LobbyBlack.layouts.app')
@section('page-title', $title)

@section('content')
<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
	
            var f=document.location.href.split('/');

            if(f[f.length-1].indexOf('all')==-1){
            document.location.href='/categories/all';	
            }
	
	var sysGames=[];	
	
@if (count($games))
					@foreach ($games as $key=>$game)

sysGames.push("{{$game->name}}");

					@endforeach
@endif	
	

	  var serverConfig;
     var  serverString;
    var XmlHttpRequest = new XMLHttpRequest();
    XmlHttpRequest.overrideMimeType("application/json");
    XmlHttpRequest.open('GET', '/socket_config.json', false);
    XmlHttpRequest.onreadystatechange = function ()
    {
        if (XmlHttpRequest.readyState == 4 && XmlHttpRequest.status == "200")
        {
            serverConfig = JSON.parse(XmlHttpRequest.responseText);
            serverString=serverConfig.prefix_ws+serverConfig.host_ws+':'+serverConfig.port;
          
        }
    }
	
    XmlHttpRequest.send(null);
		
		var sslHost=false;
		
		if(serverConfig.prefix_ws=='wss://'){
		sslHost=true;
		}
		
		for(var gi=0; gi<sysGames.length; gi++){
			
		if(sysGames[gi].indexOf('EGT')!=-1){
		var gameName=sysGames[gi];
        break;		
		}	
			
		}
		$(function(){

			var connectionParams = {
				sslHost: sslHost,
				tcpHost: serverConfig.host_ws,
				tcpPort: serverConfig.port,
				sessionKey: "41be9e65e0ff03a65e8c93576bf61130",
				lang: "en",
				gameIdentificationNumber: ""
			};

			var additionalParams = {
				base: "/games/"+gameName+"/html5/"
			};



			$.ajax({
				type: "GET",
				crossDomain: "false",
				url: "../init/init_desktop_cf_test.js",
				dataType: "script",
				contentType: "text/plain",
				success: function() {
					initDesktopHtml(connectionParams);				}
			});
			
	
			

		});
		addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){
var isFramed = false;
try {
	isFramed = window != window.top || document != top.document || self.location != top.location;
} catch (e) {
	isFramed = true;
}
 
var frm=document.getElementById('gameFrame');	
	
frm.style['display']='none';
frm.src='';
GetBalance();

}
	
	});
	
var lobbyBalance= {{ number_format(Auth::user()->balance, 2,".","") }};
var lobbyCurrency= "{{auth()->user()->present()->shop->currency}}";	
var lobbyUser="{{ Auth::user()->username }}";	
var lobbyExit="{{ route('frontend.auth.logout') }}";	
			
	
	
	
	
	</script>
	
	

@stop
