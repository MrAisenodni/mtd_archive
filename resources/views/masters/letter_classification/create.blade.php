<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-8">
        <label class="form-label" for="name">Nama {{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" @if ($access->add == 0) disabled @endif>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="back_color">BG</label>
        <input type="color" class="form-control" id="back_color" name="back_color" value="{{ old('back_color') }}" style="padding: 0.1rem; margin: 0; height: 37px" @if ($access->add == 0) disabled @endif>
        @error('back_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="fore_color">FG</label>
        <input type="color" class="form-control" id="fore_color" name="fore_color" value="{{ old('fore_color') }}" style="padding: 0.1rem; margin: 0; height: 37px" @if ($access->add == 0) disabled @endif>
        @error('fore_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 mt-2">
        <input class="form-check-input" type="checkbox" value="1" id="main_status" name="main_status" @if (old('main_status') == 1) checked @endif @if ($access->add == 0) disabled @endif>
        <label class="form-check-label" for="main_status">Status Utama?</label>
    </div>
    <div class="col-12 mt-2">
        @if ($access->add == 1)
        <div class="d-grid">
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
        @endif
    </div>
</form>