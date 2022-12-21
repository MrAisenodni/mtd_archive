<form class="row g-3" action="{{ $menu->url }}" method="POST">
    @csrf
    <div class="col-12">
        <label class="form-label" for="name">Nama {{ $menu->title }}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" @if ($access->add == 0) disabled @endif>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="chest">Kelompok {{ $menu->title }}</label>
        <select class="single-select form-control @error('chest') is-invalid @enderror" id="chest" name="chest" @if ($access->add == 0) disabled @endif>
            <option value="">--- SILAHKAN PILIH ---</option>
            @if ($chests)
                @foreach ($chests as $item)
                    <option value="{{ $item->id }}" @if(old('chest') == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
        @error('chest')
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