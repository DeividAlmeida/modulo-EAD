let jss78 = document.getElementById('jss78');
let container = document.getElementById('container');
let progresso = document.getElementById('progresso');
let concluidas = document.getElementsByClassName('chart-text');
let circulo = document.getElementsByClassName('chart-circle-fill');
let texto = document.getElementsByClassName('course-progress-text');
let barra = document.getElementsByClassName('jss204');
let t_c = 0 ;
let t_t = 0;
let nav = false;
window.onload = () => {
    document.body.style.height= '800px';
        let count = 0;
        for(let i= 0; i < val.modulos.length; i++){
            val.aulas[val.modulos[i].id].forEach((a, b)=>{
                val.aulas[val.modulos[i].id][b].tag = count +=1;
            })
        }
}
anterior = () => {
   val.id_aula > 1 ? val.id_aula = val.id_aula - 1: val.id_aula = val.id_aula ;
    for(let i= 0; i < val.modulos.length; i++){
        val.aulas[val.modulos[i].id].forEach((a, b)=>{
             if(val.aulas[val.modulos[i].id][b].tag == val.id_aula){
                return val.idx = val.aulas[val.modulos[i].id][b];
            }
        })
    }
}; 
proximo = (a) => {
   val.id_aula < a ? val.id_aula = val.id_aula + 1: val.id_aula = val.id_aula ;
    for(let i= 0; i < val.modulos.length; i++){
        val.aulas[val.modulos[i].id].forEach((a, b)=>{
             if(val.aulas[val.modulos[i].id][b].tag == val.id_aula){
                return val.idx = val.aulas[val.modulos[i].id][b];
            }
        })
    }
}
navegar = () =>{
    nav ?  nav = false : nav = true
    if(nav){  
        val.nav = 'open'; 
        val.main_width = 'false'; 
        val.icon = 'opened'; 
        val.texto = 'Esconder navegação'; 
        progresso.style.display = 'flex';
        container.style.display = 'block';
        jss78.style.height = '100%';
        
    }else{ 
        val.nav = 'close'; 
        val.main_width = 'without-sidemenu'; 
        val.icon = ''; 
        val.texto = 'Mostrar navegação';
        progresso.style.display = 'none';
        container.style.display = 'none';
        jss78.style.height = '75px';
    }
    for(z=0;z< val.modulos.length; z++){
        let contar = 0;
        for(i=0; i<val.aulas[val.modulos[z].id].length;i++){
            ++t_t
            if(val.concluidos[id_curso+val.aulas[val.modulos[z].id][i].tag] != null){ 
                ++t_c
                ++contar
                let cento = (contar/val.aulas[val.modulos[z].id].length)*100;
                concluidas[z].innerText = contar;
                circulo[z].setAttribute('stroke-dasharray', cento+' 100')
            }
            
        }
    }
    barra[0].style.width = (t_c/t_t)*100+'%'
    texto[0].innerText = (t_c/t_t)*100+'% Concluído'
}
document.getElementById('salvar').addEventListener('click', ()=>{ 
    let valor = document.getElementById('notes-new-input').value;
    val.notas[id_curso+val.id_aula]  = valor;
    let save = new FormData;
    save.append('0', JSON.stringify(val.notas))
    let post = new XMLHttpRequest;
    post.open('POST',origin+'wa/ead/apis/notacoes.php?salvarnotas&id='+id_aluno);
    post.send(save)
    post.onload = function(){
    swal("Salvo!", "Anotação salva com sucesso!", "success");                              
} 
})

document.getElementsByClassName('btn-conclusion')[0].addEventListener('click', ()=>{
    val.concluidos[id_curso+val.id_aula]  = '1';
    let concluido = new FormData;
    concluido.append('0', JSON.stringify(val.concluidos))
    fetch(origin+'wa/ead/apis/concluido.php?id='+id_aluno,{
        method: 'POST',
        body: concluido
    }).then(dt => dt.text()).then(data =>{
        if(data == 1){
            alert('foi')
        }else{
            alert(data)
        }
    })
    
})