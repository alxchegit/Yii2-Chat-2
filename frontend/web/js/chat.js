$('ul.messages').scrollTop(document.querySelector('ul.messages').scrollHeight);

$('span.tool-hide').on('click', function(){
    
    $message_id = $(this).parents('.message').find('.message-id').html();
    $.ajax({
        url: 'hide',
        method: "POST",
        data: {id:$message_id},
        success: function(data){
           if(data) {
               alert('Hide successful')
           } else {
               alert("Hide with error")
           }
        },
        error: function(error){
            console.log("Error")
        },
    })
});