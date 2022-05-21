<?php
include_once('app/app.php');
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <?php 
        if ($_GET['message'] != null){
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_GET['message'] ?>
    </div>
    <?php 
        }
    ?>

<?php 
        if ($_GET['die'] != null){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_GET['die'] ?>
    </div>
    <?php 
        }
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Database Connection</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="logging.php">
                <div class="form-group">
                    <label for="databasename">Database Name</label>
                    <input type="text" name="dbname" class="form-control" id="databasename" aria-describedby="databasename">
                </div>
                <div class="form-group">
                    <label for="databaseuser">Database User</label>
                    <input type="text" name="dbuser" class="form-control" id="databaseuser" aria-describedby="databaseuser">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="dbpass" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Connect</button>
            </form>
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