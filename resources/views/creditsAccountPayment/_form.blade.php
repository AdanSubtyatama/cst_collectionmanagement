<label for="credits_account_id">Nomor Akun</label>
<div class="form-row ">
    <div class="col-md-8 mb-3 form-inline">
        <input style="width:80%;margin-right:10px" placeholder="Masukan Nomor Akun..."
            value="{{ old('credits_account_id') ?? $credits_account_payment_edit->credits_account_id }}" type="text"
            name="credits_account_id" class="form-control @error('credits_account_id')
        is-invalid
    @enderror"
            id="credits_account_id" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_id')
                {{ $message }}
            @enderror
        </div>
        <button type="button" class="btn btn-primary" id="selectCreditsAccount">
        Pilih Akun
        </button> 
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_total_amount">Pembiayaan</label>
        <input placeholder="Masukan Pembiayaan..."
            value="{{ old('credits_account_total_amount') ?? $credits_account_payment_edit->creditsAccount['credits_account_total_amount'] }}" type="text"
            name="credits_account_total_amount" class="form-control @error('credits_account_total_amount')
        is-invalid
    @enderror"
            id="credits_account_total_amount" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_total_amount')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_name">Nama</label>
        <input placeholder="Masukan Nama..."
            value="{{ old('credits_account_name') ?? $credits_account_payment_edit->creditsAccount['credits_account_name'] }}" type="text"
            name="credits_account_name" class="form-control @error('credits_account_name')
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
        <label for="credits_account_address">Alamat</label>
        <input placeholder="Masukan Alamat..."
            value="{{ old('credits_account_address') ?? $credits_account_payment_edit->creditsAccount['credits_account_address'] }}" type="text"
            name="credits_account_address" class="form-control @error('credits_account_address')
        is-invalid
    @enderror"
            id="credits_account_address" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_address')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_payment_to">Kota</label>
        <input placeholder="Masukan Kota..."
            value="{{ old('credits_account_payment_to') ?? $credits_account_payment_edit->creditsAccount['city']['credits_account_payment_to'] }}" type="text"
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

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="keterlambatan">Keterlambatan</label>
        <input placeholder="Masukan Keterlambatan..."
            value="{{ old('keterlambatan') ?? $credits_account_payment_edit->creditsAccount['keterlambatan'] }}" type="text"
            name="keterlambatan" class="form-control @error('keterlambatan')
        is-invalid
    @enderror"
            id="keterlambatan" value="" required>
        <div class="invalid-feedback">
            @error('keterlambatan')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_payment_to">Angsuran Ke</label>
        <input placeholder="Masukan Angsuran Ke..."
            value="{{ old('credits_account_payment_to') ?? $credits_account_payment_edit->creditsAccount['credits_account_payment_to'] + 1 }}" type="text"
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


<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_date">Tanggal Realisasi</label>
        <input placeholder="Masukan Tanggal Realisasi..."
            value="{{ old('credits_account_date') ?? $credits_account_payment_edit->creditsAccount['credits_account_date'] }}" type="text"
            name="credits_account_date" class="form-control @error('credits_account_date')
        is-invalid
    @enderror"
            id="credits_account_date" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_date')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_payment_date">Tanggal Jatuh Tempo</label>
        <input placeholder="Masukan Tanggal Jatuh Tempo..."
            value="{{ old('credits_account_payment_date') ?? $credits_account_payment_edit->creditsAccount['credits_account_payment_date'] }}" type="text"
            name="credits_account_payment_date" class="form-control @error('credits_account_payment_date')
        is-invalid
    @enderror"
            id="credits_account_payment_date" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_payment_date')
                {{ $message }}
            @enderror
        </div>
    </div>

</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_period">Jangka Waktu</label>
        <input placeholder="Masukan Jangka Waktu..."
            value="{{ old('credits_account_period') ?? $credits_account_payment_edit->creditsAccount['credits_account_period'] }}" type="text"
            name="credits_account_period" class="form-control @error('credits_account_period')
        is-invalid
    @enderror"
            id="credits_account_period" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_period')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_payment_amount">Jumlah Angsuran</label>
        <input placeholder="Masukan Jumlah Angsuran..."
            value="{{ old('credits_account_payment_amount') ?? $credits_account_payment_edit->creditsAccount['credits_account_payment_amount'] }}" type="text"
            name="credits_account_payment_amount" class="form-control @error('credits_account_payment_amount')
        is-invalid
    @enderror"
            id="credits_account_payment_amount" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_payment_amount')
                {{ $message }}
            @enderror
        </div>
    </div>

</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_period">Angsuran Pokok</label>
        <input placeholder="Masukan Angsuran Pokok..."
            value="{{ old('credits_account_period') ?? $credits_account_payment_edit->creditsAccount['credits_account_period'] }}" type="text"
            name="credits_account_period" class="form-control @error('credits_account_period')
        is-invalid
    @enderror"
            id="credits_account_period" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_period')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="credits_account_payment_amount">Angsuran Margin</label>
        <input placeholder="Masukan Angsuran Margin..."
            value="{{ old('credits_account_payment_amount') ?? $credits_account_payment_edit->creditsAccount['credits_account_payment_amount'] }}" type="text"
            name="credits_account_payment_amount" class="form-control @error('credits_account_payment_amount')
        is-invalid
    @enderror"
            id="credits_account_payment_amount" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_payment_amount')
                {{ $message }}
            @enderror
        </div>
    </div>

</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="credits_account_period">Total</label>
        <input placeholder="Masukan Angsuran Pokok..."
            value="{{ old('credits_account_period') ?? $credits_account_payment_edit->creditsAccount['credits_account_period'] }}" type="text"
            name="credits_account_period" class="form-control @error('credits_account_period')
        is-invalid
    @enderror"
            id="credits_account_period" value="" required>
        <div class="invalid-feedback">
            @error('credits_account_period')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>

<div class="form-row">

<input type="submit" value="Save changes" name="editCollectibilityCollectorReport" class="btn btn-primary" >

</div>

<div class="modal fade" id="selectCreditsAccountModal" tabindex="-1"aria-labelledby="selectCreditsAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('process-add-credits-account') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectCreditsAccountModalLabel">Pilih Akun Kredit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Akun</th>
                                <th>Nama Akun</th>
                                <th>Alamat Akun</th>
                                <th>Tanggal Realisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acct_credits_account as $index => $credits_account)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $credits_account->credits_account_no }}</td>
                                    <td>{{ $credits_account->credits_account_name }}</td>
                                    <td>{{ $credits_account->credits_account_address }}</td>
                                    <td>{{ $credits_account->credits_account_date }}</td>
                                    <td style="min-width: 80px">
                                        
                                    <a href="" class="btn btn-sm btn-primary">Select</a>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                  
                </div>
        </form>

    </div>
</div>
