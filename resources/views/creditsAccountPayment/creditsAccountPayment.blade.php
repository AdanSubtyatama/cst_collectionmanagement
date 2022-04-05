<x-app title='Pembayaran Angsuran'>
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
        <div class="card-header">
            <a href="{{ route('add-credits-account-payment') }}" type="button" class="btn btn-primary btn-sm">
                Tambah Data
            </a>    
        </div>
        <div class="card-body overflow-auto">
            <div class="row">
                <div class="col-6"><h5 class="card-title">Data Pembayaran Angsuran</h5></div>
                <div class="col-6 "><a href="{{ url('late-report') }}" class="btn btn-info float-right">Cetak Surat Peringatan</a></div>
            </div>
            <form class="my-5" action="{{ route('filter-credits-account-payment') }}" method="POST">
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
                        <a type="button" href="{{ url('/credits-account-payment') }}" class="btn btn-secondary mr-2">Batal</a> 
                        <button type="submit" value="" name="cari" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Alamat Peminjam</th>
                        <th>Jumlah Angsuran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_credits_account_payment as $index => $credits_account_payment)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $credits_account_payment->creditsAccount['credits_account_name'] }}</td>
                            <td>{{ $credits_account_payment->creditsAccount['credits_account_address'] }}</td>
                            <td>Rp. {{ number_format($credits_account_payment->credits_payment_amount, 22) }}</td>
                            <td>{{ $credits_account_payment->credits_payment_date }}</td>
                            <td style="min-width: 150px">                                
                                <div class="row pl-2 pb-1">
                                    <div class="col-3 m-0 pl-2">
                                        <a href="{{ route('edit-credits-account-payment', $credits_account_payment->credits_payment_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </div>    
                                    <div class="col-3 m-0 p-0">    
                                        <form action="{{ route('process-delete-credits-account-payment', $credits_account_payment->credits_payment_id) }}" method="POST">
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



</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#credits_id').select2();
        $('#branch_id').select2();
        $('#business_collector').select2();
        $('#business_officer_id').select2();
        $('#collectibility').select2();

        
    });

   
</script>
