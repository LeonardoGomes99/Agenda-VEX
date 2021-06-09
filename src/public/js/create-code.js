var CepNumber = "";
var InputArray = {};



function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua' + CepNumber).value = (conteudo.logradouro);
        document.getElementById('bairro' + CepNumber).value = (conteudo.bairro);
        document.getElementById('cidade' + CepNumber).value = (conteudo.localidade);
        document.getElementById('estado' + CepNumber).value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
};

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');



    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua' + CepNumber).value = "...";
            document.getElementById('bairro' + CepNumber).value = "...";
            document.getElementById('cidade' + CepNumber).value = "...";
            document.getElementById('estado' + CepNumber).value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};




$(document).ready(function() {
    $('.form-control.inputCreate.tel, .form-control.inputCreate.cel').mask('+00 00 00000-0000');

});

$(".material-icons").click(function() {
    CepNumber = (this.id);
    document.getElementById('cep').value = "";
});

$("#ConfirmSave").click(function() {
    GetAllInputValues();
    
});

function GetAllInputValues() {

    $('.form-control.inputCreate').each(
        function(index) {
            var input = $(this);
            if (input.attr('name').includes('telefone') || input.attr('name').includes('celular')) {
                inputValue = input.val().replace(/[+]|[-]|[ ]/g, "");
                InputArray[input.attr('name')] = inputValue.trim();;
            } else {
                InputArray[input.attr('name')] = (input.val().trim());
            }
        }
    );

    ValidateData();
}

function ValidateData() {
    if (InputArray['nome'] === "" || InputArray['email'] === "" || InputArray['telefone1'] === "" || InputArray['celular1'] === "") {
        ErrorMessage();
    } else {
        sendToAPI();
    }

};


function sendToAPI() {
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/store",
        data: {
            data: InputArray
        },
        success: function(res) {
            window.location=res.url;
        },
        error: function(data) { 
            ErrorMessage2();
        }   
    });
}


function ErrorMessage() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: 'Por Favor Preenche os Campos: <br>' +
            '<b>Nome</b>, <b>Email</b>, <b>Telefone 1</b>, <b>Celular 1</b> <br> ' +
            'para realizar o Salvamento do Contato'
    });
};

function ErrorMessage2() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: 'Ocorreu um Erro, Por Favor Tente Novamente ou mais tarde'					
    });
};