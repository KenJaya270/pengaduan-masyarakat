<!--Berita Utama-->
<div class="content">
    <div class="container mb-5">
        <h2 class="text-dark">Keluhan-keluhan Masyarakat</h2>
        <?php foreach ($data['allKeluhan'] as $keluhan) : ?>
            <div class="text-decoration-none text-dark container mt-1 p-0">
                <ul class="p-0">
                    <li class="bg-light p-3 list-group-item rounded d-flex justify-content-between" type="button" data-toggle="modal" data-target="#exampleModal<?= $keluhan['id_pengaduan'] ?>">
                        <div class="d-flex align-items-center">
                            <img class="rounded w-25" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                            <div class="container">
                                <h4 id="subjek" class="text-dark no-decoration"><?= $keluhan['subjek'] ?></h4>
                                <p id="email" class="text-dark m-0 no-decoration"><small><i>By <?= $keluhan['nama'] ?></i></small></p>
                                <p id="pengaduan" class="text-dark m-0 no-decoration"><?= $keluhan['pengaduan'] ?></p>
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
                    <div class="modal-body">
                        <div class="form-group">
                            <?= date('d M Y', strtotime($keluhan['tgl_pengaduan'])) ?>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <img class="rounded" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                        </div>
                        <div class="form-group">
                            <h4><?= $keluhan['subjek'] ?></h4>
                        </div>
                        <div class="form-group">
                            <?= $keluhan['pengaduan'] ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>