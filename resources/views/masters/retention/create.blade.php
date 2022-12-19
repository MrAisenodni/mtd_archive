<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="time">{{ $menu->title }}</label>
        <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time') }}">
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="type">Tipe Waktu</label>
        <select class="single-select form-control @error('type') is-invalid @enderror" id="type" name="type">
            <option value="day" @if (old('type') == 'day') selected @endif>Hari</option>
            <option value="month" @if (old('type') == 'month') selected @endif>Bulan</option>
            <option value="year" @if (old('type') == 'year') selected @endif>Tahun</option>
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
    </div>
</form>