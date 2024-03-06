<h1 class="display-5 mt-1 text-center">Book Library</h1>
<br>
<div class="card">
    <div class="card-body">
    <div class="rows">
    <div class="col-md-12">
        <form method="post">
        <?php
            $id = $_GET['id'];
            if(isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];
                $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku='$id' ");

                if($query) {
                    echo '<script>alert("Change data successfully.");</script>';
                }else{
                    echo '<script>alert("Change data failed.");</script>';
                }
            }
            $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE id_buku=$id");
            $data = mysqli_fetch_array($query);
        ?>
            <div class="rows mb-3">
                <div class="col-md-4">Nama Kategori</div>
                <div class="col-md-8-right">
                    <select name="id_kategori" class="form-control">
                        <?php
                            $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                            while($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                <option <?php if($kategori['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="rows mb-3">
                <div class="col-md-4">Judul</div>
                <div class="col-md-8-right"><input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul"></div>
            </div>
            <div class="rows mb-3">
                <div class="col-md-4">Penulis</div>
                <div class="col-md-8-right"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis"></div>
            </div>
            <div class="rows mb-3">
                <div class="col-md-4">Penerbit</div>
                <div class="col-md-8-right"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
            </div>
            <div class="rows mb-3">
                <div class="col-md-4">Tahun Terbit</div>
                <div class="col-md-8-right"><input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit"></div>
            </div>
            <div class="rows mb-3">
                <div class="col-md-4">Deskripsi</div>
                <div class="col-md-8-right">
                    <textarea name="deskripsi" rows="5" class="form-control" value="<?php echo $data['deskripsi']; ?>"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <br>
            <button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="?page=buku" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
</div>