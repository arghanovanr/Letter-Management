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
        <div class="input-group ">
            <input type="text" class="form-control" placeholder="Search Surat masuk..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <?php if (empty($surat_masuk)) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            Data surat not found !
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Nomor Urut</th>
                <th>Nomor Berkas</th>
                <th>Alamat Pengirim</th>
                <th>Tanggal</th>
                <th>Nomor</th>
                <th>Perihal</th>
                <th>Nomor Petunjuk</th>
                <th>Nomor Paket</th>
                <th>Surat Disposisi</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($surat_masuk as $suratMasuk) :
            ?>
                <tr>
                    <th> <?= $suratMasuk['nomor_urut']; ?> </th>
                    <td> <?= $suratMasuk['nomor_berkas']; ?> </td>
                    <td> <?= $suratMasuk['alamat_pengirim']; ?> </td>
                    <td> <?= $suratMasuk['tanggal']; ?> </td>
                    <td> <?= $suratMasuk['nomor']; ?> </td>
                    <td> <?= $suratMasuk['perihal']; ?> </td>
                    <td> <?= $suratMasuk['nomor_petunjuk']; ?> </td>
                    <td> <?= $suratMasuk['nomor_paket']; ?> </td>
                    <td>
                        <a href="<?= base_url(); ?>SuratMasuk/TampilDisposisi/<?= $suratMasuk['nomor_urut'] ?> " class="badge badge-success">Disposisi</a>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>SuratMasuk/Gambar/<?= $suratMasuk['nomor_urut'] ?> " class="badge badge-success">Picture</a>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>SuratMasuk/Edit/<?= $suratMasuk['nomor_urut'] ?> " class="badge badge-success"> Edit</a>
                        <a href="<?= base_url(); ?>SuratMasuk/Hapus/<?= $suratMasuk['nomor_urut'] ?> " class="badge badge-danger" onclick="return confirm('Are you sure to delete this data?');"> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->