<x-app title='Branch Page'>
    <div class="flex flex-row">
        @if (session()->has('success'))
            <div class="col-6 p-2 alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @foreach ($errors->all() as $error)
            <div class="col-6 p-2 alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
    <div class="card bg-light mb-3">
        <div class="card-header flex-row">
            <div class="row">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataBranch">
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
                        <th>ID Cabang</th>
                        <th>Kode Cabang</th>
                        <th>Nama Cabang</th>
                        <th>Alamat Cabang</th>
                        <th>Kota Cabang</th>
                        <th>CP Cabang</th>
                        <th>Email Cabang</th>
                        <th>No Telepon 1</th>
                        <th>No Telepon 2</th>
                        <th>Manajer Cabang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brancs as $index => $branch )
                    <tr>
                        <td>{{ $index }}</td>
                        <td>{{ $branch->branch_id }}</td>
                        <td>{{ $branch->branch_code }}</td>
                        <td>{{ $branch->branch_name }}</td>
                        <td>{{ $branch->branch_address }}</td>
                        <td>{{ $branch->branch_city }}</td>
                        <td>{{ $branch->branch_contact_person }}</td>
                        <td>{{ $branch->branch_email }}</td>
                        <td>{{ $branch->branch_phone1 }}</td>
                        <td>{{ $branch->branch_phone2 }}</td>
                        <td>{{ $branch->branch_manajer }}</td>
                        <td>
                            <a href="{{ route('corebranch.edit', $branch->branch_id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal tambah --}}
</x-app>

<div class="modal fade" id="addDataBranch" tabindex="-1" aria-labelledby="addDataBranchLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('corebranch.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataBranchLabel">Add Data Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="branch_code">Kode Cabang</label>
                            <input placeholder="Masukan Kode Cabang...." value="{{ old('branch_code') }}" type="text" name="branch_code"
                                class="form-control @error('branch_code')
                                @error('branch_code')
                                is-invalid
                            @enderror
                            @enderror"
                                id="branch_code" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_code')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="branch_name">Nama Cabang</label>
                            <input placeholder="Masukan Nama Cabang..." value="{{ old('branch_name') }}" type="text" name="branch_name"
                                class="form-control @error('branch_name')
                                is-invalid
                            @enderror"
                                id="branch_name" required>
                            <div class="invalid-feedback">
                                @error('branch_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="branch_address">Alamat Cabang</label>
                            <input placeholder="Masukan Alamat Cabang..." value="{{ old('branch_address') }}" type="text" name="branch_address"
                                class="form-control @error('branch_address')
                                is-invalid
                            @enderror"
                                id="branch_address" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="branch_city">Kota Cabang </label>
                            <select
                                class="custom-select @error('branch_city')
                                is-invalid
                            @enderror"
                                id="branch_city" name="branch_city" required>
                                <option selected disabled value="">Pilih Kota Cabang...</option>
                                <option value="lorem">Lorem</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('branch_city')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="branch_contactperson">CP Cabang</label>
                            <input placeholder="Masukan Contact Person dapat dihubungi..." value="{{ old('branch_contactperson') }}" type="text" name="branch_contactperson"
                                class="form-control @error('branch_contactperson')
                                is-invalid
                            @enderror"
                                id="branch_contactperson" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_contactperson')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="branch_phone1">Nomor Telepon 1</label>
                            <input placeholder="Masukan Nomor Telepon 1..." value="{{ old('branch_phone1') }}" type="text" name="branch_phone1"
                                class="form-control @error('branch_phone1')
                                is-invalid
                            @enderror"
                                id="branch_phone1" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_phone1')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="branch_phone2">Nomor Telepon 2</label>
                            <input placeholder="Masukan Nomor Telepon 2..." value="{{ old('branch_phone2') }}" type="text" name="branch_phone2"
                                class="form-control @error('branch_phone2')
                                is-invalid
                            @enderror"
                                id="branch_phone2" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_phone2')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="branch_email">Email Cabang</label>
                            <input placeholder="Masukan Email Cabang..." value="{{ old('branch_email') }}" type="text" name="branch_email"
                                class="form-control @error('branch_email')
                                is-invalid
                            @enderror"
                                id="branch_email" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">Manajer Cabang</label>
                            <input placeholder="Masukan Manajer Cabang" value="{{ old('branch_manager') }}" type="text" name="branch_manager"
                                class="form-control @error('branch_manager')
                                is-invalid
                            @enderror"
                                id="branch_manager" value="" required>
                            <div class="invalid-feedback">
                                @error('branch_manager')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataBranch" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
