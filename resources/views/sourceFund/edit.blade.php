<x-app title='Edit Data Sumber Dana {{ $acct_source_fund_edit->source_fund_name }}'>
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
                <a href="{{ route('source-fund') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-source-fund',$acct_source_fund_edit->source_fund_id) }}" method="POST">
                @csrf
                @include('sourceFund._form')
                <button type="submit" value="" name="editDataSourceFund" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
