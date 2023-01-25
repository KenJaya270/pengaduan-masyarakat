<!-- Page Wrapper -->
<div id="wrappers">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column w-100">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid mt-4">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Daftar Petugas</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPetugas">Tambah Petugas</button>
                </div>
                <div class="col-sm-7">
                    <?php Flasher::flash(); ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Telephone</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Telephone</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data['allUser'] as $petugas) : ?>
                                <?php if ($i % 2 == 0) : ?>
                                    <tr class="bg-gray-100">
                                    <?php endif; ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $petugas['nama_petugas'] ?></td>
                                    <td><?= $petugas['username']; ?></td>
                                    <td><?= $petugas['telp']; ?></td>
                                    <td><?= $petugas['level']; ?></td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle text-center" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="aksi">
                                                <a class="dropdown-item" href="<?= BASEURL ?>/admin/hapusUser/<?= $petugas['id_petugas'] ?>">Hapus</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#editPetugas<?= $petugas['id_petugas'] ?>">Edit Petugas</a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class=" modal fade" id="tambahPetugas" tabindex="-1" aria-labelledby="modalTambahSiswa" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Tambah User</h5>
                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="<?= BASEURL; ?>/admin/tambahPetugas" method="post" id="form">
                                <div class="mb-1">
                                    <label for="username" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="password" class="col-form-label">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="level" class="col-form-label">Level:</label>
                                    <select name="level" id="level" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($data['allUser'] as $user) { ?>
                <div class="modal fade" id="editPetugas<?= $user['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user'] ?>">
                                    <div class="form-group">
                                        <label for="username" class="col-form-label">Username</label>
                                        <input type="text" name="username" id="username2" class="form-control" value="<?= $user['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->