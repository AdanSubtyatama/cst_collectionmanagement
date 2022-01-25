<x-app title='Agunan Page'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addData Agunan">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <h5 class="card-title">Data Agunan</h5>

            <table id="example" class="table table-striped table-bordered overflow-auto" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Type Agunan</th>
                        <th>Sertifikat</th>
                        <th>Luas</th>
                        <th>Atas Nama</th>
                        <th>Kedudukan</th>
                        <th>Taksiran</th>
                        <th>SHM Keterangan</th>
                        <th>No BPKB</th>
                        <th>Nama BPKB</th>
                        <th>No Polisi</th>
                        <th>No Mesin</th>
                        <th>No Rangka</th>
                        <th>BPKB Taksiran</th>
                        <th>BPKB Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acct_credits_agunan as $index => $credits_agunan)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $credits_agunan->credits_account['credits_account_name'] }}</td>
                            <td>{{ $credits_agunan->credits_agunan_type }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_no_sertifikat }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_luas }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_atas_nama }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_kedudukan }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_taksiran }}</td>
                            <td>{{ $credits_agunan->credits_agunan_shm_keterangan }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_nomor }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_nama }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_nopol }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_no_mesin }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_no_rangka }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_taksiran }}</td>
                            <td>{{ $credits_agunan->credits_agunan_bpkb_keterangan }}</td>
                            <td style="min-width: 60px;max-width: 120px">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- {{ route('edit-credits-agunan', $credits_agunan->credits_agunan_id) }} --}}
                                        <a href=""
                                            class="btn btn-sm btn-primary">Kembalikan</a>
                                    </div>
                                    {{-- <div class="col-md-6">
                                            <form action="{{ route('process-delete-credits_agunan', $credits_agunan->credits_agunan_id) }}" method="POST">
                                                @csrf
                                                <button onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                            </form>
                                    </div> --}}
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
<script>
    $(document).ready(function() {
        $('#example').DataTable({
        });
    });
</script>