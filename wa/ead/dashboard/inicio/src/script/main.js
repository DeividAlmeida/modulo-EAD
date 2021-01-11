const back = document.getElementById('back');
const menu = document.getElementById('menu');            
    esconder = () =>{
        back.style.width = '0';
        menu.style.display = 'none'
    }
    abrir = () =>{
        back.style.width = '325px';
        menu.style.display = 'block'
    }