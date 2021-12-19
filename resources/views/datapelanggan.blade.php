@extends('dasar')
@section('pelanggan','nav-active')

@section('content')

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Data Pelanggan</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nomor HP</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $y => $x)
                    <tr class="gradeX">
                        <td>{{$y+1}}</td>
                        <td>{{$x->username}}</td>
                        <td>{{$x->nohp}}</td>
                        <td>
                            <button class="btn btn-info" onclick="edit({{$x}})"><i class="fa fa-edit"></i></button>
                            <a class="btn btn-primary" href="/pelanggan/{{$x->id}}"><i class="fa fa-history"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Edit Pelanggan</h2>
            </header>
            <div class="panel-body">
                <form action="" method="post" class="form-horizontal mb-lg">
                    @csrf
                    @method('patch')
                    <input hidden id="idedit" name="id">
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control" readonly disabled/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nomor HP</label>
                        <div class="col-sm-9">
                            <input type="number" id="nohp" name="nohp" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" placeholder="Konsongkan jika tidak ingin mengubah password" class="form-control"/>
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

@endsection

@push('css')

    <link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />

@endpush

@push('js')

    <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
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
            $('#username').val(data.username)
            $('#nohp').val(data.nohp)
            $.magnificPopup.open({
                items: {
                    src: $('#modalForm2'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
    </script>

@endpush
