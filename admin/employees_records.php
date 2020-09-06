<?php
require_once '../models/Employee.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>


<div class="col-lg-12  mt-5">
    <h2 class="text-center">Employees Records</h2>

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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Job</th>
                        <th>Gender</th>
                        <th>Start Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

$i =1;
$employees = Employee::viewEmp();
foreach($employees as $employee){
  echo("<tr>");
  echo("<td>". $i ."</td>");
  echo("<td>". $employee->name . "</td>");
  echo("<td>". $employee->mobile_no . "</td>");
  echo("<td>". $employee->address . "</td>");
  echo("<td>". $employee->type . "</td>");  
  echo("<td>". $employee->gender . "</td>");
  echo("<td>". $employee->reg_date . "</td>"); 
  echo("</tr>");
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