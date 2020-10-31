
<section class="checkout" id="checkout" style="padding-top:40px;">
        <form class="ps-checkout__form" id="payment-form" method="post" action="<?=site_url()?>snap/finish">
          <input type="hidden" name="result_type" id="result-type" value=""></div>
          <input type="hidden" name="result_data" id="result-data" value=""></div>
        </form>
    <div class="container" style="margin-top:50px;">
        <!-- flashdata -->
        <?php if ($this->session->flashdata('feedback_success')) { ?>
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            <?= $this->session->flashdata('feedback_success') ?>
            </div>
        <?php } elseif ($this->session->flashdata('feedback_failed')) { ?>
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-remove"></i> Gagal!</h4>
            <?= $this->session->flashdata('feedback_failed') ?>
          </div>
        <?php } ?>
          <!-- end flashdata -->
          
        <form id="form_proses_checkout" method="post" enctype="multipart/form-data" class="ps-checkout__form">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                        <h3>Form Checkout</h3>
                        <div class="form-group form-group--inline">
                            <label>Nama Depan<span>*</span>
                            </label>
                            <input type="hidden" id="id" name="id" value="a1">
                            <input class="form-control" style="background-color: #e8f0fe;" type="text" name="nama_depan" id="nama_depan">
                            <input type="hidden" name="keterangan" id="keterangan" value="<?= $type; ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-group--inline">
                            <label>Nama Belakang
                            </label>
                            <input class="form-control" style="background-color: #e8f0fe;" type="text" name="nama_belakang" id="nama_belakang">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-group--inline">
                            <label>Email<span>*</span>
                            </label>
                            <input class="form-control" style="background-color: #e8f0fe;" type="email" name="email" id="email" placeholder="anda@domain.com">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group form-group--inline">
                            <label>No. Telepon / HP<span>*</span>
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
                            <h3>Metode Pembayaran dengan Transfer</h3>
                            <div class="form-group cheque">
                                <div class="">
                                    <p>Transfer Rp. 3.000.000 Ke Rekening Dibawah Ini Serta Melampirkan Upload Bukti Transfer.</p>
                                    <p>Rekening BCA : 464-177-2458 <br> a.n Cipto Junaidi</p>
                                </div>
                            </div>
                            <div class="form-group paypal">
                                <button type="button" class="btn btn-md btn-success" id="pay-button">Bayar &amp; Segera Mulai<i class="ps-icon-next"></button>
                            </div>
                        </footer>
                    </div>
                    <div class="ps-shipping">
                        <p>Setelah transfer, jadwal LIVE dgn Saras Davina akan langsung diberikan kepada anda, <br><br>Kuota Terbatas. Yang duluan transfer, dilayani duluan.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
  
  
   

