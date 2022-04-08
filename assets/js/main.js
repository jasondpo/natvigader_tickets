var ticketNum;
var timeStamp;
var subject;
var clerk;

$('body').on('click', '.single-ticket-container', function() {
    ticketNum= $(this).find('.ticket').text();
    timeStamp= $(this).find('.timestamp').text();
    subject= $(this).find('.subject').text();
    clerk= $(this).find('.clerkName').text();
    $(".content-host").html(ticketNum+ " "+timeStamp);
    $(".content-header").html(subject);
    $("#deleteThisTicket").val(ticketNum);
});

function showDeletedTicketInfo(){
    sessionStorage.setItem("ticket", ticketNum);
    sessionStorage.setItem("subject", subject);
    sessionStorage.setItem("clerk", clerk);
}

if(sessionStorage.getItem("ticket")!=null){
    var getTicketNumber = sessionStorage.getItem("ticket");
    var getSubject = sessionStorage.getItem("subject");
    var getClerkName = sessionStorage.getItem("clerk");
    $(".deleted-ticket-alert-bar").addClass("showDeleteMessage");
    $(".deleted-ticket-alert-bar div").text("Ticket #: "+getTicketNumber+" "+getSubject+" "+ getClerkName+" was deleted.");
}


// Check if json file has changed
var previous = null;
var current = null;
setInterval(function() {
    $.getJSON("ticket_data/ticket_data.json", function(json) {
        current = JSON.stringify(json);            
        if (previous && current && previous !== current) {
            alert("File has changed")
        }
        previous = current;
    });                       
}, 2000);   
