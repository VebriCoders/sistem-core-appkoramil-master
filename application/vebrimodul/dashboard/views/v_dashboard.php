<div id="page-head">
    <div class="pad-all text-center">
        <h3>Selamat datang di aplikasi <?= $website['nama_website']; ?></h3>
        <p1>Sistem Informasi Penerimaan Anggota Prajurit Baru TNI-AD Terpadu Online</p>
    </div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-warning panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-location-pin icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $hitungJumlahWilayah ?></p>
                    <p class="mar-no">Jumlah Wilayah</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-user icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $hitungJumlahBabinsa ?></p>
                    <p class="mar-no">Jumlah Babinsa</p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-archive icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">2000</p>
                    <p class="mar-no">Jumlah Kuota</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-check icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">1250</p>
                    <p class="mar-no">Siswa Terverifikasi</p>
                </div>
            </div>
        </div> -->

    </div>

</div>
<!--===================================================-->
<!--End page content-->


<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function welcome() {
        iziToast.info({
            title: 'Selamat Datang!',
            message: 'Di Aplikasi <?= $website['nama_website']; ?>',
            position: 'topCenter'
        });
    };
</script>