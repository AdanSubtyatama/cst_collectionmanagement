<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="business_officer_code">Kode Officer</label>
        <input placeholder="Masukan Kode Officer..."
            value="{{ old('business_officer_code') ?? $core_business_officer_edit->business_officer_code }}" type="text"
            name="business_officer_code"
            class="form-control @error('business_officer_code')
        is-invalid
    @enderror"
            id="business_officer_code" required>
        <div class="invalid-feedback">
            @error('business_officer_code')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="business_officer_name">Nama Officer</label>
        <input placeholder="Masukan Nama Officer..." value="{{ old('business_officer_name') ?? $core_business_officer_edit->business_officer_name }}"
            type="text" name="business_officer_name"
            class="form-control @error('business_officer_name')
        is-invalid
    @enderror" id="business_officer_name" value=""
            required>
        <div class="invalid-feedback">
            @error('business_officer_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
