<?php session_start(); ;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat RelaxRadio</title>

<style>
html, body {margin:0;padding:0;}
* {
    box-sizing: border-box;
    outline: none;
}
body {
    font: 13px MuseoSans,Helvetica,Arial,sans-serif;
    font-weight: 300;
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    cursor: default;
    color: #292A2B;
}
#nologin {
    background-image: url('8.jpg');
    border: 1px solid #e9eaed;
    text-align: center;
    padding: 35px;
    position: absolute;
    height: 100%;
    width: 100%;
    display: table;
}
#nologin .chat {
    display: table-cell;
    vertical-align: middle;
    text-align:center;
    font-size: 14px;
}
#nologin .holo {
content: '\f1d7';
    display: block;
    font-family: 'FontAwesome';
    font-size: 210px;
    text-shadow: 0 1px 0 #DBDBDB;
    margin-bottom: 20px;
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    font-size: 14px;
}
#nologin .chat:before {
    color: #E7E7E7;
    content: url(logoapp.png);
    display: block;
    font-family: 'FontAwesome';
    font-size: 200px;
    text-shadow: 0 1px 0 #DBDBDB;
    margin-bottom: 20px;
}
#nologin .fbboton{
    margin-top: 20px;
}
#cboxdiv {
    background: #FFF;
    border: none;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
}
#cboxmain, #cboxform {
    border: none;
    background: #FFF;
    width: 100%;
    position: absolute;
    left: 0px;
}
#cboxmain {
    height: calc(100% - 75px);
    top: 0px;
}
#cboxform {
    height: 75px;
    bottom: 0px;
}

