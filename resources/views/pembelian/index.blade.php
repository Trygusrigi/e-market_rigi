@extends('home')

@push('style')

@endpush

@section('content')

<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pembelian Barang</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body">
    <form class="" id="formTranksaksi">
  <div class="row">
    <div class="col-6">
      <label for="kode-pembelian" class="col-4 col-form-label col-form-label-sm">Kode Pembelian</label>
      <div class="col-8">
        <input type="text" class="form-control form-control-sm" id="kode-pembelian" placeholder="" readonly value="{{ $kode }}">
      </div>
    </div>
    <div class="col-6">
      <label class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Pembelian</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value="{{ date('Y-m-d') }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;
      </label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <button type="button" class="btn btn-primary" id="tambahBarangBtn" data-toggle="modal"
        data-target="#tblBarangModal">Tambah Barang</button>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
      <label class="control-label col-md-6 col-sm-6 col-xs-12">Distributor</label>
      <div class="col-md-6 col-sm-9 col-xs-12">
        <select class="form-control col-md-4 col-xs-12" required="required">
          @foreach ($pemasok as $p)
              <option value="{{ $p->id }}">{{ $p->nama_pemasok }}</option>
          @endforeach

        </select>
      </div>
    </div>
  <!-- /.card-body -->

  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('pembelian.modal')
</section>
@endsection

@push('script')
<script>
$(function(){
  $('#tblBarang2').DataTable()
})
</script>
@endpush