
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label for="branch_code">Kode Cabang</label>
        <input placeholder="Masukan Kode Cabang...." value="{{ old('branch_code') ?? $core_branch_edit->branch_code }}" type="text"
            name="branch_code"
        class="form-control
        @error('branch_code')
        is-invalid
    @enderror"
            id="branch_code" value="" required>
        <div class="invalid-feedback">
            @error('branch_code')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="branch_name">Nama Cabang</label>
        <input placeholder="Masukan Nama Cabang..." value="{{ old('branch_name') ?? $core_branch_edit->branch_name}}" type="text"
            name="branch_name"
            class="form-control @error('branch_name')
        is-invalid
    @enderror"
            id="branch_name" required>
        <div class="invalid-feedback">
            @error('branch_name')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="branch_address">Alamat Cabang</label>
        <input placeholder="Masukan Alamat Cabang..." value="{{ old('branch_address') ?? $core_branch_edit->branch_address }}" type="text"
            name="branch_address"
            class="form-control @error('branch_address')
        is-invalid
    @enderror"
            id="branch_address" value="" required>
        <div class="invalid-feedback">
            @error('branch_address')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="city_id">Kota Cabang </label>
        <select
            class="custom-select @error('city_id')
        is-invalid
    @enderror"
            id="city_id" name="city_id" required>
            <option selected value="{{ $core_branch_edit->city ? $core_branch_edit->city->city_id : '' }}">{{ $core_branch_edit->city ? $core_branch_edit->city->city_name : 'Pilih Kota' }}</option>
            @foreach ($core_city as $city )
                <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>                
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('city_id')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="branch_contact_person">CP Cabang</label>
        <input placeholder="Masukan Contact Person dapat dihubungi..."
            value="{{ old('branch_contact_person') ?? $core_branch_edit->branch_contact_person  }}" type="text" name="branch_contact_person"
            class="form-control @error('branch_contact_person')
        is-invalid
    @enderror"
            id="branch_contact_person" value="" required>
        <div class="invalid-feedback">
            @error('branch_contact_person')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="branch_phone1">Nomor Telepon 1</label>
        <input placeholder="Masukan Nomor Telepon 1..." value="{{ old('branch_phone1') ?? $core_branch_edit->branch_phone1   }}"
            type="text" name="branch_phone1"
            class="form-control @error('branch_phone1')
        is-invalid
    @enderror"
            id="branch_phone1" value="" required>
        <div class="invalid-feedback">
            @error('branch_phone1')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="branch_phone2">Nomor Telepon 2</label>
        <input placeholder="Masukan Nomor Telepon 2..." value="{{ old('branch_phone2') ?? $core_branch_edit->branch_phone2  }}"
            type="text" name="branch_phone2"
            class="form-control @error('branch_phone2')
        is-invalid
    @enderror"
            id="branch_phone2" value="" required>
        <div class="invalid-feedback">
            @error('branch_phone2')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="branch_email">Email Cabang</label>
        <input placeholder="Masukan Email Cabang..." value="{{ old('branch_email') ?? $core_branch_edit->branch_email  }}" type="text"
            name="branch_email"
            class="form-control @error('branch_email')
        is-invalid
    @enderror"
            id="branch_email" value="" required>
        <div class="invalid-feedback">
            @error('branch_email')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">Manajer Cabang</label>
        <input placeholder="Masukan Manajer Cabang" value="{{ old('branch_manager') ?? $core_branch_edit->branch_manager}}" type="text"
            name="branch_manager"
            class="form-control @error('branch_manager')
        is-invalid
    @enderror"
            id="branch_manager" value="" required>
        <div class="invalid-feedback">
            @error('branch_manager')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>