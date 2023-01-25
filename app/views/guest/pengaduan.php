<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between">
        <a href="<?= BASEURL ?>/guest/index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali
        </a>
    </div>
</div>
<div class="container-lg mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Utarakan Keluhanmu</h1>
    </div>
    <div class="container-fluid mt-4">
        <?php Flasher::flash(); ?>
    </div>
    <div class="p-3 bg-light border rounded">

        <form method="post" action="<?= BASEURL ?>/guest/insertAduan" enctype="multipart/form-data">
            <div class="mb-2">
                <input type="hidden" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" value="<?= date('Y-m-d') ?>" autocomplete="off">
            </div>
            <div class="mb-2">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" autocomplete="off">
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
            </div>
            <div class="mb-2">
                <label for="telp" class="form-label">No. Telp</label>
                <input type="number" class="form-control" id="telp" name="telp" autocomplete="off">
            </div>
            <div class="mb-2">
                <label for="subjek" class="form-label">Subjek</label>
                <input type="text" tabindex="-1" class="form-control" id="subjek" name="subjek">
            </div>
            <div class="mb-2">
                <label for="pengaduan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="pengaduan" name="pengaduan" rows="3"></textarea>
            </div>
            <div class="mb-2">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="mb-2">
                <input type="hidden" class="form-control" id="status" name="status" value="<?= date('d M Y') ?>" value="0" autocomplete="off">
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">Submit!</button>
            </div>
        </form>
    </div>
</div>