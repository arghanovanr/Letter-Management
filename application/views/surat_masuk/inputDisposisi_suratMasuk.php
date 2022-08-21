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


            <form action="<?= base_url() ?>SuratMasuk/TambahDisposisi/<?= $disposisi_masuk['nomor_urut'] ?>" method="POST">
                <div class="mb-3">
                    <label for="SuratDari" class="form-label">Surat dari</label>
                    <input type="text" class="form-control" id="SuratDari" name="suratdari" aria-describedby="emailHelp" value="<?= $surat_masuk['alamat_pengirim'] ?>">
                </div>
                <div class="mb-3">
                    <label for="NoSurat" class="form-label">No Surat</label>
                    <input type="text" class="form-control" id="NoSurat" name="nosurat" value="<?= $surat_masuk['nomor'] ?>">
                </div>
                <div class="mb-3">
                    <label for="TanggalSurat" class="form-label">Tanggal surat</label>
                    <input type="date" class="form-control" id="TanggalSurat" name="tanggalsurat" value="<?= $surat_masuk['tanggal'] ?>">
                </div>
                <div class="mb-3">
                    <label for="DiterimaTanggal" class="form-label">Diterima tanggal</label>
                    <input type="date" class="form-control" id="DiterimaTanggal" name="diterimatanggal">
                </div>
                <div class="mb-3">
                    <label for="NoAgend" class="form-label">No agenda</label>
                    <input type="text" class="form-control" id="NoAgenda" name="noagenda">
                </div>
                <div class="mb-3">
                    <label for="Sifat" class="form-label">Sifat</label>
                    <input type="text" class="form-control" id="Sifat" name="sifat">
                </div>
                <div class="mb-3">
                    <label for="Perihal" class="form-label">Perihal</label>
                    <input type="text" class="form-control" id="Perihal" name="perihal" value="<?= $surat_masuk['perihal'] ?>">
                </div>
                <div class="mb-3">
                    <label for="DiteruskanKepada" class="form-label">Diteruskan kepada</label>
                    <input type="text" class="form-control" id="DiteruskanKepada" name="diteruskankepada">
                </div>
                <div class="mb-3">
                    <label for="DenganHormatHarap" class="form-label">Dengan hormat harap</label>
                    <input type="text" class="form-control" id="DenganHormatHarap" name="denganhormatharap">
                </div>
                <div class="mb-3">
                    <label for="Catatan" class="form-label">Catatan</label>
                    <input type="text" class="form-control" id="Catatan" name="catatan">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->