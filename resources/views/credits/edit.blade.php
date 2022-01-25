<x-app title='Edit Data Kredit {{ $acct_credits_edit->credits_name }}'>
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
                <a href="{{ route('credits') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-credits',$acct_credits_edit->credits_id) }}" method="POST">
                @csrf
                @include('credits._form')
                <button type="submit" value="" name="editDataCredits" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
