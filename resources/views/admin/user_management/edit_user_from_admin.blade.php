<x-admin.template-admin>

    <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('admin.kategori.view') }}"
            action="{{ route('user_management_add_update_post', $user->id) }}" method="post" judul="Tambah kategori">
            <div class="flex gap-2">
                <x-input.form-input value="{{ $user->name }}" name="name" type="text"
                    label="Nama user"></x-input.form-input>
                <x-input.form-input value="{{ $user->email }}" name="email" type="email"
                    label="Email user"></x-input.form-input>

            </div>
            <x-input.form-input value="{{ $user->no_telp }}" name="no_telp" type="number"
                label="Nomor Telp User"></x-input.form-input>
            <x-input.form-input value="{{ $user->role }}" name="role" type="select" label="Role User">
                <option selected>pilih user</option>
                <option value="admin">admin</option>
                <option value="pembeli">pembeli</option>
                <option value="kasir">kasir</option>
            </x-input.form-input>
            <x-input.form-input name="password" type="password" label="Password User"></x-input.form-input>
            <x-input.form-input name="password_confirmation" type="password" label="Password User"></x-input.form-input>



        </x-form>
    </div>
</x-admin.template-admin>
