<?php include 'header.php' ?>

    <!-- content -->
    <div class="content">

        <div class="container">

            <div class="box">

                <div class="box-header">
                    Tambah Jurusan
                </div>

                <div class="box-body">

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Jurusan" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="keterangan" placeholder="Keterangan" class="input-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="input-control" required>
                        </div>

                        <button type="button" class="button" onclick="window.location = 'jurusan.php'">Kembali</button>
                        <input type="submit" name="submit" value="Simpan" class="button button-green">
                    </form>

                    <?php 
                    
                        if(isset($_POST['submit'])){

                            // print_r($_FILES['gambar']);

                            $nama   = addslashes(ucwords($_POST['nama']));
                            $ket    = addslashes($_POST['keterangan']);

                            $filename   = $_FILES['gambar']['name'];
                            $tmpname    = $_FILES['gambar']['tmp_name'];
                            $filesize   = $_FILES['gambar']['size'];

                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename     = 'jurusan'.time().'.' .$formatfile;

                            $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                            if(!in_array($formatfile, $allowedtype)) {
                                
                                echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';
                            
                            }elseif($filesize > 2000000) {
                                echo '<div class="alert alert-error">Ukuran file max. 2 MB.</div>';

                            }else{

                                move_uploaded_file($tmpname, "../uploads/jurusan/".$rename);

                                $simpan = mysqli_query($koneksi, "INSERT INTO jurusan VALUES (
                                        null,
                                        '".$nama."',
                                        '".$ket."',
                                        '".$rename."',
                                        null,
                                        null
                                )");
        
                                if($simpan){
                                    echo '<div class="alert alert-success">Data Berhasil Disimpan.</div>';
                                }else{
                                    echo 'Data Gagal Disimpan. '.mysqli_error($koneksi);
                                }

                            }

                        }
      
                    ?>
                    
                </div>

            </div>

        </div>

    </div>

<?php include 'footer.php' ?>