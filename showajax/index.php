<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header" style="width: 100%">
        <nav class="navbar navbar-light bg-primary" style="height: 60px;">
            <h3 style="color: white">Starbhak Soft</h3>
        </nav>
    </div>
    <h2 style="text-align: center; margin: 15px 0px;">Data Siswa</h2>
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="data" class="table table-striped table-bordered" align="center" style="width: 100%">
                <thead>
                    <tr class="bg-warning">
                        <td style="text-align: center">No</td>
                        <td style="text-align: center">Nama Siswa</td>
                        <td style="text-align: center">Alamat</td>
                        <td style="text-align: center">Kelamin</td>
                        <td style="text-align: center">Jurusan</td>
                        <td style="text-align: center">Tanggal Masuk</td>
                        <td style="text-align: center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        include 'koneksi.php';
                        $no = 1;
                        $query = "SELECT * FROM tbl_siswa ORDER BY id DESC";
                        $dewan1 = $db1->prepare($query);
                        $dewan1->execute();
                        $res1   = $dewan1->get_result();
                        while ($row = $res1->fetch_assoc()){
                            $id = $row['id'];
                            $nama_siswa = $row['nama_siswa'];
                            $alamat = $row['alamat'];
                            $kelamin = $row['jenis_kelamin'];
                            $jurusan = $row['jurusan'];
                            $tgl_masuk = $row['tgl_masuk'];
                    ?> 
                    <tr>
                            <td style="text-align: center"><?php echo $no++; ?></td>
                            <td><?php echo $nama_siswa; ?></td>
                            <td><?php echo $alamat; ?></td>
                            <td><?php echo $kelamin; ?></td>
                            <td><?php echo $jurusan; ?></td>
                            <td style="text-align: center"><?php echo $tgl_masuk; ?></td>
                            <td style="text-align: center">
                                <button style='font-size: 12px;' class="btn btn-primary" id="detail" name="detail" title="lihat detail">
                                    <i class='fa fa-search'></i>
                                </button>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="viewModal" class="modal fade mr-tp-100" role="dialog">
        <div class="modal-dialog modal-lg flipInX animated">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">View Data</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" id="id" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" id="nama_siswa" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" id="jurusan" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" id="tgl_masuk" class="form-control" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTable  -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            let table = $('#data').DataTable();

            $('#data tbody').on( 'click', '#detail', function (){
                var current_row = $(this).parents('tr');
                if (current_row.hasClass('child'))  {
                    current_row = current_row.prev();
                }
                var data = table.row( current_row ).data();
                console.log(data)

                document.getElementById("id").value = data[0];
                document.getElementById("nama_siswa").value = data[1];
                document.getElementById("alamat").value = data[2];
                document.getElementById("jenis_kelamin").value = data[3];
                document.getElementById("jurusan").value = data[4];
                document.getElementById("tgl_masuk").value = data[5];

                $("#viewModal").modal("show");
            });
        });
    </script>

    

</body>
</html>