window.onload = () => {
    var tamanho = parseInt(document.getElementsByClassName('curso').length*325)
    document.body.style.height= tamanho+'px';
}
view = (a) =>{ 
    let icone = document.getElementById('iview');
    if(a == 'view_module'){
        val.lista = 'grid';
        icone.innerHTML = 'view_list'
    }else{
        val.lista = 'list';
        icone.innerHTML = 'view_module'
    }
}
    
    