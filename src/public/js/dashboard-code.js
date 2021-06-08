var obj = [];
var JsonData = [];




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
});

function Organize() {

    $.each( obj, function( index, value ){
        obj[index]['cel'] = JSON.parse(obj[index]['cel']);
        obj[index]['tel'] = JSON.parse(obj[index]['tel']);
        obj[index]['end'] = JSON.parse(obj[index]['end']);
    });

    Populate();

}




function Populate(){
    var trHTML = "";
    $.each(obj, function (i, item) {
        $('#records_table').append('<tr><td>' + obj[i]['nome'] + '</td><td>' + obj[i]['email'] + '</td><td>' +
         '<input style="border-width:0px;border:none;background-color:rgba(0, 0, 0, 0);" id="input'+ obj[i]['id'] +'" type="text" class="tel" readonly>'+
         '</td><td>' + obj[i]['email'] + 
        '</td><td><button id="'+obj[i]['id']+'"> Visualizar </button> </td></tr>');
        $('#input'+obj[i]['id']).val(obj[i]['cel']['cel1']);
    });
    //$('#records_table').append(trHTML);

    $('.tel').mask('+00 00 00000-0000');
    
}