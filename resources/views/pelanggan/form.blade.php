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

  <div class="modal fade" id="formPelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="pelanggan">
                      @csrf
                      <div id="method"></div>
                      <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Alamat</label>
                          <div class="col-sm-8">
                              <textarea class="form-control" rows="3" placeholder="Enter ..." id="alamat" name="alamat"></textarea>
                          </div>

                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="nama_pelanggan" value=""
                                  name="nama_pelanggan">
                          </div>

                          <label for="staticEmail" class="col-sm-4 col-form-label">No Telpon</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="no_telp" value="" name="no_telp">
                          </div>

                          <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control" id="email" value="" name="email">
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
