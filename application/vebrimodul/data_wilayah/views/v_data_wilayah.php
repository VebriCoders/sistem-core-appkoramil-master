<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Wilayah</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">Data Wilayah</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>


<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <!-- Contact Toolbar -->
    <!---------------------------------->
    <div class="row pad-btm">
        <div class="col-sm-6 toolbar-left">
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah Data</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right text-right">
            Sort by :
            <div class="select">
                <select id="demo-ease">
                    <option value="date-created" selected="">Date Created</option>
                    <option value="date-modified">Date Modified</option>
                    <option value="frequency-used">Frequency Used</option>
                    <option value="alpabetically">Alpabetically</option>
                    <option value="alpabetically-reversed">Alpabetically Reversed</option>
                </select>
            </div>
            <button class="btn btn-default">Filter</button>
            <button class="btn btn-primary"><i class="demo-psi-gear icon-lg"></i></button>
        </div> -->
    </div>
    <!---------------------------------->

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Wilayah</h3>
        </div>
        <div class="panel-body">
            <table id="tabel-basic-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10px">No.</th>
                        <th width="70px">Foto</th>
                        <th>Nama Wilayah</th>
                        <th>Kepala Desa</th>
                        <th width="200px">Alamat Kantor</th>
                        <th width="80px">Nomor Telepon</th>
                        <th width="60px">Peta Lokasi</th>
                        <th width="90px">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1;
                    foreach ($tampilData->result() as $data) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td>
                                <?php if ($data->foto_desa == "default.jpg") { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_wilayah ?>">
                                <?php } else { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/upload/foto_wilayah/') ?><?php echo $data->foto_desa ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_wilayah ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <?php echo $data->nama_wilayah ?>

                                <?php if ($data->active == 1) { ?>
                                    <span class="label label-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $data->kepala_desa ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td><?php echo $data->no_telp ?></td>
                            <td>
                                <a href="<?php echo $data->lokasi_koordinat ?>" target="_blank"> <button class="btn btn-mint btn-icon"><i class="ti-location-pin"></i></button></a>
                                <button class="btn btn-dark btn-icon" data-toggle="modal" data-target="#modal-iframe-<?php echo $data->id ?>"><i class="ti-map-alt"></i></button>

                            </td>
                            <td>
                                <button class="btn btn-info btn-icon" data-toggle="modal" data-target="#modal-detail-<?php echo $data->id ?>"><i class="ti-menu"></i></button>
                                <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-<?php echo $data->id ?>"><i class="fa fa-edit icon-lg"></i></button>
                                <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-<?php echo $data->id ?>"><i class="fa fa-trash icon-lg"></i></button>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Striped Table -->

</div>
<!--===================================================-->
<!--End page content-->


<?php $i = 1;
foreach ($tampilData->result() as $data) { ?>

    <!--Modal iFrame-->
    <!--===================================================-->
    <div class="modal fade" id="modal-iframe-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title text-center">Peta Lokasi</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <style>
                        .iframe-container {
                            position: relative;
                            width: 100%;
                            padding-bottom: 56.25%;
                            /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
                        }

                        .iframe-container>* {
                            display: block;
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            margin: 0;
                            padding: 0;
                            height: 100%;
                            width: 100%;
                        }
                    </style>

                    <div class="iframe-container">
                        <iframe src="<?php echo $data->lokasi_iframe ?>" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Modal iFrame-->

    <!--Modal Detail-->
    <!--===================================================-->
    <div class="modal fade" id="modal-detail-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title text-center">Detail</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <div class="panel">
                        <div class="panel-body">
                            <div class="fixed-fluid">
                                <!-- Simple profile -->
                                <div class="text-center">
                                    <div class="pad-ver">
                                        <?php if ($data->foto_desa == "default.jpg") { ?>
                                            <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_wilayah ?>">
                                        <?php } else { ?>
                                            <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/upload/foto_wilayah/') ?><?php echo $data->foto_desa ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_wilayah ?>">
                                        <?php } ?>
                                    </div>
                                    <h4 class="text-lg text-overflow mar-no"><?php echo $data->nama_wilayah ?></h4>
                                    <p class="text-sm text-muted"><?php echo $data->kepala_desa ?></p>

                                    <div class="pad-ver btn-groups">
                                        <a href="<?php echo $data->lokasi_koordinat ?>" target="_blank" class="btn btn-icon ti-location-pin icon-lg add-tooltip" data-original-title="Maps" data-container="body"></a>
                                    </div>
                                </div>
                                <hr>

                                <!-- Profile Details -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <p><i class="ti-layout-grid4 icon-lg icon-fw"></i> Desa : <?php echo $data->desa ?></p>
                                        <p><i class="ti-layout-grid3 icon-lg icon-fw"></i> Kelurahan : <?php echo $data->kelurahan ?></p>
                                        <p><i class="ti-layout-grid2 icon-lg icon-fw"></i> Kecamatan : <?php echo $data->kecamatan ?></p>
                                        <p><i class="fa fa-check icon-lg icon-fw"></i> Status :
                                            <?php if ($data->active == 1) { ?>
                                                <span class="label label-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Non-Aktif</span>
                                            <?php } ?>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p><i class="ti-mobile icon-lg icon-fw"></i> Nomor Telepon : <?php echo $data->no_telp ?></p>
                                        <p><i class="ti-location-arrow icon-lg icon-fw"></i> Alamat : <?php echo $data->alamat ?></p>
                                    </div>

                                </div>

                                <p class="text-sm text-center">
                                <div class="iframe-container">
                                    <iframe src="<?php echo $data->lokasi_iframe ?>" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                </p>

                            </div>
                        </div>
                    </div>



                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Modal Detail-->

    <!-- Modal Edit Data-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_wilayah/edit'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data - <?php echo $data->nama_wilayah ?></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Baru dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group col-12">
                                <label>Nama Wilayah</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-medall"></i></span>
                                    <input type="text" name="nama_wilayah" value="<?php echo $data->nama_wilayah ?>" class="form-control" placeholder="Nama Wilayah" required oninvalid="this.setCustomValidity('Nama Wilayah tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Nama Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-layout-grid4"></i></span>
                                    <input type="text" name="desa" value="<?php echo $data->desa ?>" class="form-control" placeholder="Nama Desa" required oninvalid="this.setCustomValidity('Nama Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Nama Kelurahan</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-layout-grid3"></i></span>
                                    <input type="text" name="kelurahan" value="<?php echo $data->kelurahan ?>" class="form-control" placeholder="Nama Kelurahan" required oninvalid="this.setCustomValidity('Nama Kelurahan tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Nama Kecamatan</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-layout-grid2"></i></span>
                                    <input type="text" name="kecamatan" value="<?php echo $data->kecamatan ?>" class="form-control" placeholder="Nama Kecamatan" required oninvalid="this.setCustomValidity('Nama Kecamatan tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Foto Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-image"></i></span>
                                    <span class="pull-left btn btn-mint btn-file">
                                        Browse... <input type="file" name="images" id="imgInp-code<?php echo $i ?>" />
                                    </span>
                                </div>
                                <img class="img-responsive" id='img-upload-code<?php echo $i ?>' alt="Profile Picture">
                                <hr>
                                <p>File Sebelumnya : <?php echo $data->foto_desa ?></p>
                                <input type="hidden" name="nm_images_lama" value="<?php echo $data->foto_desa ?>">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group col-12">
                                <label>Nama Kepala Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-user"></i></span>
                                    <input type="text" name="kepala_desa" value="<?php echo $data->kepala_desa ?>" class="form-control" placeholder="Nama Kepala Desa" required oninvalid="this.setCustomValidity('Nama Kepala Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Alamat Kantor Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-location-arrow"></i></span>
                                    <textarea placeholder="Alamat Kantor Desa..." name="alamat" rows="3" class="form-control"><?php echo $data->alamat ?></textarea>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Nomor Telphone Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-mobile"></i></span>
                                    <input type="number" name="no_telp" value="<?php echo $data->no_telp ?>" class="form-control" placeholder="Nomor Telphone Desa" required oninvalid="this.setCustomValidity('Nomor Telphone Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Lokasi Koordinat Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                    <input type="text" name="lokasi_koordinat" value="<?php echo $data->lokasi_koordinat ?>" class="form-control" placeholder="Lokasi Koordinat Desa" required oninvalid="this.setCustomValidity('Lokasi Koordinat Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Lokasi Iframe Maps Desa</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="ti-map-alt"></i></span>
                                    <input type="text" name="lokasi_iframe" value="<?php echo $data->lokasi_iframe ?>" class="form-control" placeholder="Lokasi Iframe Maps Desa" required oninvalid="this.setCustomValidity('Lokasi Iframe Maps Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Status</label>
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <select class="form-control" id="demo-chosen-select-active-code<?php echo $i ?>" name="active" required>
                                        <?php if ($data->active == 1) { ?>
                                            <option selected value="1">Aktif</option>
                                            <option value="0">Non-Aktif</option>
                                        <?php } else { ?>
                                            <option selected value="0">Non-Aktif</option>
                                            <option value="1">Aktif</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>js/jquery.min.js"></script>
    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>plugins/chosen/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#demo-chosen-select-active-code<?php echo $i ?>').chosen({
                width: '100%'
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img-upload-code<?php echo $i ?>').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-code<?php echo $i ?>").change(function() {
                readURL(this);
            });
        });
    </script>
    <!--===================================================-->
    <!-- End Bootstrap Modal Edit Data-->

    <!--Bootstrap Modal Hapus-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_wilayah/hapus'); ?>
    <div id="modal-hapus-<?php echo $data->id ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data WIlayah <b><?php echo $data->nama_wilayah ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus.

                    <code>Coba Cek Kembali!, Data Yang Sudah Di Hapus Tidak Bisa Kembali!</code>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Bootstrap Hapus-->

<?php $i++;
} ?>



