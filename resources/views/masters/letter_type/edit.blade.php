<form class="row g-3" action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-12">
        <label class="form-label" for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $detail->name) }}">
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