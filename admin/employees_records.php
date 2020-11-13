<?php
require_once '../models/Employee.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>

<div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-user-circle">
                        </i>
                    </div>
                    <div>Employees
                        <div class="page-title-subheading">Employee Records
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-lg-12  mt-5">
  

    <div class="main-card mb-3 card">
        <div class="card-body">
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
                        <th>Salary</th>
                        <th>Action</th>
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
  echo("<td>". $employee->salary . "</td>"); 
  echo ("<td><a href='".BASE_URL."process/process_delete_employee.php?id=".$employee->id."' class='text-danger offset-5 fa fa-trash'></a></td>");
  
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