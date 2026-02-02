<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class addAcount
{
    /**
     * Create a new class instance.
     */

    public function __construct(
        public string $name,
        public string $email,
        public ?string $password,
        public string $no_telp,
        public string $role,
        public ?int $id = null,
    ) {
    }



    public static function request($request)
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
            $request->no_telp,
            $request->role,
            $request->id,
        );
    }

    public function delete($id)
    {
        User::delete($id);
    }


    public function save()
    {
        try {
            if ($this->password !== null) {
                return User::updateOrCreate([
                    "id" => $this->id,

                ], [
                    "name" => $this->name,
                    "email" => $this->email,
                    "password" => $this->password,
                    "no_telp" => $this->no_telp,
                    "role" => $this->role,
                ]);
            } else {
                return User::updateOrCreate([
                    "id" => $this->id,

                ], [
                    "name" => $this->name,
                    "email" => $this->email,
                    "no_telp" => $this->no_telp,
                    "role" => $this->role,
                ]);
            }
        } catch (\Throwable $th) {
            Log::info("error class user add");
            Log::info($th->getMessage());
        }
    }

}
