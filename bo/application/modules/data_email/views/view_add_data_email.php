<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

  <!-- begin:: Content Head -->
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
          <?= $title ?>
        </h3>
      </div>
    </div>
  </div>
  <!-- end:: Content Head -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    
      <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text alert-dismissible">
            Perhatian : Anda akan mengirim Email secara manual / tanpa melalui proses konfirmasi.
        </div>
      </div>
      

    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <span class="kt-portlet__head-icon">
            <i class="kt-font-brand flaticon2-line-chart"></i>
          </span>
          <h3 class="kt-portlet__head-title">
            <?= $title; ?>
          </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <div class="kt-portlet__head-wrapper">
            <div class="kt-portlet__head-actions">
            </div>
          </div>
        </div>
      </div>

      <div class="kt-portlet__body">

        <form class="form-edit-role kt-form" id="form_email">
              <div class="box-header">
                <div class="form-group row">
                  <label class="control-label col-12">Nama</label>
                  <div class="col-12 form-group">
                    <input type="text" class="form-control" value="" name="nama">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-12">Email Tujuan</label>
                  <div class="col-12 form-group">
                    <input type="text" class="form-control" value="" name="email">
                    <span class="help-block"></span>
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="control-label col-12">Subjek Email</label>
                  <div class="col-12 form-group">
                    <input type="text" class="form-control" value="" name="subjek">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-12">Pesan : </label>
                  <div class="col-12">
                    <textarea class="form-control" id="pesan_email" rows="50" name="pesan_email"><?=$txt_email;?></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-primary tombol-simpan" id="btn_email" onclick="kirim_email()"> Kirim Email</button>
                    <a href="<?=base_url()."".$this->uri->segment(1);?>">
                      <span class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
  
</div>


