!function(o,n,i){var t=function(n,e){var f=function(){function o(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}return o()+o()+"-"+o()+"-"+o()+"-"+o()+"-"+o()+o()+o()};if(!(!1 in o))if("default"===Notification.permission)Notification.requestPermission(function(){n&&t(n,e)});else{if("granted"===Notification.permission){if(!n)return i;opt=e||{},opt.tag=f();var c=new Notification(n,opt);return c.onclick=function(){opt.onclick&&opt.onclick(this),this.close()},c.onclose=function(){opt.onclose&&opt.onclose(this)},c}"denied"===Notification.permission&&e&&e.ondenied&&e.ondenied(this)}};"object"==typeof module&&module&&"object"==typeof module.exports?module.exports=t:(o.notify=t,"function"==typeof define&&define.amd&&define("notify",[],function(){return t}))}(window,document);

var youtube;
var audio = new Audio();
var locutor = 'AUTO DJ';

function onYouTubePlayerAPIReady() {
    youtube = new YT.Player('video', { events: { 'onReady': onPlayerReady,'onStateChange': onPlayerStateChange }});
}
function onPlayerStateChange(event) {
	youtube.setPlaybackQuality(calidad);
	youtube.setVolume( 0 );
}
function onPlayerReady(){
    youtube.addEventListener('onStateChange', function(e) {
        if( e.data == 1 ){
            youtube.playVideo();
        }else if( e.data == 0 ){
            youtube.playVideo();
        }
    });
    youtube.playVideo();
    youtube.setVolume( 0 );
    youtube.setPlaybackQuality(calidad);
}

function playAudio(src) {
    audio.src = src;
    audio.load();
    audio.volume = 1;
    audio.addEventListener('canplay', function() {
      audio.play();
    });
  }


var r_titulo;

  var TempHora = 0;
  var Carga = function() {
    var fecha = new Date(), minuto = fecha.getMinutes(), hora = fecha.getHours();
    if(TempHora != minuto){
      $.post("./ajax.relax.php", { cmd: "radio" },function(data){
       	$('.title span').text(data.title);
        $('.locutor').text(data.locutor);
        $('.avatar img').attr( "src", data.imagen);
      	$('.avatar a').attr( "href", data.perfil);

        if(locutor != data.locutor){
          notify('EN VIVO', {
              body: 'Conectado: '+ data.locutor,
              icon: 'http://www.relaxradio.fm/logo.png',
              onclick: function(e) {}, // e -> Notification object
              onclose: function(e) {},
              ondenied: function(e) {}
            });
          locutor = data.locutor;
        }

        if(r_titulo != data.title){
          notify('ESTAS ESCUCHANDO', {
              body: 'Canción: '+ data.title,
              icon: 'http://www.relaxradio.fm/logo.png',
              onclick: function(e) {}, // e -> Notification object
              onclose: function(e) {},
              ondenied: function(e) {}
            });
          r_titulo = data.title;
        }


      }, "json");
    TempHora = minuto;
    }
  };

var refres_cont = function()  {
    var counter = 1;
    var evt = setInterval(function() {
        Carga();
        if(counter > 10) 
            clearInterval(evt);
    }, 1000);
}



$( document ).ready(function() {

var altov = $(window).height();
var anchv = $(window).width();



if( anchv < 750 ){
	$("#sidebar-chat, #sidebar-wrapper").height(altov - 50);
	$( window ).resize(function() {
		$("#sidebar-chat, #sidebar-wrapper").height(altov - 50);
	});
}


playAudio(radioIP);
refres_cont();
notify();




$(document).on('click','.jp-play',function(){
	var iten = $( this ).find('i');
	if( iten.hasClass('glyphicon-pause') ){
		audio.pause();
		iten.removeClass('glyphicon-pause').addClass('glyphicon-play');
	}else{
		audio.play();
		iten.removeClass('glyphicon-play').addClass('glyphicon-pause');
	}
});

$(document).on('click','.jp-mute',function(){
	var iten = $( this ).find('i');
	if( iten.hasClass('glyphicon-volume-up') ){
		audio.muted = true;
		iten.removeClass('glyphicon-volume-up').addClass('glyphicon-volume-off');
	}else{
		audio.muted = false;
		iten.removeClass('glyphicon-volume-off').addClass('glyphicon-volume-up');
	}
});

$(document).on('click','.jp-repeat',function(){
	playAudio(radioIP);
});



$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("menu");
});
$("#chat-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("chat");
});

});