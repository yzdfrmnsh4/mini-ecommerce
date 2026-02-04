<x-admin.template-admin>

    <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('user_management_view') }}" action="{{ route('user_management_add_update_post') }}"
            method="post" judul="Tambah User">
            <div class="flex gap-2">
                <x-input.form-input name="name" type="text" label="Nama user"></x-input.form-input>
                <x-input.form-input name="email" type="email" label="Email user"></x-input.form-input>

            </div>
            <x-input.form-input name="no_telp" type="number" label="Nomor Telp User"></x-input.form-input>
            <x-input.form-input name="role" type="select" label="Role User">
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
