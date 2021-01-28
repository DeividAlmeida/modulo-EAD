let jss78 = document.getElementById('jss78');
let container = document.getElementById('container');
let progresso = document.getElementById('progresso');
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
}