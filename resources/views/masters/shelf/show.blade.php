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
        <label class="form-label" for="chest">Kelompok {{ $menu->title }}</label>
        <select class="single-select form-control @error('chest') is-invalid @enderror" id="chest" name="chest" disabled>
            <option value="">--- SILAHKAN PILIH ---</option>
            @if ($chests)
                @foreach ($chests as $item)
                    <option value="{{ $item->id }}" @if(old('chest', $detail->chest_id) == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
        @error('chest')
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