@extends('dasar')
@section('transaksi','nav-active')

@section('content')

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a class="fa fa-plus-circle" href="javascript:void(0)" onclick="hitung()" data-toggle="modal" data-target="#modalBootstrap"></a>
                <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Transaksi</h2>
        </header>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="tabs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active">
                            <a href="#bsiap" data-toggle="tab" class="text-center">Belum Siap</a>
                        </li>
                        <li>
                            <a href="#siap" data-toggle="tab" class="text-center">Siap</a>
                        </li>
                        <li>
                            <a href="#selesai" data-toggle="tab" class="text-center">Selesai</a>
                        </li>
                        <li>
                            <a href="#batal" data-toggle="tab" class="text-center">Batal</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="bsiap" class="tab-pane active table-responsive">
                            <table class="table table-bordered table-striped mb-none datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Jumlah Baju - KG</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Tgl Taruh</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($belum as $y => $x)
                                    <tr class="gradeX">
                                        <td>{{$y+1}}</td>
                                        <td>{{$x->pengguna->username}}</td>
                                        <td>{{$x->jumlah_pakaian}} - {{$x->total_berat}} Kg</td>
                                        <td>{{number_format($x->harga,0,',','.')}}</td>
                                        <td>{{number_format($x->total_harga,0,',','.')}}</td>
                                        <td>{{\Carbon\Carbon::parse($x->created_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                                        <td>
                                            <button class="btn btn-info" onclick="siap({{$x->id}})"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger" onclick="batal({{$x->id}})"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="siap" class="tab-pane table-responsive">
                            <table class="table table-bordered table-striped mb-none datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Jumlah Baju - KG</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Tgl Taruh</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($siap as $y => $x)
                                    <tr class="gradeX">
                                        <td>{{$y+1}}</td>
                                        <td>{{$x->pengguna->username}}</td>
                                        <td>{{$x->jumlah_pakaian}} - {{$x->total_berat}} Kg</td>
                                        <td>{{number_format($x->harga,0,',','.')}}</td>
                                        <td>{{number_format($x->total_harga,0,',','.')}}</td>
                                        <td>{{\Carbon\Carbon::parse($x->created_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                                        <td>
                                            <button class="btn btn-success" onclick="selesai({{$x->id}})"><i class="fa fa-money"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="selesai" class="tab-pane table-responsive">
                            <table class="table table-bordered table-striped mb-none datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Jumlah Baju - KG</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Tgl Taruh</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($selesai as $y => $x)
                                    <tr class="gradeX">
                                        <td>{{$y+1}}</td>
                                        <td>{{$x->pengguna->username}}</td>
                                        <td>{{$x->jumlah_pakaian}} - {{$x->total_berat}} Kg</td>
                                        <td>{{number_format($x->harga,0,',','.')}}</td>
                                        <td>{{number_format($x->total_harga,0,',','.')}}</td>
                                        <td>{{\Carbon\Carbon::parse($x->created_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="batal" class="tab-pane table-responsive">
                            <table class="table table-bordered table-striped mb-none datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Jumlah Baju - KG</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Tgl Taruh</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($batal as $y => $x)
                                    <tr class="gradeX">
                                        <td>{{$y+1}}</td>
                                        <td>{{$x->pengguna->username}}</td>
                                        <td>{{$x->jumlah_pakaian}} - {{$x->total_berat}} Kg</td>
                                        <td>{{number_format($x->harga,0,',','.')}}</td>
                                        <td>{{number_format($x->total_harga,0,',','.')}}</td>
                                        <td>{{\Carbon\Carbon::parse($x->created_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" class="modal-content">
                @method('put')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Pelanggan</label>
                        <div class="col-sm-9">
                            <select name="id" class="form-control select2" required style="z-index: 1">
                                @foreach($pelanggan as $x)
                                    <option value="{{$x->id}}">{{$x->username}} - {{$x->nohp}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-9">
                            <select id="kategori" name="kategori_id" onchange="hitung()" class="form-control select2" required style="z-index: 1">
                                @foreach($kategori as $x)
                                    <option value="{{$x->id}}" data-harga="{{$x->harga}}">{{$x->nama}} - Rp.{{number_format($x->harga,0,',','.')}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Berat</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" id="berat" oninput="hitung()" value="1" step="0.1" name="total_berat" class="form-control" required/>
                                <span class="input-group-addon btn-info">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Pakaian</label>
                        <div class="col-sm-9">
                            <input type="number" name="jumlah_pakaian" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Harga</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon btn-info">Rp</span>
                                <input id="total_harga" type="text" class="form-control" readonly disabled/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalSiap" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Apakah benar sudah siap?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <form action="/transaksi/siap" method="post">
                            @csrf
                            <input name="id" id="idsiap" hidden>
                            <center>
                                <button type="submit" class="btn btn-info modal-confirm">Ya</button>
                                <button type="submit" class="btn btn-default modal-dismiss">Batal</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="modalSelesai" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Apakah benar sudah selesai?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <form action="/transaksi/selesai" method="post">
                            @csrf
                            <input name="id" id="idselesai" hidden>
                            <center>
                                <button type="submit" class="btn btn-success modal-confirm">Ya</button>
                                <button type="submit" class="btn btn-default modal-dismiss">Batal</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="modalBatal" class="modal-block mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Apakah benar transaksi ini batal?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <form action="/transaksi/batal" method="post">
                            @csrf
                            <input name="id" id="idbatal" hidden>
                            <center>
                                <button type="submit" class="btn btn-danger modal-confirm">Ya</button>
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
    <link rel="stylesheet" href="/assets/vendor/select2/select2.css" />

@endpush

@push('js')

    <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
    <script src="/assets/vendor/select2/select2.js"></script>

    <script>
        $('.datatable').dataTable({
            "ordering": false,
        })
        $('.select2').select2()
        function siap(id){
            $('#idsiap').val(id)
            $.magnificPopup.open({
                items: {
                    src: $('#modalSiap'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
        function selesai(id){
            $('#idselesai').val(id)
            $.magnificPopup.open({
                items: {
                    src: $('#modalSelesai'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
        function batal(id){
            $('#idbatal').val(id)
            $.magnificPopup.open({
                items: {
                    src: $('#modalBatal'),
                    type:'inline',
                },
                closeBtnInside: true
            });
        }
        function formatPrice(value) {
            // let val = (value/1).toFixed(2).replace('.', ',')
            let val = (value / 1)
            let fix = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            return fix
        }
        function hitung(){
            var berat = parseFloat($('#berat').val())
            var harga = parseInt($('#kategori option:selected').data('harga'))
            $('#total_harga').val(formatPrice(parseInt(berat*harga)))
        }
    </script>

@endpush
