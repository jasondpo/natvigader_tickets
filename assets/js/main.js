// Assign colors to profile initials inside single-ticket-containers
let orange = "ABCD";
let red = "EFGH";
let blue = "IJKL";
let purple = "MNOP";
let green = "QRST";
let yellow = "UVWX";
let black = "YZ";
$(".profileInitials").each(function(){
    let firstLetter = $(this).text().slice(0,1);
    if(orange.includes(firstLetter)){
        $(this).addClass("profileOrange")
    }
    if(red.includes(firstLetter)){
        $(this).addClass("profileRed")
    }
    if(blue.includes(firstLetter)){
        $(this).addClass("profileBlue")
    }
    if(purple.includes(firstLetter)){
        $(this).addClass("profilePurple")
    }
    if(green.includes(firstLetter)){
        $(this).addClass("profileGreen")
    }
    if(yellow.includes(firstLetter)){
        $(this).addClass("profileYellow")
    }
    if(black.includes(firstLetter)){
        $(this).addClass("profileBlack")
    }
});

// Transfer Ticket Information into content-host sub DIVs
var ticketNum;
var clerk;
var timeStamp;
var subject;
var message;
var profile;
var color;

$('body').on('click', '.single-ticket-container', function() {
    ticketNum = $(this).find('.ticket').text();
    timeStamp = $(this).find('.timestamp').text();
    subject = $(this).find('.subject').text();
    clerk = $(this).find('.clerkName').text();
    message = $(this).find('.comment').text();
    profile = $(this).find('.profileInitials').text();
    color = $(this).find('.profileInitials').attr('class').split(' ')[1];
    $(".content-header").html(subject);
    $(".content-host-ticket-name").html(clerk);
    $(".content-host-ticket-timestamp").html(timeStamp);
    $(".content-host-incident").html(message);
    $("#activeTicket").val(ticketNum);
    $(".content-host-profile").html(profile).removeClass().addClass('content-host-profile').addClass(color);
    $("#solutionInput").val('');
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
let storeClickedTicket = [];
$('body').on('click', '.single-ticket-container', function() {
    $('.single-ticket-container').removeClass('selectedTicket');
    if(!$(this).hasClass("dehighlight")){
        $(this).addClass('selectedTicket dehighlight');
        let clickedTicket = $(this).find('.ticket').text();
        storeClickedTicket.push(clickedTicket)
        localStorage.setItem("storeClickedTicket", JSON.stringify(storeClickedTicket));
    }else{
        $(this).addClass('selectedTicket');
    };
    showTicketStatus();
});

// On Refresh combine "viewedTickets" with "storedTickets"
function combine(){
    // localStorage.removeItem('storeClickedTicket');
    // localStorage.removeItem('viewedTickets');
    let prevTickets = JSON.parse(localStorage.getItem("storeClickedTicket"));
    let usedTickets = JSON.parse(localStorage.getItem("viewedTickets"))
    if(prevTickets!=null){
        let bothTickets = prevTickets.concat(usedTickets);
        bothTickets = bothTickets.filter( function( item, index, inputArray ) {
            return inputArray.indexOf(item) == index;
        })
        localStorage.setItem("viewedTickets", JSON.stringify(bothTickets))
    }   
}
combine();



// Retrieve clicked/viewed tickets in localStorage
let viewedTicketsRetrieved = JSON.parse(localStorage.getItem("viewedTickets"));

// Check if stored clicked/viewed tickets match any existing tickets in ticket-container div
let ticketsCurrentlyInContainerDiv = [];

$(".ticket").each(function(){
    ticketsCurrentlyInContainerDiv.push($(this).text())
});

let matchingTickets = []
if(viewedTicketsRetrieved != null){
    viewedTicketsRetrieved.forEach(val=>{
        if(ticketsCurrentlyInContainerDiv.includes(val)){
            matchingTickets.push(val);
        }
    })
}
console.log(matchingTickets)
localStorage.setItem("viewedTickets", JSON.stringify(matchingTickets))

// Apply class to tickets inside ticket container div that matches stored ticket
matchingTickets.forEach(tickNo=>{
    $(".single-ticket-container").each(function(){
        if($(this).data('ticket')==tickNo){
            $(this).addClass('dehighlight');
        };
    });
});


// Show Ticket status
function showTicketStatus(){
    let getTicketNo = $("#activeTicket").val();
    $.getJSON("ticket_data/ticket_data.json", function(data) {
        $.each(data, function(i, data){
            if(data.ticket==getTicketNo){
                $("#ticketStatus").val(data.status);
                if(data.solution!=""){
                    $("#solutionInput").val(data.solution);
                }else{
                    $("#solutionInput").val('').attr("placeholder", "Type your solution..."); 
                };
            }
        });
    });  
}

