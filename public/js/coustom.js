
$(document).ready(function(){
    $('.userBody').on('click',function(){
        var getUserId = $(this).attr('data-id');
        reciver_id = getUserId;
        $('#chateTitle').hide();
        $(".chatBody").show();
    });

    // Chate section//

    $("#chat-fomr").on('click',function(e){
        e.preventDefault();
        var messages  = $('#chatMessage').val();

        $.ajax({
            method:"POST",
            url:'/save-chat',
            data:{sender_id:sender_id, reciver_id:reciver_id, message:messages},
            success:function(response){
                $('#chatMessage').val('');
                let message = response.data.body;

                var html =`
                <h1 class="current_user">`+ message + `</h1>
                `
                $('.chatBorad').append(html);
            }
        })
    })

})

// chate section event call//

Echo.private('broadcast-message')
.listen('.getChatMessage',function(e){
   console.log();

});

// user Status //

Echo.join('status-update').here((users)=>{
    for(let x = 0; x < users.length; x++){
        if(sender_id !== users[x]['id']){
            $('#'+users[x]['id']+'-status').removeClass('offline-status');
            $('#'+users[x]['id']+'-status').addClass('online-status');
            $('#'+users[x]['id']+'-status').text('oneline');
        }
    }

})

.joining((user)=>{
    $('#'+user.id+'-status').removeClass('offline-status');
    $('#'+user.id+'-status').addClass('online-status');
    $('#'+user.id+'-status').text('oneline');
})
.leaving((user)=>{
    $('#'+user.id+'-status').removeClass('online-status');
    $('#'+user.id+'-status').addClass('offline-status');
    $('#'+user.id+'-status').text('offline');
})

.listen('userStatus',(e)=>{
    console.log(e);
})


