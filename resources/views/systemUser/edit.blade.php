<x-app title='Edit Data User {{ $system_user_edit->user_name }}'>
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
                    <a href="{{ route('user') }}" type="button" class="btn btn-danger btn-sm mr-auto">
                        Kembali
                    </a>
                    <a href="{{ route('process-reset-paswword-user',$system_user_edit->user_id) }}" type="button" class="ml-2 btn btn-warning btn-sm">
                        Reset Password
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <form action="{{ route('process-edit-user',$system_user_edit->user_id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @include('systemUser._form')
                <button type="submit" value="" name="editDataUser" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>
