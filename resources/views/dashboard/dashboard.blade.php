<x-app title="Dashboard">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close p1" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           </div>
        @endif
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque in dicta architecto labore magni illo aliquam sequi, esse ut quis reprehenderit soluta atque error quidem sapiente deleniti eos, laboriosam dolore!
</x-app>