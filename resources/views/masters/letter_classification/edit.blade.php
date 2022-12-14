<form class="row g-3" action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-8">
        <label class="form-label" for="name">Nama {{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $detail->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="back_color">BG</label>
        <input type="color" class="form-control" id="back_color" name="back_color" value="{{ old('back_color', $detail->back_color) }}" style="padding: 0.1rem; margin: 0; height: 37px">
        @error('back_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="fore_color">FG</label>
        <input type="color" class="form-control" id="fore_color" name="fore_color" value="{{ old('fore_color', $detail->fore_color) }}" style="padding: 0.1rem; margin: 0; height: 37px">
        @error('fore_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 mt-2">
        <input class="form-check-input" type="checkbox" value="1" id="main_status" name="main_status" @if (old('main_status', $detail->main_status) == 1) checked @endif>
        <label class="form-check-label" for="main_status">Status Utama?</label>
    </div>
    <div class="col-12 mt-2">
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