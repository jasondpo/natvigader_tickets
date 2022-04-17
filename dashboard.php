<?php 
    include 'functions.php'; 
    include 'includes/head.php'; 
?>

<body class="nat-dashboard">

  <?php include 'includes/header.php'; ?>

  <div class="deleted-ticket-alert-bar" id="test" data-wtf="1234">
    <span>&#10005;</span>
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

      <form action="dashboard.php" name="delete-ticket" id="delete-ticket" onsubmit="return showDeletedTicketInfo()" method="post">
      
        <div class="content-host">
          <div class="content-host-profile"></div>
          <div class="content-host-ticket-name"></div>
          <div class="content-host-ticket-timestamp"></div>
          <div class="content-host-incident"></div>
          <div class="content-host-solution">
            <h3>Solution Information</h3>
            <textarea id="solutionInput" name="solutionInput" rows="10" cols="30" placeholder="Type your solution..." onblur="if(this.value==''){this.placeholder='Type your solution...'}" onfocus="if(this.value==''){this.placeholder=''}"></textarea>
          </div>
        </div>

        <div class="status-container">
          <label for="ticketStatus">Status:&nbsp;</label>
            <select name="ticketStatus" id="ticketStatus">
              <option value="Opened">Opened</option>
              <option value="Reviewed">Reviewed</option>
              <option value="Ongoing">Ongoing</option>
              <option value="Completed">Completed</option>
          </select>
        </div>

        <input type="text" id="activeTicket" name="activeTicket">

        <input type="submit" id="deleteTicketBtn" name="deleteTicketBtn" value="Delete Ticket">
        <input type="submit" id="updateTicketBtn" name="updateTicketBtn" value="Update Ticket">

      </form>

    </div> <!-- Right Column Ends -->
  
  </div> <!-- Container Ends -->
 
  <?php include "includes/footer.php"; ?>

</body>
</html>