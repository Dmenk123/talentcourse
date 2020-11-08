<form id="form_proses_checkout" method="post" enctype="multipart/form-data" class="ps-checkout__form">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
            <div class="alert alert-warning">
                <strong>Peringatan!</strong> Harap isikan email anda dengan benar & Mohon periksa kembali !
            </div>
                <div class="ps-checkout__billing">
                    <!--<h3>Isi Form Data Diri Anda</h3>-->
                    <div class="form-group form-group--inline">
                        <label>Nama Depan<span></span>
                        </label>
                        <input type="hidden" id="id" name="id" value="a1">
                        <input class="form-control" style="background-color: #e8f0fe;" type="text" name="nama_depan" id="nama_depan">
                        <input type="hidden" name="keterangan" id="keterangan" value="<?= $type; ?>">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group form-group--inline">
                        <label>Nama Belakang<span></span>
                        </label>
                        <input class="form-control" style="background-color: #e8f0fe;" type="text" name="nama_belakang" id="nama_belakang">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group form-group--inline">
                        <label>Email<span></span>
                        </label>
                        <input class="form-control" style="background-color: #e8f0fe;" type="email" name="email" id="email" placeholder="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group form-group--inline">
                        <label>No. Telepon<span></span>
                        </label>
                        <input class="form-control numberinput" style="background-color: #e8f0fe;" type="text" name="telp" id="telp">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group form-group--inline">
                        <label>Alamat<span>*</span>
                        </label>
                        <textarea class="form-control" style="background-color: #e8f0fe;" type="text" name="address" id="address"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__order">
                    <!-- <header></header> -->
                    <footer>
                        <h3>Pembayaran Langsung Transfer</h3>
                        <div class="form-group cheque">
                            <div class="">
                                <p>Transfer <?= "Rp ".number_format($harga->nilai_harga,0,',','.'); ?> ke Rekening Di bawah Ini.</p>
                                <p>Rekening BCA : 464-5679-777 <br> a.n Evie Maria Diahwati</p>
                            </div>
                        </div>
                        <div class="ps-shipping">
                            <p style="font-size:18px; font-family:arial; color:blue; line-height:24px;"><strong>Setelah transfer, lalu fotokan bukti transfer untuk memulai LIVE dgn Saras Davina.</strong></p>
                            <p>Kirim bukti transfer dg <strong>klik tombol Kirim Pesan</strong> di bawah ini</p>
                            <div class="form-group paypal">
                                <a href="https://m.me/110257024151678" target="_blank">
                                    <img src="<?php echo base_url();?>assets/images/Tombol psn.png" class="img-tombol">
                                </a>
                                <br>
                                <br>
                            </div>
                            <div class="form-group paypal">
                                <button type="button" class="btn btn-md btn-success" id="pay-button">Pilih Metode Pembayaran Lain<i class="ps-icon-next"></button>
                                <!-- <button type="button" class="btn btn-md btn-primary" id="btn_bayar" onclick="proses_checkout()">Kirim &amp; Segera Mulai<i class="ps-icon-next"></i></button> -->
                            </div>
                        </div>
                    </footer>
                </div>
                <div class="ps-shipping">
                    <p>Kuota Terbatas. Yang duluan transfer, dilayani duluan.</p>
                </div>
            </div>
        </div>
    </form>