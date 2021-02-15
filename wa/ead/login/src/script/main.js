val.ver = (a) =>{ val.status = a};
document.getElementsByClassName('text2')[2].addEventListener('click', ()=>{
    val.status = 'reset'
})
/*document.getElementsByClassName('text2')[3].addEventListener('click', ()=>{
window.location.href = origin+'wa/ead/cadastro'
})
document.getElementsByClassName('ds')[0].addEventListener('click', ()=>{
    let senha = document.getElementsByClassName('das')[0].value;
    let a  = senha.match(/[0-9]/);
    let b  = senha.match(/[A-Z]/);
    let c = senha.length > 5;
    if(a && b && c){

        }else{
            alert(a,b,c)
        }
    })*/
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
    form.append("manter", document.getElementById('manter').checked);
    fetch (origin+'wa/ead/apis/autentica.php',{method: "POST", body: form}).then(x => x.text()).then(data =>{
        if(data == 1){
            window.location.href = origin+'wa/ead/dashboard/inicio/?status=curso&posicao=avancar'
        }else{
            swal("ERRO!", data, "error"); 
        }
    });
}
recupera = ()=>{
    var a = new FormData();
    a.append('email',document.getElementsByClassName('recupera')[0].value)
    fetch(origin+'wa/ead/apis/recupera.php',{
        method:'post',
        body: a
    }).then(dt => dt.text()).then(data=>{
        if(data == 1){
            
        }else{
            swal("ERRO!", data, "error"); 
        }
    })
}