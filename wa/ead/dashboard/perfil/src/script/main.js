
let farol = true;
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
document.getElementsByClassName('MuiButtonBase-root')[5].addEventListener('click', ()=>{
    let inputs =  document.getElementsByClassName('perfil')
    let form = new FormData()
    for(let i = 1; i < 6; i++){
    form.append(inputs[i].name,inputs[i].value)
    }
    form.append('imagem',inputs[0].files[0])
    fetch(origin+'wa/ead/apis/perfil.php',{
        method: 'POST',
        body: form
    }).then(dt => dt.text()).then(data =>{
        if(data == 1){
            document.location.reload(true);
        }else{
            alert(data)
        }
    })
})