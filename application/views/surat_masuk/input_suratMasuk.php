<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card">

        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        </div>

        <div class="card-body">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <form action="<?= base_url('SuratMasuk/Input') ?>" method="POST">
                <div class="mb-3">
                    <label for="NomorBerkas" class="form-label">Nomor Berkas</label>
                    <input type="text" class="form-control" id="NomorBerkas" name="nomorberkas" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="AlamatPengirim" class="form-label">Alamat Pengirim</label>
                    <input type="text" class="form-control" id="AlamatPengirim" name="alamatpengirim">
                </div>
                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal" name="tanggal">
                </div>
                <div class="mb-3">
                    <label for="Nomor" class="form-label">Nomor</label>
                    <input type="text" class="form-control" id="Nomor" name="nomor">
                </div>
                <div class="mb-3">
                    <label for="Perihal" class="form-label">Perihal</label>
                    <input type="text" class="form-control" id="Perihal" name="perihal">
                </div>
                <div class="mb-3">
                    <label for="NomorPetunjuk" class="form-label">NomorPetunjuk</label>
                    <input type="text" class="form-control" id="NomorPetunjuk" name="nomorpetunjuk">
                </div>
                <div class="mb-3">
                    <label for="NomorPaket" class="form-label">NomorPaket</label>
                    <input type="text" class="form-control" id="NomorPaket" name="nomorpaket">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->