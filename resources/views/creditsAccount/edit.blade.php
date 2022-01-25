<x-app title='Edit Data Akun Kredit {{ $acct_credits_account_edit->credits_account_name }}'>
    <div class="flex flex-row">
        @foreach ($errors->all() as $error)
        <div class="col-6 p-2 alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
    </div>
    <div class="card bg-light mb-3">
        <div class="card-header flex-row">
            <div class="row">
                <a href="{{ route('credits-account') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-credits-account',$acct_credits_account_edit->credits_account_id) }}" method="POST">
                @csrf
                @include('creditsAccount._form')
                <button type="submit" value="" name="editDataCreditsAccount" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
<script>
    $(document).ready(function() {
        $('#branch_id').select2();
        $('#business_officer_id').select2();
        $('#source_fund_id').select2();
        $('#province_id').select2();
        $('#city_id').select2();
        $('#kelurahan_id').select2();
        $('#credits_id').select2();
        $('#kecamatan_id').select2();
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