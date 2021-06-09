var obj = [];
var JsonData = [];
var objPopulateModal= {};
var InputArray = {};
var MainId="";
var req = [];




$(document).ready(function() {

    

    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/get',
        success: function(data) {
            obj = data;
            Organize();
        },
        error: function() {
            console.log("Impossivel");
        }
    });

        


    $(document).on('click', '.modaledit', function(){ 
        MainId = (this.id);
        $('#exampleModalCenter').modal('show');

        $.each( obj, function( index , value ){
                if(obj[index]['id'] == MainId){
                    objPopulateModal = obj[index];
                }
        });

        $.each( objPopulateModal, function( index , value ){    
            
            if(index == "cel"){
                $('input[name="celular1" ' ).val(value['celular1']);
                $('input[name="celular2" ' ).val(value['celular2']);
                $('input[name="celular3" ' ).val(value['celular3']);

            }else if(index == 'tel'){
                console.log("tel");
                $('input[name="telefone1" ' ).val(value['telefone1']);
                $('input[name="telefone2" ' ).val(value['telefone2']);
                $('input[name="telefone3" ' ).val(value['telefone3']);

            }else if(index == 'end'){
                console.log( value[0] );
                $('input[name="rua1" ' ).val(value[0]['rua1']);
                $('input[name="rua2" ' ).val(value[1]['rua2']);
                $('input[name="rua3" ' ).val(value[2]['rua3']);

                $('input[name="bairro1" ' ).val(value[0]['bairro1']);
                $('input[name="bairro2" ' ).val(value[1]['bairro2']);
                $('input[name="bairro3" ' ).val(value[2]['bairro3']);
                
                $('input[name="cidade1" ' ).val(value[0]['cidade1']);
                $('input[name="cidade2" ' ).val(value[1]['cidade2']);
                $('input[name="cidade3" ' ).val(value[2]['cidade3']);

                $('input[name="estado1" ' ).val(value[0]['estado1']);
                $('input[name="estado2" ' ).val(value[1]['estado2']);
                $('input[name="estado3" ' ).val(value[2]['estado3']);

            }

            $('input[name="'+index+'" ' ).val(value);
        });            


    });

    $(document).on('click', '.modaldelete', function(){ 
        var txt;
        var r = confirm("Deseja Realmente Remover o Contato ?");
        if (r == true) {
            MainId = (this.id);
            sendToAPIDelete();
        } else {
            
        }
        
    });   

});

function Organize() {

    $.each( obj, function( index, value ){
        obj[index]['cel'] = JSON.parse(obj[index]['cel']);
        obj[index]['tel'] = JSON.parse(obj[index]['tel']);
        obj[index]['end'] = JSON.parse(obj[index]['end']);
    });

    $.each( obj, function( index, value ){
        req.push(
            {"label": obj[index]['nome'], "value": obj[index]['id']}, 
        );
    });


    PopulateTable();

}




function PopulateTable(){
    $.each(obj, function (i, item) {
        $('#records_table').append('<tr><td scope="row">' + obj[i]['nome'] + '</td><td  scope="row">' + obj[i]['email'] + '</td><td scope="row">' +
         '<input style="border-width:0px;border:none;background-color:rgba(0, 0, 0, 0);" id="input'+ obj[i]['id'] +'tel" type="text" class="tel" readonly>'+'</td><td scope="row">' + 
         '<input style="border-width:0px;border:none;background-color:rgba(0, 0, 0, 0);" id="input'+ obj[i]['id'] +'cel" type="text" class="cel" readonly>'+'</td><td scope="row">' + 
         '<button class="modaldelete" id="'+obj[i]['id']+'"><span class="material-icons">delete</span></button>'+'</td><td scope="row">' + 
         '<button class="modaledit" id="'+obj[i]['id']+'"><span class="material-icons">visibility</span></button> </td></tr>');

        $('#input'+obj[i]['id']+'tel').val(obj[i]['tel']['telefone1']);
        $('#input'+obj[i]['id']+'cel').val(obj[i]['cel']['celular1']);
    });
    //$('#records_table').append(trHTML);

    $('.tel').mask('+00 00 00000-0000');
    $('.cel').mask('+00 00 00000-0000');
    

    
}


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

    InputArray['id'] = MainId;

    ValidateData();
}

function ValidateData() {
    if (InputArray['nome'] === "" || InputArray['email'] === "" || InputArray['telefone1'] === "" || InputArray['celular1'] === "") {
        ErrorMessage();
    } else {


        sendToAPIUpdate();
    }

};


function sendToAPIUpdate() {
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/update",
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


function sendToAPIDelete() {
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/delete",
        data: {
            data: {"id" : MainId}
        },
        success: function(res) {
            window.location=res.url;
        },
        error: function(data) { 
            ErrorMessage2();
        }   
    });
}

  
  $('#tags').autocomplete({ 
       source: req,
       select: function (event, ui) { 
           
        MainId = ui.item.value;
        ui.item.value = "";


        $('#exampleModalCenter').modal('show');

        $.each( obj, function( index , value ){
                if(obj[index]['id'] == MainId){
                    objPopulateModal = obj[index];
                }
        });

        $.each( objPopulateModal, function( index , value ){    
            
            if(index == "cel"){
                $('input[name="celular1" ' ).val(value['celular1']);
                $('input[name="celular2" ' ).val(value['celular2']);
                $('input[name="celular3" ' ).val(value['celular3']);

            }else if(index == 'tel'){
                console.log("tel");
                $('input[name="telefone1" ' ).val(value['telefone1']);
                $('input[name="telefone2" ' ).val(value['telefone2']);
                $('input[name="telefone3" ' ).val(value['telefone3']);

            }else if(index == 'end'){
                console.log( value[0] );
                $('input[name="rua1" ' ).val(value[0]['rua1']);
                $('input[name="rua2" ' ).val(value[1]['rua2']);
                $('input[name="rua3" ' ).val(value[2]['rua3']);

                $('input[name="bairro1" ' ).val(value[0]['bairro1']);
                $('input[name="bairro2" ' ).val(value[1]['bairro2']);
                $('input[name="bairro3" ' ).val(value[2]['bairro3']);
                
                $('input[name="cidade1" ' ).val(value[0]['cidade1']);
                $('input[name="cidade2" ' ).val(value[1]['cidade2']);
                $('input[name="cidade3" ' ).val(value[2]['cidade3']);

                $('input[name="estado1" ' ).val(value[0]['estado1']);
                $('input[name="estado2" ' ).val(value[1]['estado2']);
                $('input[name="estado3" ' ).val(value[2]['estado3']);

            }

            $('input[name="'+index+'" ' ).val(value);
        });            

        } 
    });

    $('th').click(function(){
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc){rows = rows.reverse()}
        for (var i = 0; i < rows.length; i++){table.append(rows[i])}
    })
    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }
    function getCellValue(row, index){ return $(row).children('td').eq(index).text() }









