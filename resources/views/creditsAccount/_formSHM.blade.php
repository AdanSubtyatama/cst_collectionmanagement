
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="credits_agunan_shm_no_sertifikat">Nomor Sertifikat</label>
        <input placeholder="Masukan Nomor Sertifikat..."
            value="{{ old('credits_agunan_shm_no_sertifikat')}}" type="text"
            name="credits_agunan_shm_no_sertifikat" class="form-control @error('credits_agunan_shm_no_sertifikat')
        is-invalid
    @enderror"
            id="credits_agunan_shm_no_sertifikat" value="" required>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_no_sertifikat')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="credits_agunan_shm_atas_nama">Atas Nama</label>
        <input placeholder="Masukan Atas Nama..."
            value="{{ old('credits_agunan_shm_atas_nama')}}" type="text"
            name="credits_agunan_shm_atas_nama" class="form-control @error('credits_agunan_shm_atas_nama')
        is-invalid
        @enderror"
            id="credits_agunan_shm_atas_nama" value="" required>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_atas_nama')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="credits_agunan_shm_luas">Luas</label>
        <input placeholder="Masukan Luas..."
            value="{{ old('credits_agunan_shm_luas')}}" type="text"
            name="credits_agunan_shm_luas" class="form-control @error('credits_agunan_shm_luas')
        is-invalid
        @enderror"
            id="credits_agunan_shm_luas" value="" required>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_luas')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="credits_agunan_shm_kedudukan">Kedudukan</label>
        <input placeholder="Masukan Kedudukan..."
            value="{{ old('credits_agunan_shm_kedudukan')}}" type="text"
            name="credits_agunan_shm_kedudukan" class="form-control @error('credits_agunan_shm_kedudukan')
        is-invalid
        @enderror"
            id="credits_agunan_shm_kedudukan" value="" required>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_kedudukan')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="credits_agunan_shm_taksiran">Taksiran</label>
        <input placeholder="Masukan Taksiran Kendaraan..."
            value="{{ old('credits_agunan_shm_taksiran')}}" type="text"
            name="credits_agunan_shm_taksiran" class="form-control @error('credits_agunan_shm_taksiran')
        is-invalid
        @enderror"
            id="credits_agunan_shm_taksiran" value="" required>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_taksiran')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="credits_agunan_shm_keterangan">keterangan</label>
        <textarea style="height:150px" placeholder="Masukan keterangan..."
            value="{{ old('credits_agunan_shm_keterangan')}}" type="text"
            name="credits_agunan_shm_keterangan" class="form-control @error('credits_agunan_shm_keterangan')
        is-invalid
        @enderror"
            id="credits_agunan_shm_keterangan" value="" required></textarea>
        <div class="invalid-feedback">
            @error('credits_agunan_shm_keterangan')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<button id="processAddAgunanSHM" type="submit" class="btn btn-success">Masukan Agunan</button>

