@extends('dasar')
@section('riwayat','nav-active')

@section('content')

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Riwayat</h2>
        </header>
        <div class="panel-body">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped mb-none datatable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Baju - KG</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Tgl Taruh</th>
                        <th>Tgl Transaksi Terakhir</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $y => $x)
                        <tr class="gradeX">
                            <td>{{$y+1}}</td>
                            <td>{{$x->jumlah_pakaian}} - {{$x->total_berat}} Kg</td>
                            <td>{{number_format($x->harga,0,',','.')}}</td>
                            <td>{{number_format($x->total_harga,0,',','.')}}</td>
                            <td>{{\Carbon\Carbon::parse($x->created_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                            <td>{{\Carbon\Carbon::parse($x->updated_at)->translatedFormat('d/m/Y H:i:s')}}</td>
                            <td>
                                @if($x->status == 0) Belum siap
                                @elseif($x->status == 1) Siap
                                @elseif($x->status == 2) Selesai
                                @else Batal
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@push('css')

    <link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/select2/select2.css" />

@endpush

@push('js')

    <script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
    <script src="/assets/vendor/select2/select2.js"></script>

    <script>
        $('.datatable').dataTable()
        $('.select2').select2()
    </script>

@endpush
