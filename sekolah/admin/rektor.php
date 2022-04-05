<?php include 'header.php' ?>

    <!-- content -->
    <div class="content">

        <div class="container">

            <div class="box">

                <div class="box-header">
                    Rektor Universitas
                </div>

                <div class="box-body">

                    <?php
                        if(isset($_GET['success'])){
                            echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                        }
                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Rektor</label>
                            <input type="text" name="nama" placeholder="Nama Rektor" value="<?= $d->nama_rektor ?>" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Sambutan</label>
                            <textarea name="sambutan" id="keterangan" placeholder="Sambutan Rektor" class="input-control"><?= $d->sambutan_rektor ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <img src="../uploads/identitas/<?= $d->foto_rektor ?>" width="200px" class="image">
                            <input type="hidden" name="foto_lama" value="<?= $d->foto_rektor ?>">
                            <input type="file" name="foto_baru" class="input-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Perubahan" class="button button-green">
                    </form>

                    <?php 
                    
                        if(isset($_POST['submit'])){

                            $nama       = addslashes(ucwords($_POST['nama']));
                            $sambutan   = addslashes($_POST['sambutan']);
                            $currdate   = date('Y-m-d H:i:s');

                            // menampung dan validasi data foto sekolah

                            if($_FILES['foto_baru']['name'] != ''){

                                $filename   = $_FILES['foto_baru']['name'];
                                $tmpname    = $_FILES['foto_baru']['tmp_name'];
                                $filesize   = $_FILES['foto_baru']['size'];

                                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                $rename     = 'rektor'.time().'.' .$formatfile;

                                $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                                if(!in_array($formatfile, $allowedtype)) {
                                
                                    echo '<div class="alert alert-error">Format file foto rektor tidak diizinkan.</div>';
                                
                                    return false;

                                }elseif($filesize > 1000000) {

                                    echo '<div class="alert alert-error">Ukuran file foto rektor max. 1 MB.</div>';
    
                                    return false;

                                }else{

                                    if(file_exists("../uploads/identitas/".$_POST['foto_lama'])){

                                        unlink("../uploads/identitas/".$_POST['foto_lama']);
                                    }

                                    move_uploaded_file($tmpname, "../uploads/identitas/".$rename);

                                }
   
                            }else{

                                $rename     = $_POST['foto_lama'];

                            }

                            $update = mysqli_query($koneksi, "UPDATE pengaturan SET
                                    nama_rektor     = '".$nama."',
                                    sambutan_rektor = '".$sambutan."',
                                    foto_rektor     = '".$rename."',
                                    updated_at      = '".$currdate."'
                                    WHERE id        = '".$d->id."'
                                ");

                            if($update){
                                echo "<script>window.location='rektor.php?success=Edit Data Berhasil'</script>";
                            }else{
                                echo 'Edit Data Gagal'.mysqli_error($koneksi);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>