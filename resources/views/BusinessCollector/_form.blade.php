<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="business_collector_code">Kode Collector</label>
        <input placeholder="Masukan Kode Collector..."
            value="{{ old('business_collector_code') ?? $core_business_collector_edit->business_collector_code }}" type="text"
            name="business_collector_code"
            class="form-control @error('business_collector_code')
        is-invalid
    @enderror"
            id="business_collector_code" required>
        <div class="invalid-feedback">
            @error('business_collector_code')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="business_collector_name">Nama Collector</label>
        <input placeholder="Masukan Nama Collector..." value="{{ old('business_collector_name') ?? $core_business_collector_edit->business_collector_name }}"
            type="text" name="business_collector_name"
            class="form-control @error('business_collector_name')
        is-invalid
    @enderror" id="business_collector_name" value=""
            required>
        <div class="invalid-feedback">
            @error('business_collector_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
