<x-app title='Credits Account Page'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCreditsAccount">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data Akun Kredit</h5>

            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Alamat Akun</th>
                        <th>Jenis Pinjaman</th>
                        <th>Jenis Sumber Dana</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Status Pinjaman</th>
                        <th>Periode Pinjaman</th>
                        <th>Jatuh Tempo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_credits_account as $index => $credits_account)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $credits_account->credits_account_no }}</td>
                            <td>{{ $credits_account->credits_account_name }}</td>
                            <td>{{ $credits_account->credits_account_address }}</td>
                            <td>{{ $credits_account->credits['credits_name']  }}</td>
                            <td>{{ $credits_account->source_fund['source_fund_name'] }}</td>
                            <td>{{ $credits_account->credits_account_date }}</td>
                            <td>{{ $credits_account->credits_account_collection_status }}</td>
                            <td>{{ $credits_account->credits_account_period }}</td>
                            <td>{{ $credits_account->credits_account_due_date }}</td>
                            <td style="min-width: 80px">
                                <div class="row">
                                    <div class="col-6 m-0 pl-2">
                                        <a href="{{ route('edit-credits-account', $credits_account->credits_account_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </div>    
                                    <div class="col-6 m-0 p-0">    
                                        <form action="{{ route('process-delete-credits-account', $credits_account->credits_account_id) }}" method="POST">
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

<div class="modal fade" id="addCreditsAccount" tabindex="-1" aria-labelledby="addCreditsAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('process-add-credits-account') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCreditsAccountLabel">Add Data Akun Kredit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('creditsAccount._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addCreditsAccount" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
