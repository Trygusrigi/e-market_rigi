@extends('home')

@push('style')

@endpush

@section('content')

<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pengajuan Barang</h3>

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
    Welcome to 'Pengajuan Barang'
  </div>

  <div class="card-body">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPengajuanModal">
                  Tambah Pengajuan
              </button>
          </div>
          <table class="table display" id="tbl-pengajuan">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengaju</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Terpenuhi?</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($pengajuan as $p)
                  <tr>
                      <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                      <td class="jenis">{{ $p->Nama_Pengaju }}</td>
                      <td class="jenis">{{ $p->Nama_Barang }}</td>
                      <td class="jenis">{{ $p->Qty }}</td>
                      <td class="jenis">{{ $p->Terpenuhi }}</td>
                      <td>
                        <button class="btn" data-toggle="modal" data-target="#formPengajuanModal" data-mode="edit"
                        data-id="{{ $p->id }}" data-nama_pengaju="{{ $p->nama_pengaju }}"><i
                            class="fas fa-edit"></i></button>
                            <form action="pengajuan/{{ $p->id }}" style="display: inline" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger btn-delete"
                              data-nama_pengaju="{{ $p->nama_pengaju}}"><i class="fas fa-trash"></i></button>
                  </td>
                  </form>
              </tr>
          @endforeach
      </tbody>
    </table>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
</section>
@endsection

@push('script')
<script>

</script>
@endpush