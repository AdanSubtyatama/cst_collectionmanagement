<x-app title="Dashboard">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card bg-light mb-3">
        <div class="card-body">
                <div class="px-4 text-center">
                    {{-- <img class="d-block mx-auto mb-4" src="img/avatar/default.png" alt="" width="72" height="57"> --}}
                    <h1 class="d-block mx-auto mb-4 display-2"><i class="fa fa-users"></i></h1>
                    <h1 class="display-5 fw-bold text-primary">Selamat Datang di Collection Management !</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">Kami akan membantu anda untuk menyelesaikan pinjaman credit orang
                            orang.
                        </p>
                        {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
                  </div> --}}
                    </div>
            </div>
        </div>
    </div>
</x-app>
