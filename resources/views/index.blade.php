<!DOCTYPE html>
<html>
<head>
	<title>List Mahasiswa</title>
	<link href="css_hedar/css/bootstrap.min.css" rel="stylesheet">
    <link href="css_hedar/css1/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css_hedar/css/style.css" rel="stylesheet">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	<style>
        .align-middle{
            vertical-align: middle !important;
        }
        </style>


		<!-- pop up  -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- library jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


	<br/>
	<br/>
	<div class="container">
	<div class="panel panel-info">
	<div class="panel-heading">
<h3>Data Mahasiswa</h3>
</div>
<div class="panel-body ">
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th class="text-center">NO</th>	
			<th>NIM</th>
			<th>NAMA</th>
			<th>KELAS</th>
			<th>PRODI</th>
			<th>Opsi</th>
		</tr>
		<?php $no = 0;?>
		@foreach($mahasiswa as $p)
		<?php $no++ ;?>
		<tr>
			<td class="align-middle text-center"><?php echo $no; ?></td>
			<td>{{ $p->nim }}</td>
			<td>{{ $p->nama_mahasiswa }}</td>
			<td>{{ $p->kelas }}</td>
			<td>{{ $p->prodi }}</td>
			<td>
			
				<a class='btn btn-primary btn-sm' data-toggle="modal" data-target="#updateForm" data_id="{{ $p->nim }}">Edit</a>
				<a class='btn btn-danger btn-sm'  href="/mahasiswa/hapus/{{ $p->nim }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
	<button class="btn btn-primary " data-toggle="modal" data-target="#modalForm">
    + Tambah Mahasiswa Baru
</button>
<!-- Modal Input Brayyyyyyyyyyyyyyyyyyy -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="labelModalKu">Form Tambah Mahasiswa</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" action="/mahasiswa/store" method="post">
				{{ csrf_field() }}
				<div class="form-group">
                        <label for="masukkanNama">NIM</label>
                        <input type="text" class="form-control" name="nim" id="masukkanNim" placeholder="Masukkan NIM Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanNama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="masukkanNama" placeholder="Masukkan nama Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanEmail">Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="masukkanKelas" placeholder="Masukkan kelas Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanPesan">Prodi</label>
                        <input type="text" class="form-control" name="prodi" id="masukkanProdi" placeholder="Masukkan prodi Anda"></input>
                    </div>
					<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submitBtn">KIRIM</button>
            </div>
                </form>
            </div>
            <!-- Modal Footer -->
           
        </div>
    </div>
</div>


<!-- Modal Update Brayyyyyyyyyyyyyyyyyyy -->
<div class="modal fade" id="updateForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="labelModalKu">Contact Form</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
				@foreach($mahasiswa as $p)
                <form role="form" action="/mahasiswa/update" method="post">
				{{ csrf_field() }}
				<div class="form-group">
                        <label for="masukkanNama">NIM</label>
                        <input value="{{ $p->nim }}" type="text" class="form-control" name="nim" id="masukkanNim" placeholder="Masukkan NIM Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanNama">Nama</label>
                        <input value="{{ $p->nama_mahasiswa }}" type="text" class="form-control" name="nama" id="masukkanNama" placeholder="Masukkan nama Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanEmail">Kelas</label>
                        <input value="{{ $p->kelas }}" type="text" class="form-control" name="kelas" id="masukkanKelas" placeholder="Masukkan kelas Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="masukkanPesan">Prodi</label>
                        <input value="{{ $p->prodi }}" type="text" class="form-control" name="prodi" id="masukkanProdi" placeholder="Masukkan prodi Anda"></input>
                    </div>
					<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submitBtn">Update</button>
            </div>
                </form>
				@endforeach
            </div>
            <!-- Modal Footer -->
           
        </div>
    </div>
</div>


</div>
</div>
</div>
</div>

</body>
</html>