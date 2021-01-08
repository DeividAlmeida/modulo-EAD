visivel = (a) =>{
    const icon = document.getElementById('olho');
    const campo = document.getElementById('login-password');
    if(a == 'visibility'){
        icon.innerHTML = 'visibility_off';
        campo.type = 'text'
    }else{
        icon.innerHTML = 'visibility';
        campo.type = 'password'
    }
}
box = (a) => {
    const view = document.getElementById('switch');
    if(a == true){
        view.innerHTML = 'checkbox'
    }else{
        view.innerHTML = ''
    }
}