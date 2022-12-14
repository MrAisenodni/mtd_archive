<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="country">Negara</label>
        <select class="single-select form-control @error('country') is-invalid @enderror" id="country" name="country" @if ($access->add == 0) disabled @endif>
            <option value="">--- SILAHKAN PILIH ---</option>
            @if ($countries)
                @foreach ($countries as $item)
                    <option value="{{ $item->id }}" @if(old('country') == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
        @error('country')
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