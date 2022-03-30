
    @csrf
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_nomor">Nomor BPKB</label>
            <input placeholder="Masukan Nomor BPKB..."
                value="{{ old('credits_agunan_bpkb_nomor')}}" type="text"
                name="credits_agunan_bpkb_nomor" class="form-control @error('credits_agunan_bpkb_nomor')
            is-invalid
        @enderror"
                id="credits_agunan_bpkb_nomor" value="" required>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_nomor')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_nama">Nama BPKB</label>
            <input placeholder="Masukan Atas Nama BPKB..."
                value="{{ old('credits_agunan_bpkb_nama')}}" type="text"
                name="credits_agunan_bpkb_nama" class="form-control @error('credits_agunan_bpkb_nama')
            is-invalid
            @enderror"
                id="credits_agunan_bpkb_nama" value="" required>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_nama')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_nopol">Nomor Polisi</label>
            <input placeholder="Masukan Nomor Polisi..."
                value="{{ old('credits_agunan_bpkb_nopol')}}" type="text"
                name="credits_agunan_bpkb_nopol" class="form-control @error('credits_agunan_bpkb_nopol')
            is-invalid
            @enderror"
                id="credits_agunan_bpkb_nopol" value="" required>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_nopol')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_no_mesin">Nomor Mesin</label>
            <input placeholder="Masukan Nomor Mesin..."
                value="{{ old('credits_agunan_bpkb_no_mesin')}}" type="text"
                name="credits_agunan_bpkb_no_mesin" class="form-control @error('credits_agunan_bpkb_no_mesin')
            is-invalid
            @enderror"
                id="credits_agunan_bpkb_no_mesin" value="" required>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_no_mesin')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_no_rangka">Nomor Rangka</label>
            <input placeholder="Masukan Nomor Rangka Kendaraan..."
                value="{{ old('credits_agunan_bpkb_no_rangka')}}" type="text"
                name="credits_agunan_bpkb_no_rangka" class="form-control @error('credits_agunan_bpkb_no_rangka')
            is-invalid
            @enderror"
                id="credits_agunan_bpkb_no_rangka" value="" required>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_no_rangka')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="credits_agunan_bpkb_taksiran">Taksiran</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon">Rp.</span>
                </div>
                <input placeholder="Masukan Taksiran..."
                    value="{{ old('credits_agunan_bpkb_taksiran')}}" type="text" 
                    name="credits_agunan_bpkb_taksiran" class="form-control @error('credits_agunan_bpkb_taksiran')
                is-invalid
            @enderror"
                    id="credits_agunan_bpkb_taksiran" value="" required>
            </div>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_taksiran')
                    {{ $message }}
                @enderror
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="credits_agunan_bpkb_keterangan">keterangan</label>
            <textarea style="height:150px" placeholder="Masukan keterangan..."
                value="{{ old('credits_agunan_bpkb_keterangan')}}" type="text"
                name="credits_agunan_bpkb_keterangan" class="form-control @error('credits_agunan_bpkb_keterangan')
            is-invalid
            @enderror"
                id="credits_agunan_bpkb_keterangan" value="" required></textarea>
            <div class="invalid-feedback">
                @error('credits_agunan_bpkb_keterangan')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <button id="processAddAgunanBPKB" type="submit" class="btn btn-success">Masukan Agunan</button>
