let jss78 = document.getElementById('jss78');
let container = document.getElementById('container');
let progresso = document.getElementById('progresso');
let nav = false;
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
        jss78.style.height = '63px';
    }
}