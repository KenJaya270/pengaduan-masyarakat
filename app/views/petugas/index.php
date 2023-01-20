<!--Berita Utama-->
<div class="content">
    <div class="container mb-5">
        <h2 class="text-dark">Keluhan-keluhan Masyarakat</h2>
        <?php foreach ($data['allKeluhan'] as $keluhan) : ?>
            <a class="container mt-1" href="">
                <ul class="p-0">
                    <li class="bg-light p-3 list-group-item rounded d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="rounded w-25" src="<?= BASEURL ?>/img/<?= $keluhan['foto'] ?>" alt="">
                            <div class="container">
                                <h4 class="no-decoration"><?= $keluhan['subjek'] ?></h4>
                                <p class="text-dark m-0 no-decoration"><small><?= $keluhan['email'] ?></small></p>
                                <p class="text-dark m-0 no-decoration"><?= $keluhan['pengaduan'] ?></p>
                            </div>
                        </div>
                        <ul class="p-0">
                            <!-- Dropdown - User Information -->
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Aksi:</div>
                                    <a class="dropdown-item" href="<?= BASEURL ?>/petugas/lihatKeluhan/<?= $keluhan['id_pengaduan'] ?>">Lihat Keluhan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= BASEURL ?>/petugas/sudahDibaca/<?= $keluhan['id_pengaduan'] ?>">Tandai Sudah Dibaca</a>
                                </div>
                            </div>
                        </ul>
                    </li>
                </ul>
            </a>
        <?php endforeach; ?>
        <a class="container mt-1" href="">
            <ul class="p-0">
                <li class="bg-light p-3 list-group-item rounded">
                    <div class="d-flex align-items-center">
                        <img class="rounded w-25" src="<?= BASEURL ?>/img/berita2.webp" alt="">
                        <div class="container">
                            <h4 class="no-decoration">Berita Dhea Onlyfans Terkini Hari Ini</h4>
                            <p class="text-dark m-0 no-decoration">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </a>
        <a class="container mt-1" href="">
            <ul class="p-0">
                <li class="bg-light p-3 list-group-item rounded">
                    <div class="d-flex align-items-center">
                        <img class="rounded w-25" src="<?= BASEURL ?>/img/berita3.webp" alt="">
                        <div class="container">
                            <h4 class="no-decoration">MEGAWATI MENAIKKAN PAJAK BENSIN BBMAPPLE WATCH SERIES 8 DIPREDIKSI DAPAT MENDETEKSI DEMAM</h4>
                            <p class="text-dark m-0 no-decoration">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </a>
        <a class="container mt-1" href="">
            <ul class="p-0">
                <li class="bg-light p-3 list-group-item rounded">
                    <div class="d-flex align-items-center">
                        <img class="rounded w-25" src="<?= BASEURL ?>/img/berita4.jpg" alt="">
                        <div class="container">
                            <h4 class="no-decoration">SAMBO BERBOHONG? NAMUN MASIH KUKUH DENGAN PERNYATAAN PEMERKOSAAN</h4>
                            <p class="text-dark m-0 no-decoration">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </a>
        <a class="container mt-1" href="">
            <ul class="p-0">
                <li class="bg-light p-3 list-group-item rounded">
                    <div class="d-flex align-items-center">
                        <img class="rounded w-25" src="<?= BASEURL ?>/img/berita5.jpg" alt="">
                        <div class="container">
                            <h4 class="no-decoration">Steam Diblokir, Pemilik Akun @razfaren Rugi Rp 300 Juta dan Minta Ganti Rugi ke KEMENKOMINFO</h4>
                            <p class="text-dark m-0 no-decoration">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </a>
    </div>

    </section>