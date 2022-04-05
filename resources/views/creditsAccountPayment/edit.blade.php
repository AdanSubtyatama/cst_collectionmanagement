<x-app title='Edit Pelaporan Collector {{ $business_collector_report_edit->creditsAccountCollector->credits_account_collector_letter_informing }}'>
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
                <a href="{{ route('collector-report') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-collector-report',$business_collector_report_edit->business_collector_report_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('collectibiltyCollectorReport._form')
                <input type="submit" value="Save changes" name="editCollectibilityCollectorReport" class="btn btn-primary" >
            </form>
        </div>
    </div>
</x-app>