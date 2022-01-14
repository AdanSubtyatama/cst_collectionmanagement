<x-app title='Edit Data User Group {{ $system_user_group_edit->user_group_name }}'>
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
                <div class="col-lg-12">
                    <a href="{{ route('user-group') }}" type="button" class="btn btn-danger btn-sm mr-auto">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-user-group',$system_user_group_edit->user_group_id) }}" method="POST">
                @csrf
                @include('systemUserGroup._form')
                <button type="submit" value="" name="editDataUserGroup" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
