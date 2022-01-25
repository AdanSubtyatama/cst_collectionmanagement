<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="source_fund_code">Kode Sumber Dana</label>
        <input placeholder="Masukan Kode Sumber Dana..." value="{{ old('source_fund_code') ?? $acct_source_fund_edit->source_fund_code}}" type="text"
            name="source_fund_code"
            class="form-control @error('source_fund_code')
        is-invalid
    @enderror"
            id="source_fund_code" required>
        <div class="invalid-feedback">
            @error('source_fund_code')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="source_fund_name">Nama Sumber Dana</label>
        <input placeholder="Masukan Nama Sumber Dana..." value="{{ old('source_fund_name') ?? $acct_source_fund_edit->source_fund_name }}" type="text"
            name="source_fund_name"
            class="form-control @error('source_fund_name')
        is-invalid
    @enderror"
            id="source_fund_name" value="" required>
        <div class="invalid-feedback">
            @error('source_fund_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>