.bgBox { position: fixed; background: rgba(255, 255, 255, 0.75); height: 100%; width: 100%; z-index: 100; }
.boxcon {  position: fixed; z-index: 999999; background: #FFF; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: 1px solid #C7C7C7;}
.boxcon .boxcerrar { position: absolute; top: 3px; right: 3px; height: 16px; width: 16px; z-index: 15; text-align: center; color: #000; font-weight: bold; font-size: 15px; background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAmVBMVEUAAADhWEziV0z/QEDiV0zjVkxEREBEREBEREDWQUDhVkxlQ0BEREBEREC7QUDfWEzIU0paRECpQkDaVkvgVkzjV0zTVEt3Q0DMU0phQ0DFSERXREDAPz5ZQD1EREBEREDIU0pEREDgVkzMVErhV0zhV0zSVkvEVEriV0zgV0zSVUvhV0zPVUvfU0rfUknbTEbTQD/TQ0HZTEZSoOhaAAAAKHRSTlMAVKcE+6sBCQoFrBUUEgZVtR4Hqq2ssQ60GMEiziQaArYDrLWn+1pg4fVEPAAAAAlwSFlzAAAAbwAAAG8B8aLcQwAAALJJREFUGNM9j+cSgkAMhHO0o0qVIipFwBzY3//hzMUZ70/uyyS7GwAQhgn8TEPoIiy0TUe60rPREsyIfhBGO5s+VgwGFbUmaaYZtxxMm/i2FnvNqqxIyidWeH8Q140EcIKEGPH5eh/ayAGQYVrocfwcT+eObN0o++2vfTroHJL9WHnkhN6fFSUEbav50rMydQzmuk1HVp44OvF54NF50cdsZRN1vDxfXVKN80o6fP60uPILpR8XPMAEW8MAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDMtMDRUMTc6NDc6NTUtMDY6MDAKLBQ2AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE0LTAzLTA0VDE3OjQ3OjU1LTA2OjAwe3GsigAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII='); }
#boxconbr { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; padding: 20px; }

#login p { padding: 0px; margin: 5px; text-align: center; }
#login a { display: block; font-size: 15px; padding: 15px 8px; padding-right: 55px; border: 1px solid #5672B4; color: #FFF; cursor: pointer; background: #3B5998; background-position: 140px center; background-repeat: no-repeat; text-decoration: none; font-weight: bold; margin-bottom: 5px; }
#login a.facebook {
background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAiCAYAAAA6RwvCAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpFQUQ1ODdBQzFDMjQxMUUyQTI5REIyMEZDRjY3N0Q0OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpFQUQ1ODdBRDFDMjQxMUUyQTI5REIyMEZDRjY3N0Q0OSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjExQTUxMUZGMUMyMzExRTJBMjlEQjIwRkNGNjc3RDQ5IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjExQTUxMjAwMUMyMzExRTJBMjlEQjIwRkNGNjc3RDQ5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nMwFiAAAAydJREFUeNrEWDlsE0EUnZ2dXdtx1hYEUSAkCBRIkIKzAAVMCUlEQ4GAgqNKQwqEUiAUBBENBQ0VBUdDOhBFiFOSUCJEE0ouCYmjCPhOPLtr/nMcEzvGnnHW5EuW7dmZ99/++deM0X/mIVMVbvDNlmUNCMtKmKbZZ3Jzu2EYMTwrlUppz/c+e54350o5I1057fv+d1VsoTRJWEcj4fCoZdkn/rWGCG0SpsDnYMgOXaQhT8pisrCwcNd15euWL9n0ITd3ON3OZMyJzRKJIVXiFTGxBmuBAay2iNh26Gw8Fn9HYINsjQIMYBHmOS0ikXBkrDvaPbG8/0EIsAjzKbCViNDE65FI1y3WIQE26bjRlAi2gybeYR0W0jEOXQ2JcM57o13RB+w/CXRB56rwpQf3aR8dXUDTNNiRfVvYrt6NLObY1fF7j9628hkHOjPZzFCViBCiv53oEERi5MJ+lji0tWZ85s1X5WhCjkKe4RUHHW3HvIfJEvUkdCUcDl8rv9RS2rZPtgOye2dPjRWePJ9jqUyR8r06hm3ZA+AgUDs0M+Zfh4taNf/nfy+2A1PmwFHA2DoLcTguUEV1F169fKDleKuoqY08c49AKW/nLeqddOV/+IpWCuBmLzcM5gRt6p/zBWbo1SHHODX8Ah5m6yjaEA+Vvy+d7qtaAlHz+NmSJbI5yaTr60AWBXVWGWLUo7PqV2pRa7yVgAOn9u7TekcNWkxOPeb7ToDblqlOhPpcTo3uq6BJIAKK0lOej2abU7edxO9AE5TgOtNd4jDFqeX/Qd329Hr5B3SDQ5k6Wv4gwX1fveot6y4TQT9AzF4GRcT1fFVrTC2feapVN5fPj8Rj1jHdLk21CWqUO0jnlVWtou97H3P53DBaflUwncJWL9AFnQ27+GJxcaJQyI912kFJx03oanquKSwUxjGxkyRIx22lkx4mZnPZ87SP2aAIAAuYjUg0PfvCdKl0am8Q0YToAFb9dijfBpAzfcC5I51JJwhsEmVBJ51gDdYSxiCw1nw/QrE+m8nK2cpFzeCKi5ptFO7xiulTVEW/lC9qaL6UMkkZ85sq6z8CDAAI/m+FI7ADVgAAAABJRU5ErkJggg==');
background-position: 204px center;
padding-left: 50px;
}
#login a.twitter {
background-color: #00AEE8;
border-color: #49C9FF;
background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAiCAYAAAA6RwvCAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxMUE1MTFGRDFDMjMxMUUyQTI5REIyMEZDRjY3N0Q0OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxMUE1MTFGRTFDMjMxMUUyQTI5REIyMEZDRjY3N0Q0OSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjExQTUxMUZCMUMyMzExRTJBMjlEQjIwRkNGNjc3RDQ5IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjExQTUxMUZDMUMyMzExRTJBMjlEQjIwRkNGNjc3RDQ5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+m78VTAAABF9JREFUeNq8WEtvE1cUPp4Zv8d2DMQRgYh3CoUihFR10RYQSJSG7FhR/gLqpoAAFVCLkBAsqEAs2KKWTdm1SVihQgHxWBTxKAkQSAERcEIcx68Zj2fS73iISZzxzCROOJIly/fqnO+e53fsab34jtyKIIiJUMDXJvu8G4NeaU1ApMWih6J8po/SiKJTX0ErPcgWtSt5pXjJMPQ3bnV73ADx+/xfJ+TgvoaAsM1DJLlRPApsw4rRlcwWTqhF9e+6gEiitHR+TD4dDwjbqQ5JKUZHfzr7fUkvPavp7VoH4WBgZ2si+k+9IFhYB+uCzu+mBGROJHx4WTx0QXof/5kQ1gWdv7FuV0DisnxwYcT/E82SsO54JPyjLRAOR0vUd4xmWVoi/qNsyxKIKEpLFjWEztFHErbFNiuhG/vSHJPPII6RepQ3h4i2JIiWyyhf1O+jDNHlJNGAYp4ngkSagSpSyzkTYZsvh4bbK+Xr93m/+mReZFKttzcTPc0RdaedQXw+l2j3MqKQOPH3tEb0J9pac4BoPoAc7ybKaR/OewZzG7jPlEPTKIf3Te6iRN80Ee1txQsd/MQvtQLBEvMS7Woh+hJAb6JltcoTzxvl4B7THto26vxbi3IjEWCiCN6hVUQbE7WBtDVZg6iWHQvKHbe6x7QxBoFnh1Xb1nTTrSxshF98AIA+jSGeVXeXys4gFOTGqSdEd1NVrR22GYPEA6zGrKArAwhL+MNv6xvMD+fNPeTNYyTjWySi6HEG0pMluj9sfQYMmySeolaHHJYbiOkXc4jWVPVXBjcG0Bid7G4r0W0uAcNqiUe5ZUsGkB+QqILHNCbUeLXgcVfa7xQbICItEcQavUMtEWXwWSm7N2Ynz/M2PAcYBJqcexW5+Mqd252kBCXdGQfSBbfXvNKHBPvlKVFSrQ8QJ3eyUPucMQgFnZ7bKXmI6rg2aIKZrvzx2v4hTDEFcMyHToq2omE1+acH4g76xm0HNpoHzxVAdP+yu5QuohEhPMPa1EHA2/TrC+d7TLYFsO0uuK1kd/EeXrX/AdHvSN7enDsQHIqzYKiv8473SsDQKYDyvwXbvuSmD1yHi1XDHZCzvUS3Bp3vsW3GUJ4xTPnjgXD7+AtzA+bA86LAF2C6ro2aXdYr2Ct+A8DnEY47Ltcltl0hRswHUkqwYzxj5/mxuRFTt7Hc+RxlCLl0GbOpox8xd5lPWDM6x3aeyl7DOwwo/91qljYPnvkME3cFZstCMLAo+AXjKo6a07kPOfPviNmwstqUmlzmcXJk3diuM2HB4r2DKf/H4Ky9qfyuXEG5YMni+eBlRj082yBeZdQj40FY7jWpTO4oX5xNEEOZ3M+uNj2+yK4Dh8jOFADWxTqtQNjuvuy6noH0Ol6g6wXB1cG6qsMxnb8lNiTk4N4GkGyPWTRuOquBZtWJPnESJXp1Rv4fqfqjZjvz3BAopl+kRSj32PtyTKs6/ccDLFfUruZVtUvXjX63uv8XYAAzn70Q14lZtQAAAABJRU5ErkJggg==');
background-position: 204px center;
padding-left: 50px;
}

