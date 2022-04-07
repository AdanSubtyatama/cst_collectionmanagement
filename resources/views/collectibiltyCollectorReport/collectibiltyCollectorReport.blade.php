<x-app title='Pelaporan Collector'>
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
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCollectibilityCollectorReport">
                Tambah Data
            </button>    
        </div>
        <div class="card-body overflow-auto">
            <div class="row">
                <div class="col-6"><h5 class="card-title">Data Pelaporan Collector</h5></div>
                <div class="col-6 "><a href="{{ url('late-report') }}" class="btn btn-info float-right">Cetak Surat Peringatan</a></div>
            </div>
            <form class="my-5" action="{{ route('filter-collector-report') }}" method="POST">
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
                        <label for="business_collector">Business Collector </label>
                        <select class="custom-select @error('business_collector')
                        is-invalid
                    @enderror" id="business_collector"
                            name="business_collector">
                            <?php if($business_collector_id == ''){?>
                                <option value="" selected>Pilih Business Collector</option>    
                            <?php }?>
                            @foreach ($core_business_collector as $business_collector)
                                <option value="{{ $business_collector->business_collector_id }}" {{ ($business_collector->business_collector_id == $business_collector_id) ? 'selected' : '' }}>{{ $business_collector->business_collector_name }}</option>
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
                        <a type="button" href="{{ url('/collector-report') }}" class="btn btn-secondary mr-2">Batal</a> 
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
                        <th>Tanggal Penyampaian Surat</th>
                        <th>Tanggal Pelaporan Collector</th>
                        <th>Business Collector</th>
                        <th>Kolektibilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($core_business_collector_report as $index => $business_collector_report)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $business_collector_report->creditsAccountCollector['creditsAccount']['credits_account_name'] }}</td>
                            <td>{{ $business_collector_report->creditsAccountCollector['creditsAccount']['credits_account_address'] }}</td>
                            <td>{{ $business_collector_report->business_collector_report_meeting_date }}</td>
                            <td>{{ $business_collector_report->created_at }}</td>
                            <td>{{ $business_collector_report->creditsAccountCollector['businessCollector']['business_collector_name'] }}</td>
                            <td>{{ $business_collector_report->business_collector_credit_account_status == '1' ? 'Selesai' : '-' }}</td>
                            <td style="min-width: 150px">                                
                                <div class="row pl-2 pb-1">
                                    <div class="col-3 m-0 pl-2">
                                        <a href="{{ route('edit-collector-report', $business_collector_report->business_collector_report_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </div>    
                                    <div class="col-3 m-0 p-0">    
                                        <form action="{{ route('process-delete-collector-report', $business_collector_report->business_collector_report_id) }}" method="POST">
                                            @csrf
                                            <button onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div> 
                                @if($business_collector_report->business_collector_credit_account_status != 1)
                                <form class="form-inline" action="{{ route('process-mark-done-collector-report', $business_collector_report->business_collector_report_id) }}" method="POST">
                                    @csrf
                                    <button onclick="return confirm('Anda yakin menandai peminjam ini selesai ?')" type="submit" class="btn btn-sm btn-success editCollectorReport mb-2" id="editCollectorReport"><i class="fas fa-check-circle"></i> Tandai Selesai </button> 
                                </form>     
                                @endif
                                <button type="button" class="btn btn-sm btn-success detailCollectorReport mb-2" id="detailCollectorReport" data-backdrop='static' data-keyboard='false'
                                data-branch_name="{{ $business_collector_report->branch['branch_name'] }}" data-credits_account_name="{{ $business_collector_report->creditsAccountCollector['creditsAccount']['credits_account_name'] }}" data-credits_account_address="{{ $business_collector_report->creditsAccountCollector['creditsAccount']['credits_account_address'] }}" data-business_collector_name="{{ $business_collector_report->creditsAccountCollector['businessCollector']['business_collector_name'] }}" data-credits_account_collector_letter_informing="{{ $business_collector_report->creditsAccountCollector->credits_account_collector_letter_informing  }}" data-business_collector_report_date="{{ $business_collector_report->business_collector_report_date }}" data-business_collector_report_meeting_date="{{ $business_collector_report->business_collector_report_meeting_date }}" data-business_collector_report_description="{{ $business_collector_report->business_collector_report_description }}" data-business_collector_report_picture="{{ $business_collector_report->business_collector_report_picture }}" data-business_collector_report_others_contact="{{ $business_collector_report->business_collector_report_others_contact }}" data-business_collector_report_meeting_with="{{ $business_collector_report->business_collector_report_meeting_with }}"
                                 ><i class="fas fa-info-circle"></i> Detail </button>                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="ShowDetailCollectorReport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('process-add-collector-report') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content" style="z-index:-9">
                    <div class="modal-header">
                        <div class="row">
                        <h5 class="modal-title" id="ShowDetailCollectorReportLabel">Detail Pelaporan Collector</h5>                
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img id="business_collector_report_picture_label" src="{{ asset('img/keadaantempat/none.png') }}" style="width: 100%;" alt="">
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">Nama Cabang</div>
                            <div class="col-8"> : <span id="branch_name_label">Nama Cabang</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Nama Peminjam</div>
                            <div class="col-8"> : <span id="credits_account_name_label">Nama Peminjam</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Alamat Peminjam</div>
                            <div class="col-8"> : <span id="credits_account_address_label">Alamat Peminjam</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Nama Collector</div>
                            <div class="col-8"> : <span id="business_collector_name_label">Nama Collector</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kode Surat Tugas Collector</div>
                            <div class="col-8"> : <span id="credits_account_collector_letter_informing_label">Kode Surat Tugas Collector</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tanggal Laporan Dibuat</div>
                            <div class="col-8"> : <span id="business_collector_report_date_label">Tanggal Laporan Dibuat</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tanggal Pertemuan Dengan Peminjam</div>
                            <div class="col-8"> : <span id="business_collector_report_meeting_date_label">Tanggal Pertemuan Dengan Peminjam</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Deskripsi</div>
                            <div class="col-8"> : <span id="business_collector_report_description_label">Deskripsi</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kontak Lain Yang bisa dihubungi</div>
                            <div class="col-8"> : <span id="business_collector_report_others_contact_label">Kontak Lain Yang bisa dihubungi</span></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Bertemu Dengan</div>
                            <div class="col-8"> : <span id="business_collector_report_meeting_with_label">Bertemu Dengan</span></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
    
        </div>
    </div>
    {{-- modal tambah --}}
