<?php
$page = "logging";
include_once('conn.php');

$articcode = $_GET['articcode'] ?? '0';
$sql = "select log_id, DATE_FORMAT(date_sent, '%Y-%m-%dT%H:%i:%s') as data1, body as data2 from email_log where assoc_id = ".$articcode;
$sql2 = "select log_id,  DATE_FORMAT(date_logged, '%Y-%m-%dT%H:%i:%s') as data1, message as data2 from event_log where assoc_id =".$articcode;
$sql3 = "select submission_id, DATE_FORMAT(date_submitted, '%Y-%m-%dT%H:%i:%s') as data1, DATE_FORMAT(date_status_modified, '%Y-%m-%dT%H:%i:%s') as data2 from submissions where submission_id =".$articcode;

try {
    $query = $conn->query($sql);
    $query2 = $conn->query($sql2);
    $query3 = $conn->query($sql3);
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data 1</th>
                            <th>Data 2</th>
                            <th>Submit</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($query as $val) { ?>
                            <tr class="table-info">
                                <form action="update.php" method="post">
                                <td><?php print_r($val['log_id']) ?><input type="text" name="id" value="<?php print_r($val['log_id']) ?>" hidden>
                                <input type="text" name="table" value="email_log" hidden></td>
                                <td><?php print_r($val['data1']) ?><br><input type="datetime-local" name="data1" value="<?php print_r($val['data1']) ?>" id="iddate"></td>
                                <td><textarea class="form-control" name="data2" type="text"><?php print_r($val['data2']) ?></textarea></td>
                                <td><button type="submit" class="form-control btn-primary">Submit</button></td>
                                </form>
                            </tr>
                            <?php }?>

                            <?php foreach ($query2 as $val) { ?>
                            <tr class="table-warning">
                                <form action="update.php" method="post">
                                <td><?php print_r($val['log_id']) ?><input type="text" name="id" value="<?php print_r($val['log_id']) ?>" hidden>
                                <input type="text" name="table" value="event_log" hidden></td>
                                <td><?php print_r($val['data1']) ?><br><input type="datetime-local" name="data1" value="<?php print_r($val['data1']) ?>" id="iddate"></td>
                                <td><textarea class="form-control" name="data2" type="text"><?php print_r($val['data2']) ?></textarea></td>
                                <td><button type="submit" class="form-control btn-primary">Submit</button></td>
                                </form>
                            </tr>
                            <?php }?>

                            <?php foreach ($query3 as $val) { ?>
                            <tr class="table-secondary">
                                <form action="update.php" method="post">
                                <td><?php print_r($val['submission_id']) ?><input type="text" name="id" value="<?php print_r($val['submission_id']) ?>" hidden>
                                <input type="text" name="table" value="submissions" hidden></td>
                                <td><?php print_r($val['data1']) ?><br><input type="datetime-local" name="data1" value="<?php print_r($val['data1']) ?>" id="iddate"></td>
                                <td><input type="datetime-local" name="data1" value="<?php print_r($val['data2']) ?>" id="iddate2"></td>
                                <td><button type="submit" class="form-control btn-primary">Submit</button></td>
                                </form>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
                <div class="mt-5">
                
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

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>