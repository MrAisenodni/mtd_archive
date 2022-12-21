<form class="row g-3" action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-12">
        <label class="form-label" for="name">Nama {{ $menu->title }}</label>
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