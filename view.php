<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>

<?php
  $getFeedBack = file_get_contents('ticket_data/ticket_data.json');  
  $feedBacks = json_decode($getFeedBack, true);
  foreach(array_reverse($feedBacks) as $key => $feedBack) {
        echo $key;

        echo $feedBack['timestamp'];
        
        echo $feedBack['ticket'];

        echo $feedBack['subject'];

        echo $feedBack['fname'];

        echo $feedBack['lname'];
    
        echo $feedBack['branch'];

        echo $feedBack['comment'];
  }
?>



</body>
</html>