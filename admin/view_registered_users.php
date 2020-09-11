<?php
require_once '../models/user.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>


<div class="col-lg-12  mt-5">
    <h2 class="text-center">Registered User's Records</h2>

    <br>
    <br>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <i class="fas fa-file-import"></i>
            <h5 class="card-title"> </h5>
    
            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Register Date</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                <?php 

$i =1;
$registered_users = user::registered_user();
foreach($registered_users as $registered_user){
  echo("<tr>");
  echo("<td>". $i ."</td>");
  echo("<td>". $registered_user->user_name . "</td>");
  echo("<td>". $registered_user->email . "</td>");
  echo("<td>". $registered_user->signup_date . "</td>");
  if ($registered_user->status == 1) {
    echo ("<td><a href='process/process_deactivate_user.php?id=".$registered_user->id."' class='btn btn-warning btn-sm'>Deactivate</a></td>");
} else {
    echo ("<td><a href='process/process_activate_user.php?id=".$registered_user->id."' class='btn btn-success btn-sm'>Activate</a></td>");
}  echo("</tr>");
  $i++;
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

<?php
require_once 'views/footer.php';
?>