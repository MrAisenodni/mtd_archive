<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="district">Kecamatan</label>
        <select class="single-select form-control @error('district') is-invalid @enderror" id="district" name="district" @if ($access->add == 0) disabled @endif>
            <option value="">--- SILAHKAN PILIH ---</option>
            @if ($districts)
                @foreach ($districts as $item)
                    <option value="{{ $item->id }}" @if(old('district') == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
        @error('district')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="code">Kode {{ $menu->title }}</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" @if ($access->add == 0) disabled @endif>
        @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="name">{{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" @if ($access->add == 0) disabled @endif>
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