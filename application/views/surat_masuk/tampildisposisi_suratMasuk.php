<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('message') ?>.
        </div>
    <?php endif; ?>

    <form action="" method="POST">

    </form>

    <?php if (empty($disposisi_masuk)) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            Data disposisi surat not found !
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Surat dari</th>
                <th>No surat</th>
                <th>Tanggal surat</th>
                <th>Diterima tanggal</th>
                <th>No agenda</th>
                <th>Sifat</th>
                <th>Perihal</th>
                <th>Diteruskan kepada</th>
                <th>Dengan hormat harap</th>
                <th>Catatan</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($disposisi_masuk as $disposisiMasuk) :
            ?>
                <tr>
                    <td> <?= $disposisiMasuk['surat_dari']; ?> </td>
                    <td> <?= $disposisiMasuk['no_surat']; ?> </td>
                    <td> <?= $disposisiMasuk['tanggal_surat']; ?> </td>
                    <td> <?= $disposisiMasuk['diterima_tanggal']; ?> </td>
                    <td> <?= $disposisiMasuk['no_agenda']; ?> </td>
                    <td> <?= $disposisiMasuk['sifat']; ?> </td>
                    <td> <?= $disposisiMasuk['perihal']; ?> </td>
                    <td> <?= $disposisiMasuk['diteruskan_kepada']; ?> </td>
                    <td> <?= $disposisiMasuk['dengan_hormat_harap']; ?> </td>
                    <td> <?= $disposisiMasuk['catatan']; ?> </td>

                    <td>
                        <a href="<?= base_url(); ?>SuratMasuk/EditDisposisi/<?= $disposisiMasuk['nomor_urut'] ?>/<?= $disposisiMasuk['id_disposisi'] ?> " class="badge badge-success"> Edit</a>
                        <a href="<?= base_url(); ?>SuratMasuk/HapusDisposisi/<?= $disposisiMasuk['nomor_urut'] ?>/<?= $disposisiMasuk['id_disposisi'] ?> " class="badge badge-danger" onclick="return confirm('Are you sure to delete this data?');"> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <a href="<?= base_url(); ?>SuratMasuk/TambahDisposisi/<?= $no_urut ?>" class="btn btn-primary"> Add</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->