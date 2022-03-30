<x-app title='Laporan Keterlambatan'>
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
        
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data Pinjaman Yang Terlambat</h5>
            <form class="my-5" action="{{ route('filter-late-report') }}" method="POST">
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
                <div class="form-row ">
                    <div class="col-md-3 mb-3">
                        <label for="collectibility">Kolektibilitas </label>
                        <select class="custom-select @error('collectibility')
                        is-invalid
                    @enderror" id="collectibility"
                            name="collectibility">
                            <?php if($collectibility_id == ''){?>
                                <option value="" selected>Pilih Status Kollektibilitas</option>    
                            <?php }?>
                            @foreach ($preference_collectibility as $collectibility)
                                <option value="{{ $collectibility->collectibility_id }}" {{ ($collectibility->collectibility_id == $collectibility_id) ? 'selected' : '' }}>{{ $collectibility->collectibility_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="business_collector_id">Business Collector </label>
                        <select class="custom-select @error('business_collector_id')
                        is-invalid
                    @enderror" id="business_collector_id"
                            name="business_collector_id">
                            <?php if($business_collector_id == ''){?>
                                <option value="" selected>Pilih Business Collector</option>    
                            <?php }?>
                            @foreach ($core_business_collector as $business_collector)
                                <option value="{{ $business_collector->business_collector_id }} {{ ($business_collector->business_collector_id == $business_collector_id) ? 'selected' : '' }}">{{ $business_collector->business_collector_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="business_officer_id">Business Officer </label>
                        <select class="custom-select @error('business_officer_id')
                        is-invalid
                    @enderror" id="business_officer_id"
                            name="business_officer_id">
                            <?php if($business_officer_id == ''){?>
                                <option value="" selected>Pilih Business Officer</option>    
                            <?php }?>
                            @foreach ($core_business_officer as $business_officer)
                                <option value="{{ $business_officer->business_officer_id }} {{ ($business_officer->business_officer_id == $business_officer_id) ? 'selected' : '' }}">{{ $business_officer->business_officer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 text-right">
                        <a type="button" href="{{ url('/late-report') }}" class="btn btn-secondary mr-2">Batal</a> 
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
                        <th>Jenis Pinjaman</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Jatuh Tempo Terakhir</th>
                        <th>Jatuh Tempo</th>
                        <th>Kolektibilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_credits_account as $index => $credits_account)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $credits_account->credits_account_name }}</td>
                            <td>{{ $credits_account->credits_account_address }}</td>
                            <td>{{ $credits_account->credits['credits_name']  }}</td>
                            <td>{{ $credits_account->credits_account_date }}</td>
                            <td>{{ $credits_account->credits_account_due_date }}</td>
                            <td>{{ $credits_account->credits_account_payment_date }}</td>
                            <td>
                                <span class="btn 
                                @if($credits_account->collectibility_name == 'LANCAR')
                                btn-success
                                @elseif ($credits_account->collectibility_name == 'KURANG LANCAR')
                                btn-warning 
                                @else
                                btn-danger
                                @endif
                                ">
                                
                                {{ $credits_account->collectibility_name }}</span></td>
                            <td style="min-width: 100px" >                                
                                <a href="{{ url('/late-report/print-st', $credits_account->credits_account_id) }}"
                                    class="btn btn-sm btn-primary mb-1"><i class="fas fa-print"></i> ST</a>  
                                <a href="{{ url('/late-report/print-sp1', $credits_account->credits_account_id) }}"
                                    class="btn btn-sm btn-primary mb-1"><i class="fas fa-print"></i> SP 1</a>  
                                <a href="{{ url('/late-report/print-sp2', $credits_account->credits_account_id) }}"
                                    class="btn btn-sm btn-primary mb-1"><i class="fas fa-print"></i> SP 2</a>  
                                <a href="{{ url('/late-report/print-sp3', $credits_account->credits_account_id) }}"
                                    class="btn btn-sm btn-primary mb-1"><i class="fas fa-print"></i> SP 3</a>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah --}}
</x-app>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#credits_id').select2();
        $('#branch_id').select2();
        $('#business_collector_id').select2();
        $('#business_officer_id').select2();
        $('#collectibility').select2();
    });
</script>
