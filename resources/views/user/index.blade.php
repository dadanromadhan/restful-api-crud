@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="box-header" style="display: flex">
        <div id="buttons" style="margin-right: 10px;"></div>
        <a name="" id="" class="show-modal btn btn-primary btn-flat btn-block" href="#" role="button"
            data-toggle="modal" data-target="#modal-create-user"><i class="fa fa-plus"
                style="font-weight: normal !imporant;"></i> Tambah Data
        </a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="data-row">
                        <td class="nama">{{ $user->name }}</td>
                        <td class="email">{{ $user->email }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" @if($user->id === auth()->id()) disabled @endif>HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('user.create')
</div>
@endsection
