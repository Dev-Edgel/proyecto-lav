<?php

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'usuario' => 'admin',
            'nombre' => 'Administrador',
            'email' => 'admin@usuario.com',
            'password' => 'pass123'
        ]);

        $usuario->roles()->sync(1);

    }
}
