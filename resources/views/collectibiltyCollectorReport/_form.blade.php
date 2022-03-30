<div class="form-row">
    <div class="col-md-8 mb-3">
        <label for="credits_account_collector_id_label">Kode Surat Tugas Collector </label>
        <select {{ $business_collector_report_edit->business_collector_report_id != '' ? 'disabled' : '' }} class="custom-select @error('business_collector_id')
        is-invalid
        @enderror"
            id="credits_account_collector_id" required>
            <option selected
                value="{{ $business_collector_report_edit->business_collector_report_id ? $business_collector_report_edit->creditsAccountCollector->credits_account_collector_id : '' }}">
                {{ $business_collector_report_edit->creditsAccountCollector ? $business_collector_report_edit->creditsAccountCollector->credits_account_collector_letter_informing : 'Kode Surat Tugas' }}
            </option>
            @foreach ($acct_credits_account_collector as $credits_account_collector)
                <option value="{{ $credits_account_collector->credits_account_collector_id }}" data-businesscollectorid="{{ $credits_account_collector->business_collector_id }}" data-creditsaccountid="{{ $credits_account_collector->credits_account_id }}">
                    {{ $credits_account_collector->credits_account_collector_letter_informing }}</option>
            @endforeach
        </select>
        <input type="hidden" name="credits_account_collector_id" id="credits_account_collector_id_value" value="{{ $business_collector_report_edit->business_collector_report_id ? $business_collector_report_edit->creditsAccountCollector->credits_account_collector_id : '' }}">
        <div class="invalid-feedback">
            @error('credits_account_collector_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="business_collector_id_label">Business collector </label>
        <select disabled class="custom-select @error('business_collector_id')
        is-invalid
        @enderror"
            id="business_collector_id" name="business_collector_id" required>
            <option selected
                value="{{ $business_collector_report_edit->business_collector_report_id ? $business_collector_report_edit->creditsAccountCollector->business_collector_id : '' }}">
                {{ $business_collector_report_edit->creditsAccountCollector ? $business_collector_report_edit->creditsAccountCollector->businessCollector->business_collector_name : 'Pilih Business Collector' }}
            </option>
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
    <div class="col-md-6 mb-3">
        <label for="credits_account_id_label">Nama Peminjam </label>
        <select disabled class="custom-select @error('credits_account_id')
        is-invalid
        @enderror"
            id="credits_account_id" name="credits_account_id" required>
            <option selected
                value="{{ $business_collector_report_edit->business_collector_report_id ? $business_collector_report_edit->creditsAccountCollector->credits_account_id : '' }}">
                {{ $business_collector_report_edit->creditsAccountCollector ? $business_collector_report_edit->creditsAccountCollector->creditsAccount->credits_account_name : 'Pilih Nama Peminjam' }}
            </option>
            @foreach ($acct_credits_account as $credits_account)
                <option value="{{ $credits_account->credits_account_id }}">
                    {{ $credits_account->credits_account_name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('credits_account_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row">
    <div input-group class="col-md-6  mb-3 ">
        <label for="business_collector_report_meeting_date">Tanggal Pertemuan Dengan Peminjam</label>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
            </div>
            <input placeholder="Masukan Tanggal Realisasi..." value="{{ old('business_collector_report_meeting_date') ?? $business_collector_report_edit->business_collector_report_meeting_date}}" type="date"
                name="business_collector_report_meeting_date" aria-describedby="basic-addon1"
                class="form-control @error('business_collector_report_meeting_date')
        is-invalid
        @enderror"
                id="business_collector_report_meeting_date" value="" required aria-label="business_collector_report_meeting_date"
                aria-describedby="basic-addon1">
        </div>
        <div class="invalid-feedback">
            @error('business_collector_report_meeting_date')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div input-group class="col-md-6  mb-3 ">
        <label for="business_collector_report_others_contact">Kontak Nomer Yang bisa dihubungi</label>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-book"></i></span>
            </div>
            <input placeholder="Masukan Kontak Yang Bisa dihubungi " value="{{ old('business_collector_report_others_contact') ?? $business_collector_report_edit->business_collector_report_others_contact}}" type="text"
                name="business_collector_report_others_contact" aria-describedby="basic-addon1"
                class="form-control @error('business_collector_report_others_contact')
        is-invalid
        @enderror"
                id="business_collector_report_others_contact" value="" required aria-label="business_collector_report_others_contact"
                aria-describedby="basic-addon1">
        </div>
        <div class="invalid-feedback">
            @error('business_collector_report_others_contact')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="business_collector_report_picture">Masukan Foto Keadaan Tempat</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="business_collector_report_picture" id="business_collector_report_picture">
            <label class="custom-file-label" for="business_collector_report_picture">{{ $business_collector_report_edit->business_collector_report_picture }}</label>
          </div>
        <div class="invalid-feedback">
            @error('business_collector_report_picture')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="business_collector_report_meeting_with">Bertemu Dengan</label>
        <input placeholder="Masukan Keterangan Pertemuan ..."
            value="{{ old('business_collector_report_meeting_with') ?? $business_collector_report_edit->business_collector_report_meeting_with}}"
            type="text" name="business_collector_report_meeting_with"
            class="form-control @error('business_collector_report_meeting_with')
        is-invalid
    @enderror"
            id="business_collector_report_meeting_with" value="" >
        <div class="invalid-feedback">
            @error('business_collector_report_meeting_with')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
            <label for="business_collector_report_description">Keterangan</label>
            <textarea style="height:220px" placeholder="Masukan Alamat Lengkap..."
                type="text" name="business_collector_report_description"
                class="form-control @error('business_collector_report_description')
            is-invalid
            @enderror"
                id="business_collector_report_description" required>{{ old('business_collector_report_description') ?? $business_collector_report_edit->business_collector_report_description }}</textarea>
            <div class="invalid-feedback">
                @error('business_collector_report_description')
                    {{ $message }}
                @enderror
            </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group ml-3">
        <div class="control-label" for="business_collector_credit_account_status">Tandai Sebagai Selesai</div>
        <label class="custom-switch mt-2" style="margin-left: -10%;">
          <input type="checkbox" name="business_collector_credit_account_status" id="business_collector_credit_account_status" 
          {{ old('business_collector_credit_account_status') ? 'checked' : ''}} 
          {{ $business_collector_report_edit->business_collector_credit_account_status == 1 ? 'checked' : '' }}
           value="1" class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Dengan mengaktifkan toogle ini, <br>maka peminjam dinyatakan selesai pada tagihan</span>
        </label>
      </div>
</div>


</div>
<script>
     $(document).ready(function() {
        $('#business_collector_id').select2({
        dropdownParent: $('#addCollectibilityCollectorReport')
        });
        $('#credits_account_collector_id').select2({
        dropdownParent: $('#addCollectibilityCollectorReport')
        });
        $('#credits_account_id').select2({
        dropdownParent: $('#addCollectibilityCollectorReport')
        });


        $('#credits_account_collector_id').on('change', function(){
            $('#credits_account_collector_id_value').val($('option:selected', this).val());
            let business_collector_id = $('option:selected', this).attr('data-businesscollectorid');
            let credits_account_id =$('option:selected', this).attr('data-creditsaccountid');
            
            $('#business_collector_id').val(business_collector_id).trigger('change');
            $('#credits_account_id').val(credits_account_id).trigger('change');
        })
    });
</script>