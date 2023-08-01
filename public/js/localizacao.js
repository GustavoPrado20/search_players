function limpa_cep(){
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meucallback(conteudo){
    if (!("erro" in conteudo)){
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
    }else{
        limpa_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    var cep=valor.replace(/\D/g,'');

    if(cep!=""){
        var valicep=(/^[0-9]{8}$/);

        if(valicep.test(cep)) {
            document.getElementById('bairro').value="Procurando...";
            document.getElementById('cidade').value="Procurando...";
            document.getElementById('uf').value="Procurando...";

            var script=document.createElement('script');

            script.src='https://viacep.com.br/ws/'+ cep +'/json/?callback=meucallback';

            document.body.appendChild(script);
        }else {
            limpa_cep();
            alert("Formato de CEP inválido.");
        }
    }else {
        limpa_cep();
    }
}