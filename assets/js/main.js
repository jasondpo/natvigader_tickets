var ticketNum;
var timeStamp;
var subject;

$('body').on('click', '.single-ticket-container', function() {
    ticketNum= $(this).find('.ticket').text();
    timeStamp= $(this).find('.timestamp').text();
    subject= $(this).find('.subject').text();
    $(".content-host").html(ticketNum+ " "+timeStamp);
    $(".content-header").html(subject);
    $("#deleteThisTicket").val(ticketNum);
});

function verifyDeletedTicket(){
    sessionStorage.setItem("ticket", ticketNum);
}

if(sessionStorage.getItem("ticket")!=null){
    $(".delete-success").addClass("showDeleteMessage");
}
