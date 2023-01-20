<!--Berita Utama-->
<div class="content">
    <div class="container mb-5">
        <h2 class="text-dark">Keluhan-keluhan Masyarakat</h2>
        <?php foreach ($data['allKeluhan'] as $keluhan) : ?>
            <a class="container mt-1">
                <ul class=" p-0">
                    <li class="bg-light p-3 list-group-item rounded d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded w-25" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                            <div class="container">
                                <h4 id="subjek" class="text-dark no-decoration"><?= $keluhan['subjek'] ?></h4>
                                <p id="email" class="text-dark m-0 no-decoration"><small><i>By <?= $keluhan['email'] ?></i></small></p>
                                <p id="pengaduan" class="text-dark m-0 no-decoration"><?= $keluhan['pengaduan'] ?></p>

                                <!-- <form action="<?= BASEURL ?>/admin/editKeluhan" class="" method="post" id="formEditKeluhan">
                                    <div class="mb-1">

                                        <input class="form-control" type="text" name="subjek" id="subjek_edit">
                                    </div>
                                </form> -->
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
                                        <!-- <a class="dropdown-item" id="editLink" data-id="<?= $keluhan['id_pengaduan'] ?>" data-subjek="<?= $keluhan['subjek'] ?>" data-pengaduan="<?= $keluhan['pengaduan'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="<?= BASEURL ?>/petugas/sudahDibaca/<?= $keluhan['id_pengaduan'] ?>">Tandai Sudah Dibaca</a>
                                    </div>
                                </div>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </a>
        <?php endforeach; ?>
    </div>

    </section>