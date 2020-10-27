<!-- Portfolio Section Starts -->
<section id="portfolio" class="portfolio" style="background-image: url('assets/images/ice2.jpg');background-repeat: no-repeat;
  background-size: 1350px 1700px;">
    <!-- Container Starts -->
    <div class="container">
        <!-- Main Heading Starts -->
        <div class="text-center top-text">
            <p style="font-size:24px; font-family: arial; color: Red; line-height:26px;"><span style="font-size:24px; font-family: arial; color: blue;"><strong>Kalau tidak menguasai Ilmu Algoritma Instagram,</strong></span> maka Bisnis anda tidak meledak.</p>
            <p style="font-size:20px; font-family: arial; color:orchid; line-height:22px;"><strong>Ayo "Pacaran" dengan Saras Davina, <span style="color:blue;">LIVE</span></strong> <span style="font-size:20px; font-family: arial; color:darkslategray; line-height:22px;">yaitu nyetrum belajar Ilmu Algoritma Instagram untuk Bisnis.</span></p>
            <?php if($tgl_mulai_diskon && $tgl_mulai_diskon) { ?>
                <?php if((strtotime($tgl_mulai_diskon) <= strtotime(date('Y-m-d H:i:s'))) && (strtotime($tgl_akhir_diskon) >= strtotime(date('Y-m-d H:i:s')))) { ?>
                    <p style="font-size:20px; font-family: arial; color:blue; line-height:22px;"><strong>Harga di bawah hanya untuk masa promosi.</strong> <br><span style="font-size:20px; font-family: arial; color:darkslategray; line-height:22px;">Anda hanya memiliki waktu <?php if(isset($jml_hari)){ echo $jml_hari; }; ?> hari, setelah timer kembali ke angka 0, maka harga akan kembali Normal.</span></p>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="fact-badges text-center top-text">
            <?php if($tgl_mulai_diskon && $tgl_mulai_diskon) { ?>
                <?php if((strtotime($tgl_mulai_diskon) <= strtotime(date('Y-m-d H:i:s'))) && (strtotime($tgl_akhir_diskon) >= strtotime(date('Y-m-d H:i:s')))) { ?>
                    <div class="flipcountercss" align="center">
                        <h1>Buruan Pesan Sekarang</h1>
                        <div id="flipdown" class="flipdown"></div>
                    </div>
                <?php } ?>
            <?php } ?>
            
                
            <div align="center" style="position:relative;top:30px;">
                <div class="col-md-12 row no-gutters" align="center">
                    <div class="col-sm-6 box" style="padding: 0 auto;">
                        
                        <a href="<?= base_url('snap').'?type=reg#checkout'; ?>" style="background-color: #6f42c1;" class="button button--winona button--border-thick button--round-l button--size-s button--text-thick img-tombol">
                            <p>
                                <span style="color: yellow;font-size:24px;font-weight:bold;">Klik Disini</span>
                                <br>
                                <span style="color: yellow;font-size:14px;">Pertemuan/Kelas</span>&nbsp;<span style="color: white;font-size:20px;font-weight:bold;">Ramai-ramai</span>
                                <br>
                                <span style="color: yellow;"><?=$arr_harga[0]['harga_txt'];?></span>
                                <br>
                                <span style="color: yellow;">Untuk Total</span>&nbsp;<span style="color: white;font-size:20px;font-weight:bold;">2x Live</span>
                            </p>
                        </a>
                        
                    </div>
                    <div class="col-sm-6 box">
                        <a href="<?= base_url('snap').'?type=vip#checkout'; ?>" style="background-color: #e83e8c;" class="button button--winona button--border-thick button--round-l button--size-s button--text-thick img-tombol">
                            <p>
                                <span style="color: yellow;font-size:24px;font-weight:bold;">Klik Disini</span>
                                <br>
                                <span style="color: yellow;font-size:14px;">Pertemuan/Kelas</span>&nbsp;<span style="color: white;font-size:20px;font-weight:bold;">Lebih Privat&nbsp;</span>
                                <br>
                                <span style="color: yellow;"><?=$arr_harga[1]['harga_txt'];?></span>
                                <br>
                                <span style="color: yellow;">Untuk Total</span>&nbsp;<span style="color: white;font-size:20px;font-weight:bold;">2x Live</span>
                            </p>
                        </a>
                       
                    </div>
                </div>
            </div>

            <br>
        
            <div class="row team-members magnific-popup-gallery">
                <!-- Team Member Starts -->
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="team-member">
                        <!-- Team Member Picture Starts -->
                        <a title="Saras Davina" class="team-member-img-wrap"><img src="<?php echo base_url();?>assets/images/gambar1.jpg" alt="team member"></a>
                    </div>
                </div>
                <!-- Team Member Ends -->
            </div>
            
            <br>
            
            <p style="font-size:24px; font-family: arial; color: Red; line-height:26px;"><strong><span style="color:blue;">Jadwal LIVE</span> langsung diberikan kepada anda, setelah anda transfer.</strong></p>
        </div>
        <!-- Filter Wrapper Ends -->     
    </div>
</section>
<!-- Portfolio Section Ends -->