@extends('admin')

@section('main-content')
    <div class="panel panel-headline">
        <div class="panel-heading" style="margin-bottom: 2%">

            <h1 class="panel-title col-md-4">Data Guru </h1>
            <div class="col-md-8">
                <div class="pull-right">
                    <a href="{{ route('guru.create') }}" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                            <tr>
                                <td>{{ $guru->id }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>{{ $guru->no_hp }}</td>
                                <td>{{ $guru->email }}</td>
                                <td>{{ $guru->jabatan }}</td>
                                <td>
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST"
                                        style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
