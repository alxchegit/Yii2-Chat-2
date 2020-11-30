$('ul.messages').scrollTop(document.querySelector('ul.messages').scrollHeight);

$('span.tool-hide').on('click', function(){
    
    let message_id = $(this).parents('.message').find('.message-id').html();

    if($(this).hasClass('off')){
        hideMessage(message_id);
    }
    if($(this).hasClass('on') ) {
        showMessage(message_id);
    }
});

const hideMessage = (id) => {
    $.ajax({
        url: 'hide',
        method: "POST",
        data: {id: id},
        success: function(data){
            if(data) {
                alert('Hide successful')
            } else {
                alert("Hide with error")
            }
        },
        error: function(error){
            console.log("Error hideMessage")
        }
    });
};

const showMessage = (id) => {
    $.ajax({
        url: 'show',
        method: "POST",
        data: {id: id},
        success: function(data){
            if(data) {
                alert('Show successful')
            } else {
                alert("Show with some error")
            }
        },
        error: function(error){
            console.log("Error showMessage")
        }
    });
}