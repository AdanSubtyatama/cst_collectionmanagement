
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="branch_id">Cabang </label>
        <select class="custom-select @error('branch_id')
        is-invalid
    @enderror" id="branch_id"
            name="branch_id" required>
            <option selected
                value="{{ $acct_credits_account_edit->branch ? $acct_credits_account_edit->branch->branch_id : '' }}">
                {{ $acct_credits_account_edit->branch ? $acct_credits_account_edit->branch->branch_name : 'Pilih Cabang' }}
            </option>
            @foreach ($core_branch as $branch)
                <option value="{{ $branch->branch_id }}">{{ $branch->branch_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('branch_id')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="business_officer_id">Business Officer </label>
        <select class="custom-select @error('business_officer_id')
        is-invalid
        @enderror"
            id="business_officer_id" name="business_officer_id" required>
            <option selected
                value="{{ $acct_credits_account_edit->business_officer ? $acct_credits_account_edit->business_officer->business_officer_id : '' }}">
                {{ $acct_credits_account_edit->business_officer ? $acct_credits_account_edit->business_officer->business_officer_name : 'Pilih Business Officer' }}
            </option>
            @foreach ($core_business_officer as $business_officer)
                <option value="{{ $business_officer->business_officer_id }}">
                    {{ $business_officer->business_officer_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('business_officer_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_no">Nomor Akun</label>
        <input placeholder="Masukan Nomor Akun..."
            value="{{ old('credits_account_no') ?? $acct_credits_account_edit->credits_account_no }}" type="text"
            name="credits_account_no" class="form-control @error('credits_account_no')
        is-invalid
    @enderror"
            id="credits_account_no" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_no')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="credits_account_name">Nama Akun</label>
        <input placeholder="Masukan Nama Akun..."
            value="{{ old('credits_account_name') ?? $acct_credits_account_edit->credits_account_name }}"
            type="text" name="credits_account_name"
            class="form-control @error('credits_account_name')
        is-invalid
    @enderror"
            id="credits_account_name" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="source_fund_id">Sumber Dana </label>
        <select class="custom-select @error('source_fund_id')
        is-invalid
    @enderror" id="source_fund_id"
            name="source_fund_id" required>
            <option selected
                value="{{ $acct_credits_account_edit->source_fund ? $acct_credits_account_edit->source_fund->source_fund_id : '' }}">
                {{ $acct_credits_account_edit->source_fund ? $acct_credits_account_edit->source_fund->source_fund_name : 'Pilih Sumber Dana' }}
            </option>
            @foreach ($acct_source_fund as $source_fund)
                <option value="{{ $source_fund->source_fund_id }}">{{ $source_fund->source_fund_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('source_fund_id')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="credits_id">Jenis Pinjaman </label>
        <select class="custom-select @error('credits_id')
        is-invalid
    @enderror" id="credits_id"
            name="credits_id" required>
            <option selected
                value="{{ $acct_credits_account_edit->credits ? $acct_credits_account_edit->credits->credits_id : '' }}">
                {{ $acct_credits_account_edit->credits ? $acct_credits_account_edit->credits->credits_name : 'Pilih Jenis Pinjaman' }}
            </option>
            @foreach ($acct_credits as $credits)
                <option value="{{ $credits->credits_id }}">{{ $credits->credits_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('credits_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row mb-5">
    <div class="col-md-6">
        <div class="col-md-12 mb-3">
            <label for="province_id">Provinsi </label>
            <select id="province_id"
                class="province_id custom-select @error('province_id')
            is-invalid @enderror"
                name="province_id" required>
                <option selected
                    value="{{ $acct_credits_account_edit->province ? $acct_credits_account_edit->province->province_id : '' }}">
                    {{ $acct_credits_account_edit->province ? $acct_credits_account_edit->province->province_name : 'Pilih Province' }}
                </option>
                @foreach ($core_province as $province)
                    <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('province_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="city_id">Kota </label>
            <select class="custom-select @error('city_id')
            is-invalid
            @enderror" id="city_id"
                name="city_id" required>
                <option selected
                    value="{{ $acct_credits_account_edit->city ? $acct_credits_account_edit->city->city_id : '' }}">
                    {{ $acct_credits_account_edit->city ? $acct_credits_account_edit->city->city_name : 'Pilih Kota' }}
                </option>
            </select>
            <div class="invalid-feedback">
                @error('city_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="kecamatan_id">Kecamatan </label>
            <select class="custom-select @error('kecamatan_id')
            is-invalid
            @enderror"
                id="kecamatan_id" name="kecamatan_id" required>
                <option selected
                    value="{{ $acct_credits_account_edit->kecamatan ? $acct_credits_account_edit->kecamatan->kecamatan_id : '' }}">
                    {{ $acct_credits_account_edit->kecamatan ? $acct_credits_account_edit->kecamatan->kecamatan_name : 'Pilih Kecamatan' }}
                </option>
            </select>
            <div class="invalid-feedback">
                @error('kecamatan_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="col-md-12 mb-3">
            <label for="credits_account_address">Alamat Lengkap</label>
            <textarea style="height:220px" placeholder="Masukan Alamat Lengkap..."
                type="text" name="credits_account_address"
                class="form-control @error('credits_account_address')
            is-invalid
            @enderror"
                id="credits_account_address" required>{{ old('credits_account_address') ?? $acct_credits_account_edit->credits_account_address }}</textarea>
            <div class="invalid-feedback">
                @error('credits_account_address')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
</div>

<h5 class="my-5">Nominal Pinjaman</h5>
<div class="form-row mt-5">
    <div class="col-md-3 mb-3">
        <label for="credits_account_total_amount">Total Pinjaman<sup>Total Amount</sup></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon">Rp.</span>
            </div>
            <input placeholder="Masukan Total Pinjaman..."
            value="{{ old('credits_account_total_amount') ?? $acct_credits_account_edit->credits_account_total_amount }}" type="text"
            name="credits_account_total_amount" class="form-control @error('credits_account_total_amount')
             is-invalid
             @enderror"
            id="credits_account_total_amount" value="" required>
        </div>
        <div class="invalid-feedback">
            @error('credits_account_total_amount')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="credits_account_payment_amount">Jumlah Pembayaran<sup>Payment Amount</sup></label>
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon">Rp.</span>
                </div>
            <input placeholder="Masukan Jumlah Pembayaran..."
                value="{{ old('credits_account_payment_amount') ?? $acct_credits_account_edit->credits_account_payment_amount }}" type="text"
                name="credits_account_payment_amount" class="form-control @error('credits_account_payment_amount')
                is-invalid
                 @enderror"
                id="credits_account_payment_amount" value="" required>
        </div>
        <div class="invalid-feedback">
            @error('credits_account_payment_amount')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="credits_account_last_balance">Saldo Akhir <sup>Last Balance</sup></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon">Rp.</span>
            </div>
            <input placeholder="Masukan Saldo Akhir..."
                value="{{ old('credits_account_last_balance') ?? $acct_credits_account_edit->credits_account_last_balance }}" type="text" 
                name="credits_account_last_balance" class="form-control @error('credits_account_last_balance')
            is-invalid
        @enderror"
                id="credits_account_last_balance" value="" required>
        </div>
        <div class="invalid-feedback">
            @error('credits_account_last_balance')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="credits_account_payment_to">Pembayaran Ke <sup>Payment To</sup></label>
        <input placeholder="Masukan Pembayaran Ke..."
            value="{{ old('credits_account_payment_to') ?? $acct_credits_account_edit->credits_account_payment_to }}" type="number"
            name="credits_account_payment_to" class="form-control @error('credits_account_payment_to')
        is-invalid
    @enderror"
            id="credits_account_payment_to" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_payment_to')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>


<h5 class="my-5">Jangka Pinjaman</h5>
<div class="form-row mt-5">
    <div input-group class="col-md-4 mb-3 ">
        <label for="credits_account_date">Tanggal Realisasi</label>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            </div>
            <input placeholder="Masukan Tanggal Realisasi..." value="{{ old('credits_account_period') ?? $acct_credits_account_edit->credits_account_date}}" type="date"
                name="credits_account_date" aria-describedby="basic-addon1"
                class="form-control @error('credits_account_date')
        is-invalid
        @enderror"
                id="credits_account_date" value="" required aria-label="credits_account_date"
                aria-describedby="basic-addon1">
        </div>
        <div class="invalid-feedback">
            @error('credits_account_date')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="credits_account_period">Jangka Waktu <sup>/ 7 Hari</sup></label>
        <input readonly placeholder="Masukan Jangka Waktu..."
            value="{{ old('credits_account_period') ?? $acct_credits_account_edit->credits_account_period }}"
            type="number" name="credits_account_period"
            class="form-control @error('credits_account_period')
        is-invalid
    @enderror"
            id="credits_account_period" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_period')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="credits_account_due_date">Jatuh Tempo</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            </div>
            <input placeholder="Jatuh Tempo *otomatis"
                value="{{ old('credits_account_due_date') ?? $acct_credits_account_edit->credits_account_due_date }}"
                type="text"  readonly name="credits_account_due_date"
                class="form-control @error('credits_account_due_date')
        is-invalid
    @enderror"
                id="credits_account_due_date" value="" required>
        </div>
        <div class="invalid-feedback">
            @error('credits_account_due_date')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<script>

    const credits_account_total_amount = document.getElementById('credits_account_total_amount');
    const credits_account_payment_amount = document.getElementById('credits_account_payment_amount');
    const credits_account_last_balance = document.getElementById('credits_account_last_balance');
    credits_account_total_amount.addEventListener('change', function(e){
        credits_account_total_amount.value = formatRupiah(this.value);
    });
    credits_account_payment_amount.addEventListener('change', function(e){
        credits_account_payment_amount.value = formatRupiah(this.value);
    });
    credits_account_last_balance.addEventListener('change', function(e){
        credits_account_last_balance.value = formatRupiah(this.value);
    });
    
    function formatRupiah(number)
    {
        const removeDotNumber = number.replaceAll(',', '');
        console.log(removeDotNumber)
        let removeDotNumber_temp = removeDotNumber.toString(), 
		rupiah = removeDotNumber_temp.split('.')[0], 
		cents = (removeDotNumber_temp.split('.')[1] || '') +'00';
		rupiah = rupiah.split('').reverse().join('')
			.replace(/(\d{3}(?!$))/g, '$1,')
			.split('').reverse().join('');
		return rupiah + '.' + cents.slice(0, 2);
    }
    $(document).ready(function() {
        $('#branch_id').select2({
        dropdownParent: $('#addCreditsAccount')
        });
        $('#business_officer_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#source_fund_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#province_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#city_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#kelurahan_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#credits_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
        $('#kecamatan_id').select2({
            dropdownParent: $('#addCreditsAccount')
        });
    });
    

        $('#province_id').on('change', function() {
            $('#city_id').html(new Option('Pilih Kota', ''));
            $('#kecamatan_id').html(new Option('Pilih Kecamatan', ''));
            $.ajax({
                url: '{{ url('credits-account/get-city') }}/' + $(this).val(),
                type: "GET",
                success: function(data) {
                    data.forEach(city => {
                        $('#city_id').append(new Option(city.city_name, city.city_id));
                    });
                }
            });
        })

        $('#city_id').on('change', function() {
            $('#kecamatan_id').html(new Option('Pilih Kecamatan', ''));
            $.ajax({
                url: '{{ url('credits-account/get-kecamatan') }}/' + $(this).val(),
                type: "GET",
                success: function(data) {
                    data.forEach(kecamatan => {
                        $('#kecamatan_id').append(new Option(kecamatan.kecamatan_name, kecamatan
                            .kecamatan_id));
                    });
                }
            });
        })
        $('#credits_account_date').on('change', function(){
            $('#credits_account_period').val('');
            $('#credits_account_due_date').val('');
            $('#credits_account_period').removeAttr('readonly');
        });
        Date.prototype.addDays = function (days) {
            const date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
        $('#credits_account_period').on('keyup', function(){
            const today     = new Date($('#credits_account_date').val());
            const due_date  = today.addDays(7*$(this).val());
            const dd        = String(due_date.getDate()).padStart(2, '0');
            const mm        = String(due_date.getMonth() + 1).padStart(2, '0'); //January is 0!
            const yyyy      = due_date.getFullYear();

            let due_date_temp   = dd + '/' + mm + '/' + yyyy;
            $('#credits_account_due_date').val(due_date_temp);
        })
    
</script>

