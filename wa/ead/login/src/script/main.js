val.ver = (a) =>{ val.status = a};
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
valida = () =>{
   var form = new FormData();
   form.append("email", document.getElementById('login-email').value);
   form.append("senha", document.getElementById('login-password').value);
    fetch (origin+'wa/ead/apis/autentica.php',{method: "POST", body: form}).then(x => x.text()).then(data =>{
        if(data == 1){
            window.location.href = origin+'wa/ead/dashboard/inicio/?status=curso&posicao=avancar'
        }else{
            alert(data)
        }
    });
}