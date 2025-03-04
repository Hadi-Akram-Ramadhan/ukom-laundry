<?php
$title = 'outlet';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT outlet.*, user.nama_user FROM outlet LEFT JOIN user ON user.outlet_id = outlet.id_outlet';
$data = ambildata($conn,$query);
?>
<div class="container-fluid">
    <div class="doy row bg-title">
        <div class="doy col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Outlet</h4>
        </div>
        <div class="doy col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Outlet</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="outlet_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i>
                            Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i
                                class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Owner</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($data)): ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach($data as $outlet): ?>
                            <tr>
                                <td></td>
                                <td><?= htmlspecialchars($outlet['nama_outlet']); ?></td>
                                <td>
                                    <?= $outlet['nama_user'] ? htmlspecialchars($outlet['nama_user']) : 'Belum Ada Owner'; ?>
                                </td>
                                <td><?= htmlspecialchars($outlet['telp_outlet']); ?></td>
                                <td><?= htmlspecialchars($outlet['alamat_outlet']); ?></td>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="outlet_edit.php?id=<?= $outlet['id_outlet']; ?>" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit" class="btn btn-success"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="outlet_hapus.php?id=<?= $outlet['id_outlet']; ?>"
                                            onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip"
                                            data-placement="bottom" title="Hapus" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">

    </div>
</div>
<?php
require'layout_footer.php';
?>