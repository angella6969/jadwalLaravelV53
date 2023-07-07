@extends('layout.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Perencanaan Agenda Ruang Rapat</h1>
    </div>
    <br>

    <form id="my-form" class="form-label-left input_mask" method="post" enctype="multipart/form-data"
        action="/dashboard/update/{{ $jadwal->id }}">
        {{ csrf_field() }}

        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Pembahasan</label>
            <input type="text" class="form-control " id="tittle" name="tittle" placeholder="Agenda Pembahasan"
                value="{{ $jadwal->tittle }}" required>
        </div>

        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Ruang</label>
            <select class="form-select" name="room" id="room" required>
                <option selected>Pilih Ruang</option>
                <option value="">Ruang Rapat</option>
                <option value="RR Serayu">RR Serayu</option>
                <option value="RR Opak">RR Opak</option>
                <option value="RR Wadaslintang">RR Wadaslintang</option>
                <option value="RR Kabali">RR Kabalai</option>
                <option value="RR Progo">RR Progo</option>
                <option value="RR Bribin">RR Bribin</option>
            </select>
        </div>
        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Time</label>
            <input type="text" class="form-control " id="time" name="time"
                placeholder="Agenda Acara ( ect: 09.00 - selesai )" value="{{ $jadwal->time }}" required>
        </div>
        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Penyelenggara</label>
            <input type="text" class="form-control " id="by" name="by" placeholder="Penyelenggara Agenda"
                value="{{ $jadwal->by }}" required>
        </div>

        <div class="col-md-4 col-sm-6 mb-3">
            <label for="">Jadwal Agenda</label>
            <input class="date-picker form-control" name="days" placeholder="dd-mm-yyyy" type="text"
                value="{{ $jadwal->days }}" required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                onclick="this.type='date'" onblur="this.type='text'">
        </div>

        {{-- Field Button --}}
        <div class="form-group row">
            <div class="d-flex justify-content-center">

                {{-- Field Button Back --}}
                <a class="btn btn-info" href="/dashboard" role="button"
                    style="margin: 10px;   width: 150px;
                        height: 40px; ">Back</a>
                {{-- End Field Button Back --}}

                {{-- Field Button Reset --}}
                <button class="btn btn-primary" style="margin: 10px;   width: 150px;
                    height: 40px;"
                    type="reset">Reset</button>
                {{-- End Field Button Reset --}}

                {{-- Field Button Sumbit --}}
                <button type="submit" class="btn btn-success"
                    style="margin: 10px;   width: 150px;
                    height: 40px;">Submit</button>
                {{-- End Field Button Sumbit --}}

            </div>
        </div>
        {{-- End Field Button --}}

    </form>
    </div>
    {{-- </div> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kode Anda yang menggunakan iziToast
            iziToast.success({
                message: '{{ Session::get('success') }}',
                position: 'topRight',
            });
        });
    </script>
@endsection
