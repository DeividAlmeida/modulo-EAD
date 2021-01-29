const back = document.getElementById('back');
const menu = document.getElementById('menu');
const profile = document.getElementById('profile');
const profile_menu = document.getElementById('profile-menu');
curso = (a) => {
    if(a == 'avancar'){
        val.status = 'curso';
        back.style.width = '0';
        menu.style.display = 'none'
    }else{
         window.location.href=origin+'/wa/ead/dashboard/inicio/?posicao=voltar&status=curso'
    }
}
geral = (a) => {
    if(a == 'avancar'){
        val.status = 'geral';
        back.style.width = '0';
        menu.style.display = 'none'
    }else{
        window.location.href=origin+'/wa/ead/dashboard/inicio/?posicao=voltar&status=geral'
    }
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
esconder = () =>{
    back.style.width = '0';
    menu.style.display = 'none'
}
document.getElementsByClassName('MuiListItem-button')[0].addEventListener('click', ()=>{
    window.location.href = origin+'wa/ead/dashboard/perfil'
})
