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

    <?php if (empty($disposisi_keluar)) : ?>
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
            foreach ($disposisi_keluar as $disposisiKeluar) :
            ?>
                <tr>
                    <td> <?= $disposisiKeluar['surat_dari']; ?> </td>
                    <td> <?= $disposisiKeluar['no_surat']; ?> </td>
                    <td> <?= $disposisiKeluar['tanggal_surat']; ?> </td>
                    <td> <?= $disposisiKeluar['diterima_tanggal']; ?> </td>
                    <td> <?= $disposisiKeluar['no_agenda']; ?> </td>
                    <td> <?= $disposisiKeluar['sifat']; ?> </td>
                    <td> <?= $disposisiKeluar['perihal']; ?> </td>
                    <td> <?= $disposisiKeluar['diteruskan_kepada']; ?> </td>
                    <td> <?= $disposisiKeluar['dengan_hormat_harap']; ?> </td>
                    <td> <?= $disposisiKeluar['catatan']; ?> </td>

                    <td>
                        <a href="<?= base_url(); ?>SuratKeluar/EditDisposisi/<?= $disposisiKeluar['nomor_urut'] ?>/<?= $disposisiKeluar['id_disposisi'] ?> " class="badge badge-success"> Edit</a>
                        <a href="<?= base_url(); ?>SuratKeluar/HapusDisposisi/<?= $disposisiKeluar['nomor_urut'] ?>/<?= $disposisiKeluar['id_disposisi'] ?> " class="badge badge-danger" onclick="return confirm('Are you sure to delete this data?');"> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <a href="<?= base_url(); ?>SuratKeluar/TambahDisposisi/<?= $no_urut ?>" class="btn btn-primary"> Add</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->