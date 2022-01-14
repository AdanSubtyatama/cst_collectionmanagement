
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="user_group_level">User Group Level</label>
        <input placeholder="Masukan User Group Level..."
            value="{{ old('user_group_level') ?? $system_user_group_edit->user_group_level }}" type="text"
            name="user_group_level"
            class="form-control @error('user_group_level')
        is-invalid
    @enderror"
            id="user_group_level" required>
        <div class="invalid-feedback">
            @error('user_group_level')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="user_group_name">Nama User Group Name</label>
        <input placeholder="Masukan Nama User Group Name..." value="{{ old('user_group_name') ?? $system_user_group_edit->user_group_name }}"
            type="text" name="user_group_name"
            class="form-control @error('user_group_name')
        is-invalid
    @enderror" id="user_group_name" value=""
            required>
        <div class="invalid-feedback">
            @error('user_group_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
@foreach ( $system_menu as $menu)

<div class="form-row my-0">
    <div class="col-md-6 " style="margin-left:{{ strlen($menu->id_menu)*2 }}%">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox"
                @if($system_user_group_edit->user_group_id)
                    @foreach ($system_menu_checklist as $menu_checklist)
                        @if ($menu_checklist->id_menu == $menu->id_menu)
                        checked
                        @endif
                    @endforeach   
                @endif         
                name="id_menu[]" aria-label="{{ $menu->text }}" value="{{ $menu->id_menu }}">
            </div>
            </div>
            <input type="text" class="form-control" readonly disabled aria-label="{{ $menu->text }}" value="{{ $menu->text }}">
        </div>
    </div>
</div>
    
@endforeach
<script>
    //validasi menu group
</script>