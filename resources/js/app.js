import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



$(document).ready(function(){
    $('#button-addon1').on('click',function(e){
        e.preventDefault();
        let username = $('#username').val();
        let message = $('#message').val();
        if(username=="" || message==""){
            alert('User name and message not null');
            return false;
        }

        $.ajax({
            method:"post",
            url:'/send-message',
            data:{username:username, message:message},
            success:function(response){

            }
        })
    })
})

window.Echo.channel('chat')
.listen('.message',(e)=>{
    $('#messageBody').append("<strong>" +e.username + ": </strong>" +  e.message );
})




