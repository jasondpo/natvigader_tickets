<?php

if(isset($_POST['submitTicketBtn'])){
    submitTicket();
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
    //  unset($old_tickets_array[1]);  
}
