<!--Berita Utama-->
<div class="content">
    <div class="container mb-5">
        <h2 class="text-dark">Keluhan-keluhan Masyarakat</h2>
        <?php Flasher::flash(); ?>
        <?php foreach ($data['allKeluhan'] as $keluhan) : ?>
            <div class="container mt-1 p-0 no-decoration" data-target="#exampleModal<?= $keluhan['id_pengaduan'] ?>" data-toggle="modal">
                <ul class=" p-0">
                    <li class="bg-light p-3 list-group-item rounded d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded w-25" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                            <div class="container">
                                <h4 class="text-dark no-decoration"><?= $keluhan['subjek'] ?></h4>
                                <p class="text-dark m-0 no-decoration"><small><i>By <?= $keluhan['nama'] ?></i></small></p>
                                <p class="text-dark m-0 no-decoration"><?= $keluhan['pengaduan'] ?></p>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user-login'])) : ?>
                            <ul class="p-0">
                                <!-- Dropdown - User Information -->
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="<?= BASEURL ?>/petugas/sudahDibaca/<?= $keluhan['id_pengaduan'] ?>">Tandai Sudah Dibaca</a>
                                    </div>
                                </div>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    </section>
    <?php foreach ($data['allKeluhan'] as $keluhan) : ?>
        <div class="modal fade" id="exampleModal<?= $keluhan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Keluhan <?= $keluhan['nama'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= BASEURL ?>/petugas/updateStatus" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id_petugas" value="<?= $_SESSION['user-login']['id_petugas'] ?>">
                            <input type="hidden" name="id_pengaduan" value="<?= $keluhan['id_pengaduan'] ?>">
                            <input type="hidden" name="tgl_tanggapan" id="tgl_tanggapan" value="<?= date('Y-m-d') ?>">
                            <div class="form-group">
                                <?= date('d M Y', strtotime($keluhan['tgl_pengaduan'])) ?>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <img class="rounded" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="" id="" value="<?= $keluhan['subjek'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="pengaduan" id="pengaduan" readonly><?= $keluhan['pengaduan'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <?php if ($keluhan['status'] == 0) : ?>
                                    <p class="text-danger fw-bolder">Belum Ditangani</p>
                                <?php elseif ($keluhan['status'] == 'proses') : ?>
                                    <p class="text-warning fw-bolder">Dalam Penangan</p>
                                <?php else : ?>
                                    <p class="text-success fw-bolder">Sudah Ditangani</p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea class="form-control" name="tanggapan" id="tanggapan" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <input type="submit" class="btn btn-danger" value="Belum Ditangani"> -->
                            <input type="submit" class="btn btn-warning" value="Sedang Ditangani">
                            <input type="submit" class="btn btn-success" value="Sudah Ditangani">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>