$(document).ready(function(){
    $("#caja").keyup(function(event) {
        $("#count").text($(this).val().length)
        var x = $(this).val().length
        //Si x es mayor o igual 300 caracter va a mostrar el error-msg1 y esconde el error-msg2 los dos con un tiempo de 1500 milesegundos
        if(x>=300){
            $(this).css("border",'3px solid red');
            $(".error-msg1").show(1500);
            $(".error-msg2").hide(1500);
        }else{
        //Si x es mayor o igual a 50 caracteres va a mostrar el error-msg2 con un tiempo de 1500 milesegundos
            if(x>=50){
                $(this).css("border",'3px solid green');
                $(".error-msg2").show(1500);
            }
        }
    })
})
