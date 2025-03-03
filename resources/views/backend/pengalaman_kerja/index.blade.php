@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home/</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup/</li>
                    <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pengalaman Kerja
                    </header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                        </a>

                        <br><br>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="icon_bag"></i> Nama</th>
                                    <th><i class="icon_document"></i> Jabatan</th>
                                    <th><i class="icon_calendar"></i> Tahun Masuk</th>
                                    <th><i class="icon_calendar"></i> Tahun Selesai</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengalaman_kerja as $key => $pengalaman)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pengalaman->nama }}</td>
                                    <td>{{ $pengalaman->jabatan }}</td>
                                    <td>{{ $pengalaman->tahun_masuk }}</td>
                                    <td>{{ $pengalaman->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $pengalaman->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pengalaman_kerja.destroy', $pengalaman->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if ($pengalaman_kerja->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data pengalaman kerja.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection