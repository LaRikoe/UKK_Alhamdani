<h1 class="display-5 mt-1 text-center">Kategori Buku</h1>
<br>
<div class="card p-1">
    <div class="card-body">
    <div class="card">
    <div class="card-body">
<div class="rows">
    <div class="col-md-12">
        <a href="?page=kategori_tambah" class="btn btn-primary">Tambah Data</a><br>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM kategori");
                while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td>
                    <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Are you sure you deleted the data?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-dark grey">Hapus</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
    </div>
</div>