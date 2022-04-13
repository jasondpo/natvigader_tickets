<?php 
    include 'functions.php';
    include 'includes/head.php'; 
?>


<body id="nat-home">

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <form action="success.php" method="post" name="natvigader-ticket" id="natvigader-ticket">

            <label for="fname">First name</label><br>
            <input type="text" id="fname" name="fname">

            <br><br>

            <label for="lname">Last name</label><br>
            <input type="text" id="lname" name="lname">

            <br><br>

            <label for="branch">Branch/ Department</label><br>
            <select id="branch" name="branch">
                <option value="" selected>Select</option>
                <option value="Call">Call Center</option>
                <option value="Dealers">Dealers Department</option>
                <option value="Dixie">Dixie Branch</option>
                <option value="Downown">Downtown Branch</option>
                <option value="East">East Branch</option>
                <option value="Fairdale">Fairdale Branch</option>
                <option value="Highview">Highview Branch</option>
                <option value="Jeffersontown">Jeffersontown Branch</option>
                <option value="Lien">Lien Department</option>
                <option value="Records">MV Records</option>
                <option value="Processing">Processing Center</option>
                <option value="West">West Branch</option>
                <option value="Westport">Westport Branch</option>
            </select>

            <br><br>

            <label for="subject">Subject</label><br>
            <select id="subject" name="subject">
                <option value="" selected>Select</option>
                <option value="Broken Link">Broken Link</option>
                <option value="Missing Information">Missing Information</option>
                <option value="Outdated Information">Outdated Information</option>
                <option value="Feature Request">Feature Request</option>
                <option value="Other">Other</option>
            </select>

            <br><br>

            <label for="comment">Description</label><br>
            <textarea  id="comment" name="comment" rows="10" cols="30">

            </textarea>

            <br><br>

            <input type="submit" name="submitTicketBtn" value="Submit Ticket">

        </form>
    </div>

    

</body>
</html>