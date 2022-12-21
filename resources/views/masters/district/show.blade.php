<form class="row g-3" action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-12">
        <label class="form-label" for="city">Kota</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $detail->city->name) }}" disabled>
        @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="code">Kode {{ $menu->title }}</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $detail->code) }}" disabled>
        @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="name">{{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $detail->name) }}" disabled>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="d-grid">
                    <a href="{{ $menu->url }}" class="btn btn-primary">TAMBAH</a>
                </div>
            </div>
        </div>
    </div>
</form>