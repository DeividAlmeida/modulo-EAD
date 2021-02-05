window.onload = () => {
    if(screen.width > 1300){
        var tamanho = parseInt(document.getElementsByClassName('curso').length/3)*325
    }else{
        var tamanho = parseInt(document.getElementsByClassName('curso').length*325)
    }
    document.body.style.height= tamanho+'px';
    for(let i = 0 ; i < val.cursos.length; i++){
        val.cursos[i][0].professor = JSON.parse(val.cursos[i][0].professor);
    }
    
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
    