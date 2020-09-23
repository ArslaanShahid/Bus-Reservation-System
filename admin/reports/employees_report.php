<?php
require_once "views/header.php";
require_once "../../models/Employee.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Name</td>
            <td>Contact No</td>
            <td>Address</td>
            <td>Gender</td>
            <td>Job Type</td>
            <td>Job Start Date</td>
            <td>Salary</td>

        </tr>
    </thead>
    <?php
    $i = 1;
    $Employees = Employee::viewEmp();
    foreach ($Employees as $Employee) {
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        echo ("<td>" . $Employee->name . "</td>");
        echo ("<td>" . $Employee->mobile_no . "</td>");
        echo ("<td>" . $Employee->address . "</td>");
        echo ("<td>" . $Employee->gender . "</td>");
        echo ("<td>" . $Employee->type . "</td>");
        echo ("<td>" . $Employee->reg_date . "</td>");
        echo ("<td>" . $Employee->salary . "</td>");
        
        $i++;
    }
    ?>
</table>

<?php
require_once 'views/footer.php';
?>