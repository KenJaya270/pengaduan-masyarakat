<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" method="post" action="<?= BASEURL ?>/admin/editUser">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" name="username" id="username2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= BASEURL ?>/auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL ?>/js/admin2.js"></script>
<script src="<?= BASEURL ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL ?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL ?>/js/demo/chart-area-demo.js"></script>
<script src="<?= BASEURL ?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>