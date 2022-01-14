<x-app title='Halaman User Group'>
    <div class="flex flex-row">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
        @endif
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
            {{ $error }}
            <button type="button" class="close p1" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
        @endforeach
    </div>
    <div class="card bg-light mb-3">
        <div class="card-header flex-row">
            <div class="row">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataSystemUserGroup">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data User Group</h5>

            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Level User Group</th>
                        <th>Nama User Group</th>                       
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($system_user_group as $index => $user_group)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $user_group->user_group_level }}</td>
                            <td>{{ $user_group->user_group_name }}</td>
                            <td style="min-width: 80px">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('edit-user-group', $user_group->user_group_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="{{ route('process-delete-user-group', $user_group->user_group_id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah --}}
</x-app>

<div class="modal fade" id="addDataSystemUserGroup" tabindex="-1" aria-labelledby="addDataSystemUserGroupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('process-add-user-group') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataSystemUserGroupLabel">Add Data User Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('systemUserGroup._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataSystemUserGroup" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
        });
    });
</script>
