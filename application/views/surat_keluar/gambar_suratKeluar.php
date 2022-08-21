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



            <?= form_open_multipart('SuratKeluar/EditGambar'); ?>
            <input type="hidden" name="nomor_urut" value="<?= $surat_keluar['nomor_urut'] ?>">
            <div class="card mb-3">
                <input type="hidden" name="nomor_urut" value="<?= $surat_keluar['nomor_urut'] ?>">
                <img src="<?= base_url('assets/img/SuratKeluar/') . $surat_keluar['photo'] ?>" class="card-img-top" alt="Picture not found">
                <div class="card-body">
                    <h5 class="card-title">Surat dari <?= $surat_keluar['alamat_pengirim'] ?></h5>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->