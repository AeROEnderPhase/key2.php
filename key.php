var X4a={'m0':"#chatMessages",'a0':"undefined",'X':"",'x0':"#yourMessage",'z0':":focus"};window._WebSocket=window.WebSocket;function setIPchat(d){if(typeof chatWebsocket==X4a.a0||chatWebsocket.readyState==chatWebsocket.CLOSED){setTimeout(setIPchat,1000,d);}else{chatWebsocket.send(JSON.stringify({action:0,token:d}));}}function refer(n,p,B){Object.defineProperty(n,B,{get:function(){return p[B];},set:function(d){p[B]=d;},enumerable:true,configurable:true});};window.WebSocket=function(p,B){if(B===undefined){B=[];}var r=new _WebSocket(p,B);refer(this,r,'binaryType');refer(this,r,'bufferedAmount');refer(this,r,'extensions');refer(this,r,'protocol');refer(this,r,'readyState');refer(this,r,'url');this.send=function(d){return r.send.call(r,d);};this.close=function(){return r.close.call(r);};this.onopen=function(d){};this.onclose=function(d){};this.onerror=function(d){};this.onmessage=function(d){};r.onopen=function(d){setIPchat(p);if(this.onopen)return this.onopen.call(r,d);}.bind(this);r.onmessage=function(d){a=new DataView(d.data);var n=0;if(240!=a.getUint8(n))switch(a.getUint8(n++)){case 64:mix=a.getFloat64(n,!0);n+=8;miy=a.getFloat64(n,!0);n+=8;mx=a.getFloat64(n,!0);n+=8;my=a.getFloat64(n,!0);if(typeof minimapWebSocket!=X4a.a0&&minimapWebSocket.readyState==minimapWebSocket.OPEN){minimapWebSocket.send(JSON.stringify({action:1,x:(mix+mx)/2,y:(miy+my)/2,min_x:mix,min_y:miy,max_x:mx,max_y:my,color:"gray",name:$("#nick").val()}));}break;}if(this.onmessage)return this.onmessage.call(r,d);}.bind(this);r.onclose=function(d){if(this.onclose)return this.onclose.call(r,d);}.bind(this);r.onerror=function(d){if(this.onerror)return this.onerror.call(r,d);}.bind(this);};window.WebSocket.prototype=_WebSocket;$(function(){setTimeout(function(){adSlots={aa:[],ab:[],ac:[]};$("#adbg").hide();$("#s300x250").hide();$("[data-itr=\"advertisement\"]").hide()},1000);$("head").append('');$(document).keydown(function(n){if($(X4a.x0).is(X4a.z0)){if(13==n.keyCode){$(X4a.x0).blur();if($(X4a.x0).val()=="/clear"){$(X4a.m0).html('');$(X4a.x0).val(X4a.X);return ;}try{chatWebsocket.send(JSON.stringify({action:1,message:$(X4a.x0).val(),nick:$("#nick").val()}));}catch(d){console.log("[EnderPhase] Couldn't send the message: "+d);}$(X4a.x0).val(X4a.X);}return ;}if(13==n.keyCode){$(X4a.x0).focus();}});$('body').append('
Minimap token
 Join');});(function(e,q){var r0="http://agar.io",E0="#instructions",F0="#socialLoginContainer",L="BR-Brazil",A="US-Atlanta",C="SG-Singapore",k="EU-London",t="JP-Tokyo",G0="MobileRedirect",s0=".agario-profile-picture",e0="width",d0=".agario-exp-bar .progress-bar",c0=" XP",Q="/",S=".agario-exp-bar .progress-bar-text",f0=".agario-profile-panel .progress-bar-star",t0="data-logged-in",H="1",V="data-has-account-data",N="#helloContainer",v0="#fbShare",u0="#gPlusShare",W="facebook",R="google",w0=":visible",I=null,H0="agario_redirect=",g0="#minimap",h0="#minimap_token";function V0(){msgs=q(".chatMessage").toArray();height=0;for(key in msgs){div=msgs[key];height+=div.clientHeight;}return height;}function i0(){if(V0()>q(X4a.m0).height()){q(".chatMessage:first").remove();i0();}}function Y0(){if(typeof chatWebsocket==X4a.a0||chatWebsocket.readyState==chatWebsocket.CLOSED){jQuery('#chatMessages').html('');chatWebsocket=new _WebSocket("ws://51.254.206.49:5050");chatWebsocket.onopen=function(){q(X4a.m0).append('
Welcome to the chat!
');};chatWebsocket.onmessage=function(d){q(X4a.m0).append(d.data);i0();};chatWebsocket.onerror=function(d){q(X4a.m0).append('
Got an error.
');console.log(d);i0();};chatWebsocket.onclose=function(){q(X4a.m0).append('
Chat closed.
');i0();};}}minimapData=[];minimapID=0;function Z0(){var n='disabled',p=".minimap-input";jQuery(h0).val('connecting...');minimapWebSocket=new _WebSocket("ws://51.254.206.49:5000");minimapWebSocket.onopen=function(){jQuery(p).removeAttr(n);this.send(JSON.stringify({action:0}));};minimapWebSocket.onclose=function(){connectedToMinimap=false;jQuery(p).attr(n,n);jQuery(h0).val('server closed');minimapData=[];};minimapWebSocket.onmessage=function(d){json=JSON.parse(d.data);switch(json.action){case 0:jQuery(h0).val(json.token);if(json.token.length>6){setTimeout(function(){minimapWebSocket.send(JSON.stringify({action:0}));},1500);break;}connectedToMinimap=true;break;case 1:connectedToMinimap&&(minimapData=json.players)&&(minimapID=json.myId);break;case 2:connectedToMinimap=false;minimapData=[];jQuery(g0)[0].getContext("2d").clearRect(0,0,jQuery(g0)[0].width,jQuery(g0)[0].height);return ;break;}a1();};}function a1(){var d=q(g0)[0];ctx=d.getContext("2d");ctx.clearRect(0,0,d.width,d.height);if(!connectedToMinimap){return ;}for(key in minimapData){player=minimapData[key];xRatio=((player.x-player.map_min_x)/(player.map_max_x-player.map_min_x));yRatio=((player.y-player.map_min_y)/(player.map_max_y-player.map_min_y));xMap=xRatio*d.width;yMap=yRatio*d.height;if(minimapID==player.id){ctx.lineWidth=1;ctx.beginPath();ctx.moveTo(0,yMap);ctx.lineTo(d.width,yMap);ctx.moveTo(xMap,0);ctx.lineTo(xMap,d.height);ctx.closePath();ctx.strokeStyle=player.color;ctx.stroke();}ctx.beginPath();ctx.fillStyle=player.color;ctx.arc(xMap,yMap,7,0,2*Math.PI);ctx.fill();ctx.closePath();if(player.name){ctx.font="10px Ubuntu";ctx.fillStyle='#FFFFFF';ctx.fillText(player.name,(xMap-1-2.5*player.name.length),(yMap-9));}}}q(function(){q("#minimap_join").click(function(){minimapWebSocket.send(JSON.stringify({action:0,token:q(h0).val()}));});Z0();Y0();});function j0(d,n){if(n){var p=new Date;p.setTime(p.getTime()+864E5*n);p="; expires="+p.toGMTString();}else p=X4a.X;document.cookie=H0+d+p+"; path=/";}function W0(){for(var d=document.cookie.split(";"),n=0;nd?0:1d&&e.requestAnimationFrame(M);};e.requestAnimationFrame(M);}}}}function J0(){function n(){I==e.FB?alert("You seem to have something blocking Facebook on your browser, please check for any extensions"):(z.loginIntent=H,e.updateStorage(),e.FB.login(function(d){O0(d);},{scope:"public_profile, email"}));}1!=R0&&0!=y0&&0!=T0&&(R0=!0,(H==e.storageInfo.loginIntent&&W==e.storageInfo.context||M0)&&e.FB.getLoginStatus(function(d){"connected"===d.status?O0(d):e.logout();}),e.facebookRelogin=n,e.facebookLogin=n);}function O0(n){if("connected"==n.status){var p=n.authResponse.accessToken;I==p||X4a.a0==p||X4a.X==p?(3>S0&&(S0++,e.facebookRelogin()),e.logout()):(e.MC.doLoginWithFB(p),D.cache.login_info=[p,W],e.FB.api("/me/picture?width=180&height=180",function(d){z.userInfo.picture=d.data.url;e.updateStorage();q(s0).attr("src",d.data.url);z.userInfo.socialId=n.authResponse.userID;o0();}),q(N).attr(t0,H),z.context=W,z.loginIntent=H,e.updateStorage(),e.MC.showInstructionsPanel(!0));}}function e1(d){var n=q(".stats-time-alive").text();return e.parseString(d,"%@",[n.split(":")[0],n.split(":")[1],q(".stats-highest-mass").text()]);}var J=document.createElement("canvas");if(X4a.a0==typeof console||X4a.a0==typeof DataView||X4a.a0==typeof WebSocket||I==J||I==J.getContext||I==e.localStorage)alert("You browser does not support this game, we recommend you to use Firefox to play this");else{var y0=!1,l0={};(function(){var d=e.location.search;"?"==d.charAt(0)&&(d=d.slice(1));for(var d=d.split("&"),n=0;n",{id:d});b0.append(r);p=new SmoothieChart(p);for(r=0;rp?p:d;}B.s=function(d,n,p){p=r(p,0,1);return d+p*(n-d);};B.o=r;B.fixed=function(d,n){var p=Math.pow(10,n);return ~~(d*p)/p;};return B;}({});e.Utils=function(B){B.v=function(){for(var d=new Date,n=[d.getMonth()+1,d.getDate(),d.getFullYear()],d=[d.getHours(),d.getMinutes(),d.getSeconds()],p=1;3>p;p++)10>d[p]&&(d[p]="0"+d[p]);return "["+n.join(Q)+" "+d.join(":")+"]";};return B;}({});Date.now||(Date.now=function(){return (new Date).getTime();});var U="storeObjectInfo",n0={context:I,defaultProvider:W,loginIntent:"0",userInfo:{socialToken:I,tokenExpires:X4a.X,level:X4a.X,xp:X4a.X,xpNeeded:X4a.X,name:X4a.X,picture:X4a.X,displayName:X4a.X,loggedIn:"0",socialId:X4a.X}},z=e.defaultSt=n0;e.storageInfo=z;e.createDefaultStorage=c1;e.updateStorage=k0;e.checkLoginStatus=function(){H==z.loginIntent&&(o0(),L0(z.context));};var o0=function(){e.MC.setProfilePicture(z.userInfo.picture);e.MC.setSocialId(z.userInfo.socialId);};e.logout=function(){z=n0;delete e.localStorage[U];e.localStorage[U]=JSON.stringify(n0);k0();Q0();D.cache.sentGameServerLogin=!1;delete D.cache.login_info;q(N).attr(t0,"0");q(N).attr(V,"0");q(".timer").text(X4a.X);q(u0).hide();q(v0).show();q("#user-id-tag").text(X4a.X);q(".shop-blocker").fadeOut(100);MC.doLogout();MC.reconnect();};e.animateAccountData=T;e.toggleSocialLogin=function(){q(F0).toggle();q("#settings").hide();q(E0).hide();MC.showInstructionsPanel();};e.toggleSettings=function(){q("#settings").toggle();q(F0).hide();q(E0).hide();MC.showInstructionsPanel();};D.account=function(B){function r(){}function F(d,n){if(I==E||E.id!=n.id)E=n,I!=e.ssa_json&&(e.ssa_json.applicationUserId=X4a.X+n.id,e.ssa_json.custom_user_id=X4a.X+n.id),X4a.a0!=typeof SSA_CORE&&SSA_CORE.start();}var E=I;B.init=function(){D.core.bind("user_login",F);D.core.bind("user_logout",r);};B.setUserData=function(d){I0(d);};B.setAccountData=function(d,n){var p=q(N).attr(V,H);z.userInfo.xp=d.xp;z.userInfo.xpNeeded=d.xpNeeded;z.userInfo.level=d.level;k0();p&&n?T(d):(q(f0).text(d.level),q(S).text(d.xp+Q+d.xpNeeded+c0),q(d0).css(e0,(88*d.xp/d.xpNeeded).toFixed(2)+"%"));};B.m=function(d){T(d);};return B;}({});var S0=0,T0=!1,R0=!1;e.fbAsyncInit=function(){e.FB.init({appId:EnvConfig.fb_app_id,cookie:!0,xfbml:!0,status:!0,version:"v2.2"});T0=!0;J0();};var B0=!1;(function(B){var r="initialized";function F(){var d=document.createElement("script");d.type="text/javascript";d.async=!0;d.src="//apis.google.com/js/client:platform.js?onload=gapiAsyncInit";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(d,n);G=!0;}var E={},G=!1;e.gapiAsyncInit=function(){q(E).trigger(r);};B.google={g:function(){F();},f:function(n,p){e.gapi.client.load("plus","v1",function(){console.log("fetching me profile");gapi.client.plus.people.get({userId:"me"}).execute(function(d){p(d);});});}};B.j=function(d){G||F();X4a.a0!==typeof gapi?d():q(E).bind(r,d);};return B;})(D);J=function(F){function E(d){e.MC.doLoginWithGPlus(d);D.cache.login_info=[d,R];e.MC.showInstructionsPanel(!0);}function G(d){z.userInfo.picture=d;q(s0).attr("src",d);}var P=!1,M=!1,K=I,Z={client_id:EnvConfig.gplus_client_id,cookie_policy:"single_host_origin",scope:"profile email"};F.a={c:function(){return K;},init:function(){var d=this;D.j(function(){e.gapi.ytsubscribe.go("agarYoutube");P=!0;d.b();});},b:function(){if(1!=M&&0!=y0&&0!=P){M=!0;var n=z&&H==z.loginIntent&&R==z.context,p=this;e.gapi.load("auth2",function(){K=e.gapi.auth2.init(Z);K.attachClickHandler(document.getElementById("gplusLogin"),{},function(d){console.log("googleUser : "+d);},function(d){console.log("failed to login in google plus: ",JSON.stringify(d,void 0,2));});K.currentUser.listen(_.bind(p.i,p));n&&1==K.isSignedIn.get()&&K.signIn();});}},i:function(n){if(K&&n&&K.isSignedIn.get()&&!B0){B0=!0;z.loginIntent=H;var p=n.getAuthResponse(),B=p.access_token;e.c=p;console.log("loggedIn with G+!");var r=n.getBasicProfile();n=r.getImageUrl();void 0==n?D.google.f(p,function(d){d.result.isPlusUser?(d&&G(d.image.url),E(B),d&&(z.userInfo.picture=d.image.url),z.userInfo.socialId=r.getId(),o0()):(alert("Please add Google+ to your Google account and try again.\nOr you can login with another account."),e.logout());}):(G(n),z.userInfo.picture=n,z.userInfo.socialId=r.getId(),o0(),E(B));z.context=R;e.updateStorage();}},h:function(){K&&(K.signOut(),B0=!1);}};return F;}(D);e.gplusModule=J;var Q0=function(){D.a.h();};e.logoutGooglePlus=Q0;e.getStatsString=e1;e.twitterShareStats=function(){e.open("https://twitter.com/intent/tweet?text="+e.getStatsString("tt_share_stats"),"Agar.io","width=660,height=310,menubar=no,toolbar=no,resizable=yes,scrollbars=no,left="+(e.screenX+e.innerWidth/2-330)+",top="+(e.innerHeight-310)/2);};e.fbShareStats=function(){var d=e.i18n("fb_matchresults_title"),n=e.i18n("fb_matchresults_description"),p=e.getStatsString("fb_matchresults_subtitle");e.FB.ui({method:"feed",display:"iframe",name:d,caption:n,description:p,link:r0,u:"http://static2.miniclipcdn.com/mobile/agar/Agar.io_matchresults_fb_1200x630.png",l:{name:"play now!",link:r0}});};e.fillSocialValues=function(d,n){1==e.isChrome&&R==e.storageInfo.context&&e.gapi.interactivepost.render(n,{contenturl:EnvConfig.game_url,clientid:EnvConfig.gplus_client_id,cookiepolicy:r0,prefilltext:d,calltoactionlabel:"BEAT",calltoactionurl:EnvConfig.game_url});};q(function(){"MAsyncInit" in e&&e.MAsyncInit();q("[data-itr]").each(function(){var d=q(this),n=d.attr("data-itr");d.html(e.i18n(n));});});}}}})(window,window.jQuery); (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-76837510-1', 'auto'); ga('send', 'pageview');
