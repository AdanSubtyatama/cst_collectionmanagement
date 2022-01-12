<x-app title='Edit Data Officer {{ $core_business_officer_edit->business_officer_name }}'>
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
                <a href="{{ route('business-officer') }}" type="button" class="btn btn-danger btn-sm">
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-business-officer',$core_business_officer_edit->business_officer_id) }}" method="POST">
                @csrf
                @include('BusinessOfficer._form')
                <button type="submit" value="" name="editDataOfficer" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
