function Tabela(id, pag){
    var UrlPainel = $('#Tabela'+id).attr("data-painel");
    $.ajax({
        type: "GET",
        cache: false,
        url: UrlPainel+'wa/tabela_de_precos/tabela_de_precos.php?id='+id+'&pag='+pag,
        beforeSend: function (data){
            //$("#SimpleSlideWA"+id).html("<center><br><img src=\""+UrlPainel+"wa/css_js/loading.gif\"><br>Carregando...<br></center>");
        },
        success: function (data) {
            jQuery('#Tabela'+id).html(data);
        },
        error: function (data) {
            setTimeout(function(){ Tabela(id, pag); }, 5000);
        },
    });
}
