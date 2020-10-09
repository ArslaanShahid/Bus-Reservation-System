</div>
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Smart BRs &nbsp; 
                                <i class="fa fa-copyright"> Developed By Team Unity</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script src="<?php echo (BASE_URL); ?>assets/scripts/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo (BASE_URL); ?>assets/scripts/main.js"></script>
<script src="<?php echo (BASE_URL); ?>assets/scripts/toastr.min.js"></script>
<script src="/assets/js/select2.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>


<script>
    toastr.options.closeButton = true;
    toastr.options.preventDuplicate = true;
    toastr.options.progressBar = true;
    <?php
    if (isset($_SESSION['success'])) {
        echo ("toastr.success('" . $_SESSION['success'] . "')");
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo ("toastr.error('" . $_SESSION['error'] . "')");
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['info'])) {
        echo ("toastr.info('" . $_SESSION['info'] . "')");
        unset($_SESSION['info']);
    }
    ?>
</script>
<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                title: 'Admin Account Details Export',
                extend: 'pdfHtml5',
                // download: 'open',
                messageTop: 'Admin Account Record Report',
                pageSize: 'LEGAL'

            }]
        });
        $('.dataTables_length').addClass('bs-select');
    });
    
</script>

<script>
    $(document).ready(function() {
        
        $('#bus').select2();
        $('#arrival').select2();
        $('#departure').select2();
        $('#account').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                title: 'Employees Data Export',
                extend: 'pdfHtml5',
                // download: 'open',
                messageTop: 'Employees Record Report',
                pageSize: 'LEGAL'

            }]
        });

        $('.dataTables_length').addClass('bs-select');
            
    });     

    $.extend($.fn.dataTable.defaults, {
        
        searching: false,
        ordering: true,
        paging: false,
    });
</script>
</body>

</html>