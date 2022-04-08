var ticketNum;
var timeStamp;
var subject;
var clerk;

// Transfer Ticket Information into content-host div
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


// Save clicked/viewed tickets in localStorage
// Append to existing tickets -- currently over-writes existing tickets
let viewedTickets = [];
$('body').on('click', '.single-ticket-container', function() {
    let clickedTicket = $(this).find('.ticket').text();
    viewedTickets.push(clickedTicket)
    console.log(viewedTickets);
    localStorage.setItem("viewedTickets", JSON.stringify(viewedTickets));
});

// Retrieve clicked/viewed tickets in localStorage
let viewedTicketsRetrieved = JSON.parse(localStorage.getItem("viewedTickets"));

// Check if stored clicked/viewed tickets still exist in ticket-container div
let ticketsCurrentlyInContainerDiv = [];

$(".ticket").each(function(){
    ticketsCurrentlyInContainerDiv.push($(this).text())
});

let matchingTickets = []
viewedTicketsRetrieved.forEach(val=>{

    if(ticketsCurrentlyInContainerDiv.includes(val)){
        matchingTickets.push(val);
    }
})

console.log(matchingTickets)

// Apply class to any ticket inside ticket container div that matches stored ticket
matchingTickets.forEach(tickNo=>{
    $(".single-ticket-container").each(function(){
        if($(this).data('ticket')==tickNo){
            // $(this).fadeOut('slow');
            $(this).addClass('dehighlight');
        };
    });
});

// Erase any stored ticket that does not have a corresponding ticket inside ticket-container div

