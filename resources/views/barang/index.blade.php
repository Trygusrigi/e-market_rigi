@extends('home')

@push('style')
@endpush

@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">barang</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal">
                    Tambah Barang
                </button>
            </div>

            <table class="table display" id="tbl-barang">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">kode_barang</th>
                        <th scope="col">produk_id</th>
                        <th scope="col">nama_barang</th>
                        <th scope="col">satuan</th>
                        <th scope="col">harga_jual</th>
                        <th scope="col">stok</th>
                        <th scope="col">ditarik</th>
                        <th scope="col">user_id</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $p)
                        <tr>
                            <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                            <td class="harga">{{ $p->kode_barang }}</td>
                            <td class="stok">{{ $p->produk_id }}</td>
                            <td class="jenis">{{ $p->nama_barang }}</td>
                            <td class="jenis">{{ $p->satuan }}</td>
                            <td class="jenis">{{ $p->harga_jual }}</td>
                            <td class="jenis">{{ $p->stok }}</td>
                            <td class="jenis">{{ $p->ditarik }}</td>
                            <td class="jenis">{{ $p->user_id }}</td>
                            <td>
                                <button class="btn" data-toggle="modal" data-target="#formBarangModal" data-mode="edit"
                                    data-id="{{ $p->id }}" data-nama_barang="{{ $p->nama_barang }}"><i
                                        class="fas fa-edit"></i></button>
                                <form action="barang/{{ $p->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete"
                                        data-nama_barang="{{ $p->nama_barang }}"><i class="fas fa-trash"></i></button>
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
        @include('barang.form')
    </section>
@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-barang').DataTable()
            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama_barang = $(this).closest('tr').find('td:eq(1)').text();
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${nama_barang} </b>akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })

            $('#formBarangModal').on('show.bs.modal', function(e) {
                const btn = $(e.relatedTarget)
                console.log(btn.data('mode'))
                const mode = btn.data('mode')
                const nama_barang = btn.data('nama_barang')
                const tbldata = btn.closest('tr')
                const id = btn.data('id')
                const kode = tbldata.find('.kode').html()
                const harga = tbldata.find('.harga').html()
                const stok = tbldata.find('.stok').html()
                const jenis = tbldata.find('.jenis').html()
                // const kode = btn.data('kode')
                // const harga = btn.data('harga')
                // const stok = btn.data('stok')
                // const jenis = btn.data('jenis')
                const modal = $(this)
                // console.log($(this))
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data barang')
                    modal.find('#nama_barang').val(nama_barang)
                    modal.find('#kode').val(kode)
                    modal.find('#harga').val(harga)
                    modal.find('#stok').val(stok)
                    modal.find('#jenis').val(jenis)
                    modal.find('.modal-body form').attr('action', '{{ url('barang') }}/' + id)
                    modal.find('#method').html('@method('PATCH')')
                    console.log(nama_barang)
                } else {
                    modal.find('.modal-title').text('Input Data barang')
                    modal.find('#nama_barang').val('')
                    modal.find('#method').html('')
                    modal.find('.modal-body form').attr('action', '{{ url('barang ') }}')
                }
            })
        })

        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })
    </script>
@endpush
