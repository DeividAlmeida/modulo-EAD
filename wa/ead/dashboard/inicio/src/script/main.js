const back = document.getElementById('back');
const menu = document.getElementById('menu');
const profile = document.getElementById('profile');
const profile_menu = document.getElementById('profile-menu');
    curso = () => {
        val.status = 'curso';
        val.curso = 'Mui-selected';
        val.geral ='';
        back.style.width = '0';
        menu.style.display = 'none'
    }
    geral = () => {
        val.status = 'geral';
        val.curso = '';
        val.geral = 'Mui-selected';
        back.style.width = '0';
        menu.style.display = 'none'
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
    window.onload = () => {
        var tamanho = parseInt(document.getElementsByClassName('curso').length*325)
        document.body.style.height= tamanho+'px';
    }
    esconder = () =>{
        back.style.width = '0';
        menu.style.display = 'none'
    }
    abrir = () =>{
        back.style.width = '325px';
        menu.style.display = 'block'
    };
    perfil = () =>{
        profile.style.visibility = "visible";
        profile_menu.style.visibility = "visible";
    }
    perfil_menu = () =>{
        profile.style.visibility = "hidden";
        profile_menu.style.visibility = "hidden";
    }