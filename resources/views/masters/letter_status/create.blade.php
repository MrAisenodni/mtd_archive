<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-8">
        <label class="form-label" for="name">Nama {{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="back_color">BG</label>
        <input type="color" class="form-control" id="back_color" name="back_color" value="{{ old('back_color') }}" style="padding: 0.1rem; margin: 0; height: 37px">
        @error('back_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-2" style="padding-left: 0; padding-bottom: 0;">
        <label class="form-label" for="fore_color">FG</label>
        <input type="color" class="form-control" id="fore_color" name="fore_color" value="{{ old('fore_color') }}" style="padding: 0.1rem; margin: 0; height: 37px">
        @error('fore_color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
    </div>
</form>