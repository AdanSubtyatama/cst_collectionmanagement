<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="username">Username</label>
        <input placeholder="Masukan Username..."
            value="{{ old('username') ?? $system_user_edit->username }}" type="text"
            name="username"
            class="form-control @error('username')
        is-invalid
    @enderror"
            id="username" required>
        <div class="invalid-feedback">
            @error('username')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="user_name">Nama User</label>
        <input placeholder="Masukan Nama User..." value="{{ old('user_name') ?? $system_user_edit->user_name }}"
            type="text" name="user_name"
            class="form-control @error('user_name')
        is-invalid
    @enderror" id="user_name" value=""
            required>
        <div class="invalid-feedback">
            @error('user_name')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="password">Password</label>
        <input placeholder="Masukan Password..." {{ $system_user_edit->password != null ? 'disable readonly' : ' ' }}
            value="{{ $system_user_edit->password }}" type="password"
            name="password"
            class="form-control @error('password')
             is-invalid
            @enderror"
            id="password" required>
        <div class="invalid-feedback">
            @error('password')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="user_group_id">User Group </label>
        <select
            class="custom-select @error('user_group_id')
        is-invalid
    @enderror"
            id="user_group_id" name="user_group_id" required>
            <option selected value="{{ $system_user_edit->user_group ? $system_user_edit->user_group->user_group_id : '' }}">{{ $system_user_edit->user_group ? $system_user_edit->user_group->user_group_name : 'Pilih User Group' }}</option>
            @foreach ($system_user_group as $user_group )
                <option value="{{ $user_group->user_group_id }}">{{ $user_group->user_group_name }}</option>                
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('user_group_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="branch_id">Masukan Avatar</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="avatar" id="avatar">
            <label class="custom-file-label" for="avatar">Pilih file Avatar</label>
          </div>
        <div class="invalid-feedback">
            @error('avatar')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="branch_id">Pilih Cabang </label>
        <select
            class="custom-select @error('branch_id')
        is-invalid
    @enderror"
            id="branch_id" name="branch_id" required>
            <option selected value="{{ $system_user_edit->branch ? $system_user_edit->branch->branch_id : '' }}">{{ $system_user_edit->branch ? $system_user_edit->branch->branch_name : 'Pilih Cabang' }}</option>
            @foreach ($core_branch as $branch )
                <option value="{{ $branch->branch_id }}">{{ $branch->branch_name }}</option>                
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('user_group_id')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
<script>
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("avatar").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>