<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="province">Provinsi</label>
        <select class="single-select form-control @error('province') is-invalid @enderror" id="province" name="province">
            <option value="">--- SILAHKAN PILIH ---</option>
            @if ($provinces)
                @foreach ($provinces as $item)
                    <option value="{{ $item->id }}" @if(old('province') == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
        @error('province')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="code">Kode {{ $menu->title }}</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
        @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="name">{{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        @if ($access->add == 1)
        <div class="d-grid">
            <button type="submit" class="btn btn-success">SIMPAN</button>
        </div>
        @endif
    </div>
</form>