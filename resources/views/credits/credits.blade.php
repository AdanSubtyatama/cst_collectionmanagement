<x-app title='Credits Page'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataCredits">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data Cabang</h5>

            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kredit</th>
                        <th>Nama Kredit</th>
                        <th>Nomor Kredit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_credits as $index => $credits)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $credits->credits_code }}</td>
                            <td>{{ $credits->credits_name }}</td>
                            <td>{{ $credits->credits_number }}</td>
                            <td style="min-width: 60px;max-width: 60px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('edit-credits', $credits->credits_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                            <form action="{{ route('process-delete-credits', $credits->credits_id) }}" method="POST">
                                                @csrf
                                                <button onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                            </form>
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

<div class="modal fade" id="addDataCredits" tabindex="-1" aria-labelledby="addDataBranchLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('process-add-credits') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataCreditsLabel">Add Data Kredit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('credits._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataCredits" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
        });
    });
</script>