</style>
<meta name="robots" content="noindex, follow">
<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript">
  /*
  Web: CHAT
  Desarrollado por: Luis Gustavo ( www.fb.com/grunst3r )
  */
</script>
<script type="text/javascript" src="chat.js"></script>
</head>
<body>
<?php

if(!empty($_SESSION['id'])){
$u_id = $_SESSION['id'];
$u_nombre = $_SESSION['nombre'];
$u_red = $_SESSION['red'];
$u_foto = $_SESSION['imagen'];
$u_permiso = 1;

$name = $u_nombre;
$avatar_url = $u_foto;
$profile_url = 'http://fb.com/'.$u_id;

}else{
    echo '<div id="nologin"><div class="chat">
            Para chatear con los otros usuarios, necesitas ingresar con tu cuenta de Facebook
            <div class="fbboton" id="login"><a class="facebook" href="auth/facebook/indexapp.php">Ingresa al Chat</a></div>
        </div></div>
    ';

    exit();
}

?>

<div id="cboxdiv">
<iframe id="cboxmain" src="http://www4.cbox.ws/box/?boxid=4311370&boxtag=3w4ey7&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4311370" id="cboxmain4-4311370"></iframe>
<iframe id="cboxform" src="http://www4.cbox.ws/box/?boxid=4311370&boxtag=3w4ey7&sec=form&nme=<?php echo urlencode($name)?>&nmekey=<?php echo md5('g0kb1gcfin9a8cea'.$name)?>&pic=<?php echo urlencode($avatar_url)?>&lnk=<?php echo urlencode($profile_url)?>&ekey=<?php echo md5("g0kb1gcfin9a8cea".chr(9).$avatar_url.chr(9).$profile_url)?>" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4311370" id="cboxform4-4311370"></iframe>
</div>

</body>
</html>