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