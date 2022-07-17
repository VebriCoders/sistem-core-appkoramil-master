<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Babinsa</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">Data Babinsa</li>
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
            <h3 class="panel-title">Data Babinsa</h3>
        </div>
        <div class="panel-body">
            <table id="tabel-basic-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10px">No.</th>
                        <th width="70px">Foto</th>
                        <th>Nama Babinsa</th>
                        <th>Wilayah</th>
                        <th>Pangkat</th>
                        <th width="80px">Nomor Telepon</th>
                        <th width="200px">Alamat</th>
                        <th width="90px">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1;
                    foreach ($tampilData->result() as $data) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td>
                                <?php if ($data->foto == "default.jpg") { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama ?>">
                                <?php } else { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/upload/foto_babinsa/') ?><?php echo $data->foto ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <?php echo $data->nama ?>

                                <?php if ($data->active == 1) { ?>
                                    <span class="label label-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $data->nmwil ?></td>
                            <td><?php echo $data->pangkat ?></td>
                            <td><?php echo $data->no_hp ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td>
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


    <!-- Modal Edit Data-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_babinsa/edit'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data - <?php echo $data->nama ?></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Baru dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Wilayah</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <select class="form-control" id="demo-chosen-select-edit-wilayah-<?php echo $i ?>" name="id_wilayah" required>
                                <?php foreach ($joinWilayah->result() as $wilayah) {
                                    if ($wilayah->id == $data->id_wilayah) {
                                        echo "<option selected = 'selected' value='" . $wilayah->id . "'>" . $wilayah->nama_wilayah . " - " . $wilayah->kepala_desa . "</option>";
                                    } else {
                                        echo "<option value='" . $wilayah->id . "'>" . $wilayah->nama_wilayah . " - " . $wilayah->kepala_desa . "</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Nama Babinsa</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="nama" value="<?php echo $data->nama ?>" class="form-control" placeholder="Nama Babinsa" required oninvalid="this.setCustomValidity('Nama Babinsa tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Nomor Telphone Babinsa</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-mobile"></i></span>
                            <input type="number" name="no_hp" value="<?php echo $data->no_hp ?>" class="form-control" placeholder="Nomor Telphone Babinsa" required oninvalid="this.setCustomValidity('Nomor Telphone Babinsa tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Pangkat</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-star"></i></span>
                            <input type="text" name="pangkat" value="<?php echo $data->pangkat ?>" class="form-control" placeholder="Pangkat" required oninvalid="this.setCustomValidity('Pangkat tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Alamat Rumah Babinsa</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-location-arrow"></i></span>
                            <textarea placeholder="Alamat Rumah Babinsa..." name="alamat" rows="3" class="form-control"><?php echo $data->alamat ?></textarea>
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

                    <div class="form-group col-12">
                        <label>Foto</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-image"></i></span>
                            <span class="pull-left btn btn-mint btn-file">
                                Browse... <input type="file" name="images" id="imgInp-code<?php echo $i ?>" />
                            </span>
                        </div>
                        <img class="img-responsive" id='img-upload-code<?php echo $i ?>' alt="Profile Picture">
                        <hr>
                        <p>File Sebelumnya : <?php echo $data->foto ?></p>
                        <input type="hidden" name="nm_images_lama" value="<?php echo $data->foto ?>">
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
            $('#demo-chosen-select-edit-wilayah-<?php echo $i ?>').chosen({
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
    <?php echo form_open_multipart('data_babinsa/hapus'); ?>
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
                    <p>Anda Yakin Akan Menghapus Data Babinsa <b><?php echo $data->nama ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus.

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
<?php echo form_open_multipart('data_babinsa/tambah'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data - Babinsa</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Babinsa Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Wilayah</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <select class="form-control" id="demo-chosen-select" name="id_wilayah" required>
                            <option value="">--- Pilih Wiayah ---</option>
                            <?php foreach ($joinWilayah->result() as $wilayah) { ?>
                                <option value="<?php echo $wilayah->id; ?>"><?php echo $wilayah->nama_wilayah; ?> - <?php echo $wilayah->kepala_desa; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Nama Babinsa</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Babinsa" required oninvalid="this.setCustomValidity('Nama Babinsa tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Nomor Telphone Babinsa</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="ti-mobile"></i></span>
                        <input type="number" name="no_hp" class="form-control" placeholder="Nomor Telphone Babinsa" required oninvalid="this.setCustomValidity('Nomor Telphone Babinsa tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Pangkat</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-star"></i></span>
                        <input type="text" name="pangkat" class="form-control" placeholder="Pangkat" required oninvalid="this.setCustomValidity('Pangkat tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Alamat Rumah Babinsa</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="ti-location-arrow"></i></span>
                        <textarea placeholder="Alamat Rumah Babinsa..." name="alamat" rows="3" class="form-control"></textarea>
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

                <div class="form-group col-12">
                    <label>Foto</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="ti-image"></i></span>
                        <span class="pull-left btn btn-mint btn-file">
                            Browse... <input type="file" name="images" id="imgInp" />
                        </span>
                    </div>
                    <img class="img-responsive" id='img-upload' alt="Profile Picture">
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
            message: 'Data Babinsa Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Babinsa Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Babinsa Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>