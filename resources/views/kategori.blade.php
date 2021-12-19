@extends('dasar')
@section('kategori','nav-active')

@section('content')

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a class="modal-with-form fa fa-plus-circle" href="#modalForm"></a>
                <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Kategori</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $y => $x)
                    <tr class="gradeX">
                        <td>{{$y+1}}</td>
                        <td>{{$x->nama}}</td>
                        <td>{{number_format($x->harga,0,',','.')}}</td>
                        <td>
                            <button class="btn btn-info" onclick="edit({{$x}})"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger" onclick="hapus({{$x->id}})"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Tambah Kategori</h2>
            </header>
            <div class="panel-body">
                <form action="" method="post" class="form-horizontal mb-lg">
                    @csrf
                    @method('put')
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" name="harga" class="form-control" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Edit Kategori</h2>
            </header>
            <div class="panel-body">
                <form action="" method="post" class="form-horizontal mb-lg">
                    @csrf
                    @method('patch')
                    <input hidden id="idedit" name="id">
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" id="nama" name="nama" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" id="harga" name="harga" class="form-control" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <div id="modalNoFooter" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Apakah benar ingin menghapus?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <input name="id" id="idhapus" hidden>
                            <center>
                                <button type="submit" class="btn btn-danger modal-confirm">Ya, hapus</button>
                                <button type="submit" class="btn btn-default modal-dismiss">Batal</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('css')

    <link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

@endpush

@push('js')

    <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

    <script>
        $('#datatable').dataTable()
        $('.modal-with-form').magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true,
        });
        function edit(data){
            $('#idedit').val(data.id)
            $('#nama').val(data.nama)
            $('#harga').val(data.harga)
            $.magnificPopup.open({
                items: {
                    src: $('#modalForm2'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
        function hapus(id){
            $('#idhapus').val(id)
            $.magnificPopup.open({
                items: {
                    src: $('#modalNoFooter'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
    </script>

@endpush
