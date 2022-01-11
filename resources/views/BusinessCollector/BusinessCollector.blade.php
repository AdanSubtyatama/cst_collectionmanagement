<x-app title='Halaman Collector'>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataBusinessCollector">
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
                        <th>Kode Collector</th>
                        <th>Nama Collector</th>                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($businessCollectors as $index => $businessCollectoritem)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $businessCollectoritem->business_collector_code }}</td>
                            <td>{{ $businessCollectoritem->business_collector_name }}</td>
                            <td style="min-width: 80px">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('corebusinessCollector.edit', $businessCollectoritem->business_collector_id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="{{ route('corebusinessCollector.delete', $businessCollectoritem->business_collector_id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="addDataBusinessCollector" tabindex="-1" aria-labelledby="addDataBusinessCollectorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('corebusinessCollector.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataBusinessCollectorLabel">Add Data Business Collector</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('BusinessCollector._form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="" name="addDataBusinessCollector" class="btn btn-primary">Save changes</button>
                </div>
        </form>

    </div>
</div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js" defer></script>
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
