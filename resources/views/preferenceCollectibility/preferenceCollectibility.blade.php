<x-app title='Konfigurasi Kolektibilitas'>
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
        {{-- <div class="card-header flex-row">
            <div class="row">
                {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDataCredits">
                    Tambah Data
                </button> --}}
            {{-- </div>
        </div> --}} 
        <div class="card-body overflow-auto">
            <h5 class="card-title">Konfigurasi Kolektibilitas</h5>
            <form class="form-inline" action="{{ route('update-konfigurasi-kolektibilitas') }}" method="POST">
                @csrf
                @foreach ($preference_collectibility as $index => $collectibility)
                    <div class="col-md-2">
                         {{  $index+1 }}.&nbsp;{{ $collectibility->collectibility_name }}  
                         <input value="{{ $collectibility->collectibility_id }}" type="hidden"
                            name="collectibility_id[]"
                            class="w-100 form-control"                             id="collectibility_id" required> 
                    </div>           
                    <div class="col-md-2">
                        <div class="form-group row">
                            <input placeholder="Batas Bawah" value="{{ old('collectibility_bottom') ?? $collectibility->collectibility_bottom }}" type="text"
                                name="collectibility_bottom[]"
                            class="w-100 form-control
                            @error('collectibility_bottom')
                            is-invalid
                        @enderror"
                                id="collectibility_bottom" required>
                            <div class="invalid-feedback">
                                @error('collectibility_bottom')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        S.D
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group row">
                            <input placeholder="Batas Atas" value="{{ old('collectibility_top') ?? $collectibility->collectibility_top }}" type="text"
                                name="collectibility_top[]"
                            class="w-100 form-control
                            @error('collectibility_top')
                            is-invalid
                        @enderror"
                                id="collectibility_top" required>
                            <div class="invalid-feedback">
                                @error('collectibility_top')
                                    {{ $message }}
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        PPAP (%)
                    </div>  
                    <div class="col-md-2">
                        <div class="form-row">
                            <input placeholder="Persen" value="{{ old('collectibility_ppap') ?? $collectibility->collectibility_ppap }}" type="text"
                                name="collectibility_ppap[]"
                            class="form-control
                            @error('collectibility_ppap')
                            is-invalid
                        @enderror"
                                id="collectibility_ppap" required>
                            <div class="invalid-feedback">
                                @error('collectibility_ppap')
                                    {{ $message }}
                                @enderror
                            
                            </div>
                        </div>
                    </div>
                @endforeach
                <button type="submit" name="addCreditsAccount" class="mt-5 btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</x-app>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
        });
    });
</script>