<x-app title='Halaman User'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataSystemUser">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data User</h5>

            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama User</th>
                        <th>Branch Name</th>                        
                        <th>User Group</th>                        
                        <th>Status Log</th>                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($system_user as $index => $user)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->branch->branch_name }}</td>
                            <td>{{ $user->user_group->user_group_name }}</td>
                            <td>{!! $user->log_stat = 'off' ? '<span class="badge badge-info">Off</span>' : '<span class="badge badge-secondary">On</span>'!!}</td>
                            <td style="min-width: 80px">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('edit-user', $user->user_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="{{ route('process-delete-user', $user->user_id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="addDataSystemUser" tabindex="-1" aria-labelledby="addDataSystemUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('process-add-user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataSystemUserLabel">Add Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('systemUser._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataSystemUser" class="btn btn-primary">Save changes</button>
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
