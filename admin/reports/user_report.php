<?php
require_once "../init.php";
require_once "../../models/User.php";
require_once "views/header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>User Name</td>
            <td>Email</td>
            <td>Contact No</td>
            <td>Address</td>
        </tr>
    </thead>
    <?php
        $i=1;
        $users = User::show_all_users();
        foreach($users as $user) {
            echo("<tr>");
            echo("<td>".$i++."</td>");
            if($user->first_name == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$user->first_name."</td>");
            }
            if($user->last_name == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$user->last_name."</td>");
            }
            echo("<td>".$user->user_name."</td>");
            echo("<td>".$user->email."</td>");
            if($user->contact_no == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$user->contact_no."</td>");
            }
            if($user->street_address == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$user->street_address."</td>");
            }
            echo("</tr>");
        }
    ?>
</table>
<?php
require_once "views/footer.php";
?>