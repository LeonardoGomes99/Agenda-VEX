var obj = [];
var JsonData = [];
var objPopulateModal= {};




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
        var id = (this.id);
        $('#exampleModalCenter').modal('show');

        $.each( obj, function( index , value ){
                if(obj[index]['id'] == id){
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
    

});

function Organize() {

    $.each( obj, function( index, value ){
        obj[index]['cel'] = JSON.parse(obj[index]['cel']);
        obj[index]['tel'] = JSON.parse(obj[index]['tel']);
        obj[index]['end'] = JSON.parse(obj[index]['end']);
    });

    PopulateTable();

}




function PopulateTable(){
    $.each(obj, function (i, item) {
        $('#records_table').append('<tr><td scope="row">' + obj[i]['nome'] + '</td><td  scope="row">' + obj[i]['email'] + '</td><td scope="row">' +
         '<input style="border-width:0px;border:none;background-color:rgba(0, 0, 0, 0);" id="input'+ obj[i]['id'] +'tel" type="text" class="tel" readonly>'+'</td><td scope="row">' + 
         '<input style="border-width:0px;border:none;background-color:rgba(0, 0, 0, 0);" id="input'+ obj[i]['id'] +'cel" type="text" class="cel" readonly>'+'</td><td scope="row">' + 
         '<button class="modaledit" id="'+obj[i]['id']+'"></button> </td></tr>');

        $('#input'+obj[i]['id']+'tel').val(obj[i]['tel']['telefone1']);
        $('#input'+obj[i]['id']+'cel').val(obj[i]['cel']['celular1']);
    });
    //$('#records_table').append(trHTML);

    $('.tel').mask('+00 00 00000-0000');
    $('.cel').mask('+00 00 00000-0000');
    

    
}






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




