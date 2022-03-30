<div class="form-row">
    <div class="col-md-8 mb-3">
        <input type="hidden" id="credits_account_id" name="credits_account_id" value="" readonly>
        <input type="hidden" id="credits_account_collector_id" name="credits_account_collector_id" value="" readonly>
        <label for="credits_account_name">Nama Peminjam</label>
        <input placeholder="Masukan Nama Peminjam..."
            value="{{ old('credits_account_name') }}"
            type="text" name="credits_account_name"
            class="form-control @error('credits_account_name')
        is-invalid
    @enderror"
            id="credits_account_name" value="" readonly required>
        <div class="invalid-feedback">
            @error('credits_account_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-8 mb-3">
        <label for="business_collector_id_label">Business collector </label>
        <select class="custom-select @error('business_collector_id')
        is-invalid
        @enderror"
            id="business_collector_id" name="business_collector_id" required>
            <option selected value="">Pilih Business Collector</option>
            @foreach ($core_business_collector as $business_collector)
                <option value="{{ $business_collector->business_collector_id }}">
                    {{ $business_collector->business_collector_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('business_collector_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
</div>
<script>
     $(document).ready(function() {
        $('#business_collector_id').select2({
        dropdownParent: $('#editCollectibilityCreditsAccountModal')
        });
     });
</script>