</x-app>
<div class="modal fade" id="addCollectibilityCollectorReport" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('process-add-collector-report') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                    <h5 class="modal-title" id="addCollectibilityCollectorReportLabel" >Tambah Laporan Business Collector</h5>                
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('collectibiltyCollectorReport._form')
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addCollectibilityCollectorReportSubmit" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>


</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#credits_id').select2();
        $('#branch_id').select2();
        $('#business_collector').select2();
        $('#business_officer_id').select2();
        $('#collectibility').select2();

        $('body').on('click','#detailCollectorReport', function(){
   
            let branch_name                                     = $(this).attr('data-branch_name');
            let credits_account_name                            = $(this).attr('data-credits_account_name');
            let credits_account_address                         = $(this).attr('data-credits_account_address');
            let business_collector_name                         = $(this).attr('data-business_collector_name');
            let credits_account_collector_letter_informing      = $(this).attr('data-credits_account_collector_letter_informing');
            let business_collector_report_date                  = $(this).attr('data-business_collector_report_date');
            let business_collector_report_meeting_date          = $(this).attr('data-business_collector_report_meeting_date');
            let business_collector_report_description           = $(this).attr('data-business_collector_report_description');
            let business_collector_report_picture               = $(this).attr('data-business_collector_report_picture');
            let business_collector_report_others_contact        = $(this).attr('data-business_collector_report_others_contact');
            let business_collector_report_meeting_with          = $(this).attr('data-business_collector_report_meeting_with');
            $('#branch_name_label').html(branch_name);
            $('#credits_account_name_label').html(credits_account_name);
            $('#credits_account_address_label').html(credits_account_address);
            $('#business_collector_name_label').html(business_collector_name);
            $('#credits_account_collector_letter_informing_label').html(credits_account_collector_letter_informing);
            $('#business_collector_report_date_label').html(business_collector_report_date);
            $('#business_collector_report_meeting_date_label').html(business_collector_report_meeting_date);
            $('#business_collector_report_description_label').html(business_collector_report_description);
            $('#business_collector_report_others_contact_label').html(business_collector_report_others_contact);
            $('#business_collector_report_meeting_with_label').html(business_collector_report_meeting_with);
            $('#business_collector_report_picture_label').attr('src','img/keadaantempat/'+business_collector_report_picture+'');
           
            $('#ShowDetailCollectorReport').appendTo("body").modal('show');
        });
    });

   
</script>
