@extends('home')

@push('style')
@endpush

@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pelanggan</h3>

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPelangganModal">
                    Tambah Pelanggan
                </button>
            </div>

            <table class="table table-sm" id="tbl-pelanggan">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Pelanggan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $p)
                        <tr>
                            <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                            <td>{{ $p->kode_pelanggan }}</td>
                            <td class="nama_pelanggan">{{ $p->nama_pelanggan }}</td>
                            <td class="alamat">{{ $p->alamat }}</td>
                            <td class="no_telp">{{ $p->no_telp }}</td>
                            <td class="email">{{ $p->email }}</td>
                            <td>
                                <button class="btn" data-toggle="modal" data-target="#formPelangganModal"
                                    data-mode="edit" data-id="{{ $p->id }}"
                                    data-kode_pelanggan="{{ $p->kode_pelanggan }}"><i class="fas fa-edit"></i></button>
                                <form action="pelanggan/{{ $p->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete"
                                        data-kode_pelanggan="{{ $p->kode_pelanggan }}"><i
                                            class="fas fa-trash"></i></button>
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
        @include('pelanggan.form')
    </section>
@endsection

@push('script')
    <script>
        $(function() {
            $('#tbl-pelanggan').DataTable()
            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let kode_pelanggan = $(this).closest('tr').find('td:eq(1)').text();
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${kode_pelanggan} </b>akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })

            $('#formPelangganModal').on('show.bs.modal', function(e) {
                const btn = $(e.relatedTarget)
                console.log(btn.data('mode'))
                const mode = btn.data('mode')
                const id = btn.data('id')
                const tbldata = btn.closest('tr')
                const kode_pelanggan = btn.data('kode_pelanggan')
                const nama_pelanggan = tbldata.find('.nama_pelanggan').html()
                const no_telp = tbldata.find('.no_telp').html()
                const alamat = tbldata.find('.alamat').html()
                const email = tbldata.find('.email').html()
                // const harga = btn.data('harga')
                // const stok = btn.data('stok')
                // const jenis = btn.data('jenis')
                const modal = $(this)
                // console.log($(this))
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data Produk')
                    modal.find('#kode_pelanggan').val(kode_pelanggan)
                    modal.find('#nama_pelanggan').val(nama_pelanggan)
                    modal.find('#no_telp').val(no_telp)
                    modal.find('#alamat').val(alamat)
                    modal.find('#email').val(email)
                    modal.find('.modal-body form').attr('action', '{{ url('pelanggan') }}/' + id)
                    modal.find('#method').html('@method('PATCH')')
                    console.log(kode_pelanggan)
                } else {
                    modal.find('.modal-title').text('Input Data Pelanggan')
                    modal.find('#kode_pelanggan').val('')
                    modal.find('#method').html('')
                    modal.find('.modal-body form').attr('action', '{{ url('pelanggan ') }}')
                }
            })
        })

        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })
    </script>
@endpush