<!-- Modal Tambah Data-->
<!--===================================================-->
<?php echo form_open_multipart('data_wilayah/tambah'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data - Wilayah</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Wilayah Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group col-12">
                            <label>Nama Wilayah</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-medall"></i></span>
                                <input type="text" name="nama_wilayah" class="form-control" placeholder="Nama Wilayah" required oninvalid="this.setCustomValidity('Nama Wilayah tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Nama Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-layout-grid4"></i></span>
                                <input type="text" name="desa" class="form-control" placeholder="Nama Desa" required oninvalid="this.setCustomValidity('Nama Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Nama Kelurahan</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-layout-grid3"></i></span>
                                <input type="text" name="kelurahan" class="form-control" placeholder="Nama Kelurahan" required oninvalid="this.setCustomValidity('Nama Kelurahan tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Nama Kecamatan</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-layout-grid2"></i></span>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" required oninvalid="this.setCustomValidity('Nama Kecamatan tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Foto Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-image"></i></span>
                                <span class="pull-left btn btn-mint btn-file">
                                    Browse... <input type="file" name="images" id="imgInp" />
                                </span>
                            </div>
                            <img class="img-responsive" id='img-upload' alt="Profile Picture">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group col-12">
                            <label>Nama Kepala Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-user"></i></span>
                                <input type="text" name="kepala_desa" class="form-control" placeholder="Nama Kepala Desa" required oninvalid="this.setCustomValidity('Nama Kepala Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Alamat Kantor Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-location-arrow"></i></span>
                                <textarea placeholder="Alamat Kantor Desa..." name="alamat" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Nomor Telphone Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-mobile"></i></span>
                                <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telphone Desa" required oninvalid="this.setCustomValidity('Nomor Telphone Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Lokasi Koordinat Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-location-pin"></i></span>
                                <input type="text" name="lokasi_koordinat" class="form-control" placeholder="Lokasi Koordinat Desa" required oninvalid="this.setCustomValidity('Lokasi Koordinat Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Lokasi Iframe Maps Desa</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="ti-map-alt"></i></span>
                                <input type="text" name="lokasi_iframe" class="form-control" placeholder="Lokasi Iframe Maps Desa" required oninvalid="this.setCustomValidity('Lokasi Iframe Maps Desa tidak boleh kosong!')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Status</label>
                            <div class="input-group mar-btm">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <select class="form-control" id="demo-chosen-select-2" name="active" required>
                                    <option value="">--- Pilih Status ---</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!-- End Bootstrap Modal Tambah Data-->


<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>