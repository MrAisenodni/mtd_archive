<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>
</form>