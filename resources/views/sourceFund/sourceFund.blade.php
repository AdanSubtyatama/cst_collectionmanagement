<x-app title='Source Fund Page'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataSourceFund">
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
                        <th>Kode Sumber Dana</th>
                        <th>Nama Sumber Dana</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_source_fund as $index => $source_fund)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $source_fund->source_fund_code }}</td>
                            <td>{{ $source_fund->source_fund_name }}</td>
                            <td style="min-width: 60px;max-width: 60px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('edit-source-fund', $source_fund->source_fund_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                            <form action="{{ route('process-delete-source-fund', $source_fund->source_fund_id) }}" method="POST">
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

<div class="modal fade" id="addDataSourceFund" tabindex="-1" aria-labelledby="addDataSourceFundLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('process-add-source-fund') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataSourceFundLabel">Add Data Kredit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('sourceFund._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataSourceFund" class="btn btn-primary">Save changes</button>
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