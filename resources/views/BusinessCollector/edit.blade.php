<x-app title='Edit Data Cabang {{ $businessCollector->business_collector_name }}'>
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
                <a href="{{ route('corebusinessCollector.index') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('corebusinessCollector.update',$businessCollector->business_collector_id) }}" method="POST">
                @csrf
                @include('BusinessCollector._form')
                <button type="submit" value="" name="editDataBranch" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
