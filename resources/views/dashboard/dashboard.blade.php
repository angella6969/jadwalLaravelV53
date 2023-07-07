@extends('layout.main')



@Section('tittle')
    <title> SISDA | Agenda Rapat </title>
@Section('container')
    <style>
        body {
            background-image: url("{{ asset('images/9c7be43979a736a8695361a544630b97.jpg') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>

    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" style=" color: #4df1f1;" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/video"style=" color: #4df1f1;" class="nav-link px-2 link-dark">Video</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" style=" color: #4df1f1;" class="btn btn-outline-primary">
                        logout <span data-feather="log-out" class="align-text-bottom"></span>
                    </button>
                </form>
            </div>
        </header>

        <div class="row">

            {{-- View Table User --}}
            <div class="col-xl-8 col-md-6 mb-2">
                <div class="card bg-secondary text-white  h-100">
                    <div class="card-body">
                        <h2>Daftar Agenda Rapat</h2>
                        {{-- <h3>{{ $users->count() }}</h3> --}}


                        <div class="table-responsive mt-3">
                            <table class="table text-white">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Ruang</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Pembahasan</th>
                                        <th scope="col">Penyelenggara </th>
                                        <th scope="col">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td> {{ $item->room }}</td>
                                            <td> {{ Carbon\Carbon::parse($item->days)->formatLocalized('%A') }}</td>
                                            <td> {{ Carbon\Carbon::parse($item->days)->formatLocalized('%d %B %Y') }}</td>
                                            <td> {{ $item->time }}</td>
                                            <td> {{ $item->tittle }}</td>
                                            <td> {{ $item->by }}</td>
                                            <td> <a href="/dashboard/edit/{{ $item->id }}"
                                                    class="badge bg-warning border-0 "><span data-feather="edit"></span></a>

                                                <form action="/dashboard/jadwal/{{ $item->id }}" class="d-inline"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="badge bg-danger border-0"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data yang berhubungan dengan?')"><span
                                                            data-feather="file-minus"></span></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="position-relative mt-3">
                                <ul class="pagination">
                                    {{ $jadwal->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a type="button" class="btn btn-primary" href="/dashboard/create"
                            style="margin: 10px;   width: 150px; height: 40px;">Tambah Agenda</a>

                    </div>
                </div>
            </div>
            {{-- End View Table User --}}

            {{-- View Table Category --}}
            <div class="col-xl-4 col-md-6 mb-2">
                <div class="card bg-success text-white  h-100">
                    <div class="card-body">
                        <h2>Daftar Video</h2>
                        {{-- <h3>{{ $categories->count() }}</h3> --}}
                        <div class="table-responsive mt-3">
                            <table class="table text-white  table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">VideoID Youtube</th>
                                        <th scope="col">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($videoID as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td> <img src="https://img.youtube.com/vi/{{ $item->url }}/maxresdefault.jpg"
                                                alt="Thumbnail YouTube" width="100"></td>
                                        <td> {{ $item->url }}</td>
                                        <td>
                                            <a href="#" class="badge bg-warning border-0 "><span
                                                    data-feather="edit"></span></a>

                                            <form action="/dashboard/code/{{ $item->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="badge bg-danger border-0"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data yang berhubungan dengan? {{ $item->name }}')">
                                                    <span data-feather="file-minus"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{ $videoID->links() }}
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a type="button" class="btn btn-primary" href="/dashboard/code"
                            style="margin: 10px;   width: 200; height: 40px;">Tambah Daftar Video</a>

                    </div>
                </div>
            </div>
            {{-- End View Table Category --}}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kode Anda yang menggunakan iziToast
            iziToast.success({
                message: '{{ Session::get('success') }}',
                position: 'topLeft',
            });
        });
    </script>
@endsection
