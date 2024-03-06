<h1 class="display-5 mt-1 text-center">Book Library</h1>
<div class="card p-2">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
    <?php    
    if(isset($_POST['submit'])){
        $id_kategori =$_POST['id_kategori'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $deskripsi = $_POST['deskripsi'];
        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) values('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

        if ($query) {
            echo '<script>alert("Added data successfully."); location.href="?page=buku"</script>';
            # code...
        }  else {
            echo '<script>alert("Added data failed.");"</script>';
        }
    }
    
    ?>


        <div class="row">
            <div class="col-md-2">Kategori</div>
            <div class="col-md-8 mb-4">
                <select name="id_kategori" class="form-control">
                <?php 
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                    while($kategori = mysqli_fetch_array($kat)) {
                        ?>
                        <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                        <?php
                    }                
                ?>
                </select>
            
            
        </div>

        <div class="row">
            <div class="col-md-2">Judul</div>
            <div class="col-md-8 mb-4"><input type="text" class="form-control" required 
            name="judul"></div>
        </div>

        <div class="row">
            <div class="col-md-2">Penulis</div>
            <div class="col-md-8 mb-4"><input type="text" class="form-control" required name="penulis"></div>
        </div>


        <div class="row">
            <div class="col-md-2">Penerbit</div>
            <div class="col-md-8 mb-4"><input type="text" class="form-control" required name="penerbit"></div>
        </div>


        <div class="row">
            <div class="col-md-2">Tahun Terbit</div>
            <div class="col-md-8 mb-4"><input type="number" class="form-control" required name="tahun_terbit"></div>
        </div>


        <div class="row">
            <div class="col-md-2">Deskripsi</div>
            <div class="col-md-8 mb-4">
                <textarea name="deskripsi" rows="5" class="form-control"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8 mb-4">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a href="?page=buku" class="btn btn-danger">Kembali</a></col-md-8>
                </div>
            
        </div>
       </form>

    </div>
</div>
    </div>
</div>