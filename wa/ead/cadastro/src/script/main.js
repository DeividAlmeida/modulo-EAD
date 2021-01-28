let farol = true;
document.getElementsByClassName('jss101')[0].addEventListener('click', ()=>{ 
    let senha = document.getElementById('campo0')
    let confirma = document.getElementById('campo1')
    let inputs = document.querySelectorAll('input')
    let form = new FormData()
    if(senha.value !=''&& senha.value == confirma.value){
        for(let i = 1; i < 7; i++){
            form.append(inputs[i].name,inputs[i].value)
        }
        form.append('imagem',inputs[0].files[0])
        fetch(origin+'wa/ead/apis/cadastar.php',{
            method: 'POST',
            body: form
        }).then(dt => dt.text()).then(data =>{
            if(data == 1){
                window.location.href = origin+'wa/ead/dashboard/inicio/?status=curso&posicao=avancar'
            }else{
                alert(data)
            }
        })
        val.erro = ''
    }else{
        val.erro = '*senha inválida'
    }
})
visivel = (a) =>{
    const icon = document.getElementById('eye'+a);
    const campo = document.getElementById('campo'+a);
    if(farol == true){
        icon.innerHTML = 'visibility_off';
        campo.type = 'text';
        farol = false;
    }else{
        icon.innerHTML = 'visibility';
        campo.type = 'password';
        farol= true;
    }
}

readURL = (a) =>{
    let url = new FileReader()
    url.onload = (e) => { 
        val.avatar = e.target.result;
    }
    url.readAsDataURL(a.files[0]);
 }