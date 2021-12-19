@extends('dasar')
@section('profil','nav-active')

@section('content')

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Profil</h2>
        </header>
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal mb-lg">
                @csrf
                @method('patch')
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" value="{{$data->username}}" class="form-control" readonly disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor HP</label>
                    <div class="col-sm-9">
                        <input type="number" name="nohp" value="{{$data->nohp}}" class="form-control" required/>
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

@endsection

@push('css')



@endpush

@push('js')



@endpush
