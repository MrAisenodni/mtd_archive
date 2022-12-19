<form class="row g-3" action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-12">
        <label class="form-label" for="time">{{ $menu->title }}</label>
        <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time', $detail->time) }}">
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="type">Tipe Waktu</label>
        <select class="single-select form-control @error('type') is-invalid @enderror" id="type" name="type">
            <option value="day" @if (old('type', $detail->type) == 'day') selected @endif>Hari</option>
            <option value="month" @if (old('type', $detail->type) == 'month') selected @endif>Bulan</option>
            <option value="year" @if (old('type', $detail->type) == 'year') selected @endif>Tahun</option>
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="d-grid">
                    <a href="{{ $menu->url }}" class="btn btn-primary">TAMBAH</a>
                </div>
            </div>
            <div class="col-6">
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
</form>