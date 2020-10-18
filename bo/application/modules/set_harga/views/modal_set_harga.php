
<div class="modal fade modal_add_form" tabindex="-1" role="dialog" aria-labelledby="add_menu" aria-hidden="true" id="modal_harga_form">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="form-harga" name="form-harga">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_harga" name="id_harga">
            <label for="lbl_nama" class="form-control-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
            <span class="help-block"></span>
          </div>
          <div class="col-12 row">
            <div class="col-8">
              <select class="form-control kt-select2" id="talent" name="talent" style="width: 100%;">
                <option value="">Silahkan Pilih Talent</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="col-4">
              <input type="number" class="form-control" id="gigi" name="gigi" value="">   
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="lbl_koderef" class="form-control-label">Kode Ref Diskon:</label>
            <input type="text" class="form-control" id="kode_ref" name="kode_ref" autocomplete="off">
            <span class="help-block"></span>
          </div>
          <div class="form-group">
            <label for="lbl_besaran" class="form-control-label">Besaran: (Besaran Persen)</label>
            <input type="text" class="form-control numberinput" id="besaran" name="besaran" autocomplete="off">
            <span class="help-block"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
      </div>
    </div>
  </div>
</div>
