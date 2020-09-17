<?php
require_once '../models/Queries.php';
require_once 'views/header.php';
require_once 'views/layoutoption.php';
require_once 'views/sidebar.php';
?>


<div class="col-lg-12  mt-5">
    <h2 class="text-center">Manage User's Complaints</h2>

    <br>
    <br>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"> </h5>

            <table class="table table-striped table-bordered" id="account" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
                 $i = 1;
                 $queries = Queries::show_complaint();
                 foreach ($queries as $query) {
                     echo ("<tr>");
                     echo ("<td>" . $i . "</td>");
                     echo ("<td>" . $query->name . "</td>");
                     echo ("<td>" . $query->email . "</td>");
                     echo ("<td>" . $query->mobile . "</td>");
                     echo ("<td>" . $query->msg . "</td>");
                     echo ('<td class="text-center"><a href="process/process_delete_query.php?id='.$query->id.'" style="color:red;" class="fa fa-trash"></a></td>');
                     
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