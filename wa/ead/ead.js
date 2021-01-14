frame = (a) => {
    a.style.height = (a.contentWindow.document.documentElement.scrollHeight+200) + 'px';
    let border = document.createAttribute('frameborder');
    let scroll = document.createAttribute('scrolling');
    let widths = document.createAttribute('width');
    border.value = '0';
    scroll.value ='no';
    widths.value = '100%';
    a.setAttributeNode(border);
    a.setAttributeNode(scroll);
    a.setAttributeNode(widths);
}

//LOGIN
//<iframe  height="600px" width="100%" style="border:none;" src="https://www.templateswebacappella.com.br/wacontrol-aula/wa/ead/login/" ></iframe>

//DASHBOARD
//<iframe  height="600px" width="100%" style="border:none;" src="https://www.templateswebacappella.com.br/wacontrol-aula/wa/ead/dashboard/inicio/" ></iframe>

