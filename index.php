<?php 
    include 'functions.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natvigader Email</title>
</head>
<body>

    <form action="success.php" method="post" name="natvigader-email" id="natvigader-email">

        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="fname">

        <br><br>

        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="lname">
        
        <br><br>

        <label for="branch">Branch/ Department</label><br>
        <select id="branch" name="branch">
            <option value="" selected>Select</option>
            <option value="call">Call Center</option>
            <option value="dealers">Dealers Department</option>
            <option value="dixie">Dixie Branch</option>
            <option value="downown">Downtown Branch</option>
            <option value="east">East Branch</option>
            <option value="fairdale">Fairdale Branch</option>
            <option value="highview">Highview Branch</option>
            <option value="jeffersontown">Jeffersontown Branch</option>
            <option value="lien">Lien Department</option>
            <option value="records">MV Records</option>
            <option value="processing">Processing Center</option>
            <option value="west">West Branch</option>
            <option value="westport">Westport Branch</option>
        </select>
        
        <br><br>

        <label for="subject">Subject</label><br>
        <select id="subject" name="subject">
            <option value="" selected>Select</option>
            <option value="broken">Broken Link</option>
            <option value="missing">Missing Information</option>
            <option value="outdated">Outdated Information</option>
            <option value="feature">Feature Request</option>
            <option value="other">Other</option>
        </select>
        
        <br><br>

        <label for="comment">Description</label><br>
        <textarea  id="comment" name="comment" rows="10" cols="30">
        
        </textarea>
        
        <br><br>
 
        <input type="submit" name="submitTicketBtn" value="Submit Ticket">

    </form>

</body>
</html>