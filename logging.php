<?php
$page = "logging";
include_once('conn.php');

$articcode = $_GET['articcode'] ?? '0';
$sql = "select 'email_log' as tabel, log_id, DATE_FORMAT(date_sent, '%Y-%m-%dT%H:%i:%s') as data1, body as data2 from email_log where assoc_id = ".$articcode." UNION ALL ";
$sql2 = "select 'event_log' as tabel, log_id,  DATE_FORMAT(date_logged, '%Y-%m-%dT%H:%i:%s') as data1, message as data2 from event_log where assoc_id =".$articcode." UNION ALL ";
$sql3 = "select 'submissions' as tabel, submission_id as log_id, DATE_FORMAT(date_submitted, '%Y-%m-%dT%H:%i:%s') as data1, DATE_FORMAT(date_status_modified, '%Y-%m-%dT%H:%i:%s') as data2 from submissions where submission_id =".$articcode;

try {
    $query = $conn->query($sql.$sql2.$sql3);
    // echo $query->fetch_assoc();
    // echo $sql.$sql2.$sql3;
} catch (\Throwable $th) {
    $query = null;
    $query2 = null;
    $query3 = null;
    echo $th;
}

include_once('app/app.php');
?>
<!-- End of Topbar -->



<!-- Begin Page Content -->
<div class="container-fluid">

<?php 
        if ($_GET['status'] != null){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_GET['status'] ?>
    </div>
    <?php 
        }
    ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Database Connection</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
            <form method="get" action="logging.php">
                <div class="form-group">
                    <label for="databasename">Kode Artikel</label>
                <input type="text" name="articcode" class="form-control" id="databasename"
                        aria-describedby="databasename">
                </div>
                <button type="submit" class="btn btn-primary">Connect</button>
            </form>
            </div>
            <div class="table-responsive">
            <form action="update.php" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data 1</th>
                            <th>Data 2</th>
                        </tr>
                    </thead>
                    <?php $i=0; ?>
                    <tbody>
                            <?php foreach ($query as $key => $val) { ?>
                            <tr class="
                            <?php 
                                if ($val['tabel'] == 'email_log') {
                                    ?>table-primary<?php
                                } else if ($val['tabel'] == 'event_log') {
                                    ?>table-info<?php
                                } else if ($val['tabel'] == 'submissions'){
                                    ?>table-warning<?php
                                }
                            ?>
                            ">
                                <?php  
                                
                                $id = $val['log_id'];
                                $table = $val['tabel'];
                                $data1 = $val['data1'];
                                $data2 = $val['data2'];



                                ?>
                                
                                <td><?php print_r($val['log_id']) ?><input type="text" name="isi[id][<?php echo $i ?>]" value="<?php echo $id ?>" hidden>
                                <input type="text" name="isi[tabel][<?php echo $i ?>]" value="<?php echo $table ?>"hidden></td>
                                <td><?php print_r($val['data1']) ?><br><input type="datetime-local" name="isi[data1][<?php echo $i ?>]" value="<?php echo $data1 ?>" id="iddate"></td>
                                <td>
                                    <?php if ($val['tabel'] != 'submissions') {?>
                                    <textarea class="form-control" name="isi[data2][<?php echo $i ?>]" type="text"><?php echo $data2 ?></textarea>
                                    <?php } else { ?>
                                        <input type="datetime-local" name="isi[data2][<?php echo $i ?>]" value="<?php echo $data2 ?>" id="iddate2">
                                    <?php } ?>
                                </td>
                                
                            </tr>
                            <?php $i++; }?>
                    </tbody>
                </table>
                <div class="mt-5">
                    <button type="submit" class="form-control btn-primary">Submit</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- FOOTER -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>

<!-- Page level custom scripts -->


</body>

</html>