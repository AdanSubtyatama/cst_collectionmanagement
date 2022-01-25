
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="credits_code">Kode Kredit</label>
        <input placeholder="Masukan Kode Kredit...." value="{{ old('credits_code') ?? $acct_credits_edit->credits_code }}" type="text"
            name="credits_code"
        class="form-control
        @error('credits_code')
        is-invalid
    @enderror"
            id="credits_code" value="" required>
        <div class="invalid-feedback">
            @error('credits_code')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_name">Nama Kredit</label>
        <input placeholder="Masukan Nama Kredit..." value="{{ old('credits_name') ?? $acct_credits_edit->credits_name}}" type="text"
            name="credits_name"
            class="form-control @error('credits_name')
        is-invalid
    @enderror"
            id="credits_name" required>
        <div class="invalid-feedback">
            @error('credits_name')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="credits_number">Nomor Kredit</label>
        <input placeholder="Masukan Nomor Kredit..." value="{{ old('credits_number') ?? $acct_credits_edit->credits_number }}" type="number"
            name="credits_number"
            class="form-control @error('credits_number')
        is-invalid
    @enderror"
            id="credits_number" value="" required>
        <div class="invalid-feedback">
            @error('credits_number')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>