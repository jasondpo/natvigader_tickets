<?php 
    include 'functions.php'; 
    include 'includes/head.php'; 
?>

<body class="nat-dashboard">

  <?php include 'includes/header.php'; ?>

  <div class="deleted-ticket-alert-bar" id="test" data-wtf="1234">
    <span></span>
    <div></div>
  </div>

  <div class="container">

     <!-- Left Column STARTS -->
    <div class="leftCol">
    
      <div class="ticket-container">

        <?php displayTicketList(); ?>

      </div>
    
    </div> <!-- Left Column Ends -->

    <!-- Right Column STARTS -->
    <div class="rightCol">
      <div class="content-header"></div>
      <div class="content-host">
        
      </div>

      <form action="dashboard.php" name="delete-ticket" id="delete-ticket" onsubmit="return showDeletedTicketInfo()" method="post">

        <input type="text" id="deleteThisTicket" name="deleteThisTicket">

        <input type="submit" id="deleteTicketBtn" name="deleteTicketBtn" value="Delete Ticket">

      </form>

    </div> <!-- Right Column Ends -->
  
  </div> <!-- Container Ends -->
 
  <?php include "includes/footer.php"; ?>

</body>
</html>