let time = []

for(let i = 0; i< val.cursos.length; i++){
    switch(val.cursos[i][0].tempo){
        case '1 mês':
            time[i] = 30
            break
        case '2 meses' :
            time[i] = 60
            break
        case '3 meses' :
            time[i] = 90
            break
        case '4 meses' :
            time[i] = 120
            break
        case '5 meses' :
            time[i] = 150
            break
        case '6 meses' :
            time[i] = 180
            break
        case '1 ano' :
            time[i] = 365
            break
        case '2 anos' :
            time[i] = 730
            break
        case 'Vitalício' :
            time[i] = 1610394121443
            break
    }
    
}
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

nextle =(a, b, c) =>{
    window.location.href=origin+'wa/ead/dashboard/curso/?posicao=voltar&id='+b+'&direto='+a+'&idxs='+c
}