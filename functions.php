<?php

if(isset($_POST['submitTicketBtn'])){
    submitTicket();
};

if(isset($_POST['deleteTicketBtn'])){
    deleteTicket();
};

function submitTicket(){

    $dtz = new DateTimeZone("America/New_York");
    $dt = new DateTime("now", $dtz);
    $timestamp = $dt->format("D n/j, g:i a");
    $clerkLocation = strtoupper(substr($_POST["branch"], 0, 4));
    $ticketNum = rand(100000, 999999);
    $ticketNum = $clerkLocation.$ticketNum;

    if(file_exists('ticket_data/ticket_data.json'))  
    {  
         $old_tickets = file_get_contents('ticket_data/ticket_data.json');  
         $old_tickets_array = json_decode($old_tickets, true);
         $newTicket = array(
            'timestamp'  =>  $timestamp,
            'ticket'  =>  $ticketNum, 
            'subject' =>  $_POST["subject"], 
            'fname'   =>  $_POST["fname"],
            'lname'   =>  $_POST["lname"],    
            'branch'  =>  $_POST["branch"],  
            'comment' =>  $_POST["comment"]  
         ); 
         array_push($old_tickets_array, $newTicket);
         $updated_ticket_list = json_encode($old_tickets_array);  
         if(file_put_contents('ticket_data/ticket_data.json', $updated_ticket_list))  
         {  
            echo "<label class='text-success'>File Appended Success fully</p>";  
         }  
    }  
    else  
    {  
        $old_tickets_array =[];
        $old_tickets = fopen("ticket_data/ticket_data.json", "w");
        $newTicket = array(  
            'timestamp'  =>  $timestamp,
            'ticket'  =>  $ticketNum,
            'subject' =>  $_POST["subject"],   
            'fname'   =>  $_POST["fname"],
            'lname'   =>  $_POST["lname"],    
            'branch'  =>  $_POST["branch"],  
            'comment' =>  $_POST["comment"]  
       );
       array_push($old_tickets_array, $newTicket);   
       $updated_ticket_list = json_encode($old_tickets_array);  
       if(file_put_contents('ticket_data/ticket_data.json', $updated_ticket_list))  
       {  
            echo "<label class='text-success'>Something was created</p>";  
       }    
    }  
}

function deleteTicket(){
    // Create new array from selected tickets
    // Compare new array with stored array using array_diff()
    // The result should return only what is not identical
    // Upload resulting array

    $tickets = file_get_contents('ticket_data/ticket_data.json');  
    $tickets = json_decode($tickets, true); 

    foreach($tickets as $key => $ticket) {
        if($ticket['ticket']=='DIXI210690'){
            unset($tickets[$key]);
        }
    }

    $revised_ticket_list = json_encode($tickets);
    if(file_put_contents('ticket_data/ticket_data.json', $revised_ticket_list))  
    {  
         echo "<label class='text-success'>Ticket has been deleted, hopefully.</p>";  
    } 
}
