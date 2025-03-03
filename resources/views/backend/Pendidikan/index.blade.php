@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Riwayat Hidup</li>
                        <li class="breadcrumb-item active">Pendidikan</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Pendidikan
                            </header>
                            <div class="panel-body">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <a href="{{ route('pendidikan.create') }}">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                </a>

                                <br><br>

                                <table class="table table-striped table-advance table-hover">
                                    <tbody>
                                        <tr>
                                            <th class="icon_bag"></i> Nama</th>
                                            <th class="icon_document"></i> Tingkatan</th>
                                            <th class="icon_calendar"></i> Tahun Masuk</th>
                                            <th class="icon_calendar"></i> Tahun Selesai</th>
                                            <th class="icon_cogs"></i> Action</th>
                                        </tr>

                                        @foreach ($pendidikan as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->tingkatan == 1)
                                                    TK
                                                @elseif ($item->tingkatan == 2)
                                                    SD
                                                @elseif ($item->tingkatan == 3)
                                                    SMP
                                                @elseif ($item->tingkatan == 4)
                                                    SMA/SMK
                                                @elseif ($item->tingkatan == 5)
                                                    D3
                                                @elseif ($item->tingkatan == 6)
                                                    D4/S1
                                                @elseif ($item->tingkatan == 7)
                                                    S2
                                                @elseif ($item->tingkatan == 8)
                                                    S3
                                                @endif
                                            </td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Tombol Edit -->
                                                    <a class="btn btn-warning" href="{{ route('pendidikan.edit', $item->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <!-- Tombol Delete -->
                                                    <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> <!-- Pastikan menggunakan "fa-trash" -->
                                                        </button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
