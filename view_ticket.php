<?php
require_once('init.php');
require_once('models/user.php');
require_once('views/header.php');
require_once 'models/Booking.php';
$result = Booking::getTicketInfo($_GET['booking_id']);
$date =date('Y-m-d',strtotime($result['booking']->date));
// echo("<pre>");
// print_r($date);
// die;
// echo ("</pre>");

?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 class="align-center"></h1>
<div class="row">
  <div class="col-md-8 offset-2">
    <div class="card mb-3">
      <div class="card-header text-center">
        <h3>Smart BRS Ticket</h3>
      </div>
      <div class="card-body text-success">
        <h3 class="card-title text-danger">Ticket Route: <?php echo ($result['booking']->departure . " To " . $result['booking']->arrival); ?></h3>
        <h4><strong>Name:</strong> <?php echo ($result['booking']->customer); ?></h4>
        <h4><strong>Seat No:</strong>
        <?php
            foreach($result['seats'] as $seat)
            {
              echo($seat->seat_no.",");
            }
        ?>
        </h4>
        <h4><strong>Date:</strong> <?php echo $date ?></h4>
        
        <h4><strong>Departure Time:</strong> <?php echo ($result['booking']->departure_time); ?></h4>
      </div>
      <div class="card-footer bg-transparent border-success"><strong class="text-danger">Note:</strong> This Ticket is Generated by System Error May Be Expected.<br>
      
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="d-flex justify-content-center">
      <input class="btn btn-primary" value="Print Ticket" type="button" onClick="window.print()">
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once('views/footer.php');
?>