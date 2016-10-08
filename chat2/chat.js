(function($, undefined) {
    $.fn.boxup = function() {
        var parametros = {capa: '.error',cerrar: true,c: null};
        var error;
        $.boxup = function(opciones) {
            $.op = $.extend({}, parametros, opciones);
            var metodos = {mostrar: function() {
                    $.boxup.mostrar();
                },cerrar: function() {
                    $.boxup.remover();
                }};
            return metodos;
        };
        $.boxup.mostrar = function() {
            if (!$('.boxcon').length)
                $.boxup.crear();
        };
        $.boxup.crear = function() {
            var fond = '<div class="bgBox" style="display:block;"></div>', cont = '<div class="boxcon" style="display:none"><div id="boxconbr">' + ($.op.cerrar ? '<a href="" class="boxcerrar" onClick="$.boxup().cerrar();return false;"></a>' : '') + $.op.c + '</div></div>';
            $('body').prepend(fond + cont);
            $('.boxcon').css({'display': 'block'});
            $('.boxcon').css({opacity: '0.0'});
            $('.boxcon').animate({opacity: '1'});
            $('.bgBox').css({opacity: '0.0'});
            $('.bgBox').animate({opacity: '1'});
            $('body').css('overflow','hidden');
            var ancho_venta = $(window).width(),
                alto_ventana = $(window).height();
            var radio_anch = $('#temp_html').width()+30,
                radio_alto = $('#temp_html').height()+30;
            var auto_left = (ancho_venta/2) - ( radio_anch/2),
                auto_top = (alto_ventana/2) - ( radio_alto/2);
            if(radio_anch >= ancho_venta || radio_alto >= alto_ventana) {
                $('.boxcon').css({'left':0,'top':0,'width':'100%','height':'100%','overflow':'hidden','overflow-y':'auto'});
            }else{
                $('.boxcon').css({'left':auto_left,'top':auto_top,'width':radio_anch});
            }
        };
        $.boxup.remover = function() {
            $('.bgBox, .boxcon').animate({opacity: '0.0'}, 500, function() {
                $(this).remove();
                $('body').css('overflow','auto');
            });
        };
        return $.boxup();
    }();
})(jQuery);


var cargar_datos = function(o){
  window.location.reload(true);
}

$(document).ready(function() {

    $(document).on('click','#login a',function(){
      var link = $(this).attr('href');
      window.open(link,'','width=800,height=600');
      return false;
    });


    var altov = $(window).height();
    $("#cboxmain").height(altov - 75);
    $( window ).resize(function() {
        $("#cboxmain").height(altov - 75);
    });

});