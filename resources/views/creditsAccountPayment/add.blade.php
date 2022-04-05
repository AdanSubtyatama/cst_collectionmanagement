<x-app title='Tambah Pelaporan Angsuran'>
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
                <a href="{{ route('credits-account-payment') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-add-credits-account-payment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('creditsAccountPayment._form')
            </form>
        </div>
    </div>
    
</x-app>

<script>
     $(document).ready(function() {
        $('#example').DataTable();
        // $('#credits_id').select2();
        // $('#branch_id').select2();
        // $('#business_collector').select2();
        // $('#business_officer_id').select2();
        // $('#collectibility').select2();

        $('body').on('click','#selectCreditsAccount', function(){
            $('#selectCreditsAccountModal').appendTo("body").modal('show');
        });
    });

</script>