  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" src="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
      src="{{ asset('adminlte3') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" src="{{ asset('adminlte3') }}/dist/css/adminlte.min.css">

  <div class="modal fade" id="formBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="barang">
                      @csrf
                      <div id="method"></div>
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">kode_barang</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="kode_barang" value=""
                                  name="kode_barang">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">produk_id</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="produk_id" value="" name="produk_id">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">nama_barang</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="nama_barang" value=""
                                  name="nama_barang">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">satuan</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="satuan" value="" name="satuan">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">harga_jual</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="harga_jual" value=""
                                  name="harga_jual">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">stok</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="stok" value="" name="stok">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">ditarik</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="ditarik" value="" name="ditarik">
                          </div>
                          <label for="staticEmail" class="col-sm-4 col-form-label">user_id</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="user_id" value=""
                                  name="user_id">
                          </div>
                          </select>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
