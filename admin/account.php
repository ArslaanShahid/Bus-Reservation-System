<?php
require_once 'views/header.php';
require_once 'views/sidebar.php';
require_once '../models/admin.php';
?>
<div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon fa fa-user">
                        </i>
                    </div>
                    <div>Admin Account
                        <div class="page-title-subheading">Manage Admin Account
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-lg-12  mt-5">

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            
            <table class="table table-striped table-bordered" id="dtBasicExample">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  

                    $i = 1;
                    $admins = Admin::viewAdmin();
                    foreach ($admins as $admin) {
                        echo ("<tr>");
                        echo ("<td>" . $i . "</td>");
                        echo ("<td>" . $admin->user_name . "</td>");
                        echo ("<td>" . $admin->email . "</td>");
                        if ($admin->status == 1) {
                            echo ("<td><a href='process/process_deactivate_admin.php?id=".$admin->admin_id."' class='btn btn-warning btn-sm'>Deactivate</a></td>");
                        } else {
                            echo ("<td><a href='process/process_activate_admin.php?id=".$admin->admin_id."' class='btn btn-success btn-sm'>Activate</a></td>");
                        }
                        echo ("</tr>");
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