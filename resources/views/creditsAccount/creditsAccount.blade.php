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
                <button type="button" class="btn btn-success btn-sm ml-2"  data-toggle="modal" data-target="#importExcel">
                    Insert Database
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data Akun Kredit</h5>
            <form class="my-5" action="{{ route('filter-credits-account') }}" method="POST">
                @method('post')
                @csrf
                <div class="form-row mt-5">
                    <div input-group class="col-md-3 mb-3 ">
                        <label for="first_date">Tanggal Awal</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input placeholder="Masukan Tanggal Awal..." value="{{ $first_date ?? '' }}" type="date"
                                name="first_date" aria-describedby="basic-addon1"
                                class="form-control @error('first_date')
                        is-invalid
                        @enderror"
                                id="first_date" value="" aria-label="first_date"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div input-group class="col-md-3 mb-3 ">
                        <label for="last_date">Tanggal Akhir</label>
                
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input placeholder="Masukan Tanggal Akhir..." value="{{ $last_date ?? '' }}" type="date"
                                name="last_date" aria-describedby="basic-addon1"
                                class="form-control @error('last_date')
                        is-invalid
                        @enderror"
                                id="last_date" value="" aria-label="last_date"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="credits_id">Jenis Pinjaman </label>
                        <select class="custom-select @error('credits_id')
                        is-invalid
                    @enderror" id="credits_id"
                            name="credits_id">
                            <?php if($credits_id == ''){?>
                                <option value="" selected>Pilih Jenis Pinjaman</option>    
                            <?php }?>
                            @foreach ($acct_credits as $credits)
                                <option value="{{ $credits->credits_id }}" {{ ($credits->credits_id == $credits_id) ? 'selected' : '' }}>{{ $credits->credits_name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="branch_id">Cabang </label>
                        <select class="custom-select @error('branch_id')
                        is-invalid
                    @enderror" id="branch_id"
                            name="branch_id">
                            <?php if($branch_id == ''){?>
                                <option value="" selected>Pilih Cabang</option>    
                            <?php }?>
                            @foreach ($core_branch as $branch)
                                <option value="{{ $branch->branch_id }} {{ ($branch->branch_id == $branch_id) ? 'selected' : '' }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-right">
                        <a type="button" href="{{ url('/credits-account') }}" class="btn btn-secondary mr-2">Batal</a> 
                        <button type="submit" value="" name="cari" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
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

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('process-import-excel') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#credits_id').select2();
        $('#branch_id').select2();
    });
</script>
