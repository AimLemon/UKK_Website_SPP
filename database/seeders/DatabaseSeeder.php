<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed permission

        // siswa
        Permission::create([
            'name' => 'create-siswa',
        ]);

        Permission::create([
            'name' => 'read-siswa',
        ]);

        Permission::create([
            'name' => 'update-siswa',
        ]);

        Permission::create([
            'name' => 'delete-siswa',
        ]);

        // users
        Permission::create([
            'name' => 'create-users',
        ]);

        Permission::create([
            'name' => 'read-users',
        ]);

        Permission::create([
            'name' => 'update-users',
        ]);

        Permission::create([
            'name' => 'delete-users',
        ]);

        // spp
        Permission::create([
            'name' => 'create-spp',
        ]);

        Permission::create([
            'name' => 'read-spp',
        ]);

        Permission::create([
            'name' => 'update-spp',
        ]);

        Permission::create([
            'name' => 'delete-spp',
        ]);

        // kelas
        Permission::create([
            'name' => 'create-kelas',
        ]);

        Permission::create([
            'name' => 'read-kelas',
        ]);

        Permission::create([
            'name' => 'update-kelas',
        ]);

        Permission::create([
            'name' => 'delete-kelas',
        ]);

        // roles
        Permission::create([
            'name' => 'create-roles',
        ]);

        Permission::create([
            'name' => 'read-roles',
        ]);

        Permission::create([
            'name' => 'update-roles',
        ]);

        Permission::create([
            'name' => 'delete-roles',
        ]);

        // permissions
        Permission::create([
            'name' => 'create-permissions',
        ]);

        Permission::create([
            'name' => 'read-permissions',
        ]);

        Permission::create([
            'name' => 'update-permissions',
        ]);

        Permission::create([
            'name' => 'delete-permissions',
        ]);

        // pembayaran
        Permission::create([
            'name' => 'create-pembayaran',
        ]);

        Permission::create([
            'name' => 'read-pembayaran',
        ]);

        Permission::create([
            'name' => 'update-pembayaran',
        ]);

        Permission::create([
            'name' => 'delete-pembayaran',
        ]);

        // seed spp
        Spp::create([
            'tahun' => '2020',
            'nominal' => 5500000,
        ]);

        Spp::create([
            'tahun' => '2021',
            'nominal' => 6000000,
        ]);

        Spp::create([
            'tahun' => '2022',
            'nominal' => 7000000,
        ]);

        // seed role
        $role1 = Role::create([
            'name' => 'admin'
        ]);

        $role1->syncPermissions([
            'create-siswa', 'read-siswa', 'update-siswa', 'delete-siswa', 
            'create-kelas', 'read-kelas', 'update-kelas', 'delete-kelas',
            'create-spp', 'read-spp', 'update-spp', 'delete-spp',
            'create-users', 'read-users', 'update-users', 'delete-users',
            'create-roles', 'read-roles', 'update-roles', 'delete-roles',
            'create-pembayaran', 'read-pembayaran', 'update-pembayaran', 'delete-pembayaran',
            'create-permissions', 'read-permissions', 'update-permissions', 'delete-permissions',
        ]);

        $role2 = Role::create([
            'name' => 'petugas'
        ]);

        $role2->syncPermissions([
            'create-siswa', 'read-siswa', 'update-siswa', 'delete-siswa',
            'create-kelas', 'read-kelas', 'update-kelas', 'delete-kelas',
            'create-spp', 'read-spp', 'update-spp', 'delete-spp',
            'create-pembayaran', 'read-pembayaran', 'update-pembayaran', 'delete-pembayaran',
        ]);

        $role3 = Role::create([
            'name' => 'siswa'
        ]);

        // seed kelas
        $kelas1 = Kelas::create([
            'nama_kelas' => 'X-RPL 1',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        $kelas2 = Kelas::create([
            'nama_kelas' => 'X-RPL 2',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        $kelas3 = Kelas::create([
            'nama_kelas' => 'X-MM 1',
            'kompetensi_keahlian' => 'Multimedia',
        ]);

        $kelas4 = Kelas::create([
            'nama_kelas' => 'X-MM 2',
            'kompetensi_keahlian' => 'Multimedia',
        ]);

        $kelas5 = Kelas::create([
            'nama_kelas' => 'X-TKJ 1',
            'kompetensi_keahlian' => 'Tehnik Komputer dan Jaringan',
        ]);

        $kelas6 = Kelas::create([
            'nama_kelas' => 'X-TKJ 2',
            'kompetensi_keahlian' => 'Tehnik Komputer dan Jaringan',
        ]);

    	$user1 = User::create([
    		'username' => 'veli',
    		'email' => 'admin@example.com',
    		'password' => Hash::make('password'),
    	]);

        $user1->assignRole('admin');

        $petugas1 = Petugas::create([
            'user_id' => $user1->id,
            'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
            'nama_petugas' => 'Administrator',
            'jenis_kelamin' => 'Laki-laki',
        ]);

		$user2 = User::create([
    		'username' => 'ady123',
    		'email' => 'ady@example.com',
    		'password' => Hash::make('password'),
    	]);

        $user2->assignRole('petugas');

        $petugas2 = Petugas::create([
            'user_id' => $user2->id,
            'kode_petugas' => 'PTG'.Str::upper(Str::random(5)),
            'nama_petugas' => 'Ady',
            'jenis_kelamin' => 'Laki-Laki',
        ]);

    	$user3 = User::create([
    		'username' => 'zegion',
    		'email' => 'zegion@example.com',
    		'password' => Hash::make('password'),
    	]);

        $user3->assignRole('siswa');

        Siswa::create([
            'user_id' => $user3->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08902278',
            'nis' => '08902255',
            'nama_siswa' => 'Zegion',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tempest',
            'no_telepon' => '08599876098',
            'kelas_id' => $kelas1->id,
        ]);

    	$user4 = User::create([
    		'username' => 'naku123',
    		'email' => 'naku@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user4->assignRole('siswa');

        Siswa::create([
            'user_id' => $user4->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08909096',
            'nis' => '08909842',
            'nama_siswa' => 'Naku',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '08599865056',
            'kelas_id' => $kelas2->id,
        ]);

    	$user5 = User::create([
    		'username' => 'lumina123',
    		'email' => 'lumina@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user5->assignRole('siswa');

        Siswa::create([
            'user_id' => $user5->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08909296',
            'nis' => '08909242',
            'nama_siswa' => 'Lumina',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '08599125056',
            'kelas_id' => $kelas2->id,
        ]);

    	$user6 = User::create([
    		'username' => 'araina123',
    		'email' => 'araina@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user6->assignRole('siswa');

        Siswa::create([
            'user_id' => $user6->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08123096',
            'nis' => '08123842',
            'nama_siswa' => 'Araina',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '08549865056',
            'kelas_id' => $kelas3->id,
        ]);

    	$user7 = User::create([
    		'username' => 'greia123',
    		'email' => 'greia@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user7->assignRole('siswa');

        Siswa::create([
            'user_id' => $user7->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08039096',
            'nis' => '08902462',
            'nama_siswa' => 'Greia',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '08599865056',
            'kelas_id' => $kelas4->id,
        ]);

    	$user8 = User::create([
    		'username' => 'miraza123',
    		'email' => 'miraza@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user8->assignRole('siswa');

        Siswa::create([
            'user_id' => $user8->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08009096',
            'nis' => '089000942',
            'nama_siswa' => 'Miraza',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '08599328056',
            'kelas_id' => $kelas5->id,
        ]);

    	$user9 = User::create([
    		'username' => 'lumy123',
    		'email' => 'lumy@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user9->assignRole('siswa');

        Siswa::create([
            'user_id' => $user9->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08283096',
            'nis' => '08894442',
            'nama_siswa' => 'Lumy',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '08498650511',
            'kelas_id' => $kelas6->id,
        ]);

    	$user10 = User::create([
    		'username' => 'mizura123',
    		'email' => 'mizura@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user10->assignRole('siswa');

        Siswa::create([
            'user_id' => $user10->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08299996',
            'nis' => '088293942',
            'nama_siswa' => 'Mizura',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '084986222221',
            'kelas_id' => $kelas6->id,
        ]);

    	$user11 = User::create([
    		'username' => 'flair123',
    		'email' => 'flair@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user11->assignRole('siswa');

        Siswa::create([
            'user_id' => $user11->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '0829296',
            'nis' => '08324242',
            'nama_siswa' => 'Flair',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '0819230511',
            'kelas_id' => $kelas3->id,
        ]);

    	$user12 = User::create([
    		'username' => 'nano123',
    		'email' => 'nano@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user12->assignRole('siswa');

        Siswa::create([
            'user_id' => $user12->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08238996',
            'nis' => '08892442242',
            'nama_siswa' => 'Nano',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '082938940511',
            'kelas_id' => $kelas2->id,
        ]);

    	$user13 = User::create([
    		'username' => 'ilyana123',
    		'email' => 'ilyana@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user13->assignRole('siswa');

        Siswa::create([
            'user_id' => $user13->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08283332326',
            'nis' => '084298442',
            'nama_siswa' => 'Ilyana',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tokyo',
            'no_telepon' => '0843240984511',
            'kelas_id' => $kelas3->id,
        ]);

    	$user14 = User::create([
    		'username' => 'aoi123',
    		'email' => 'aoi@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user14->assignRole('siswa');

        Siswa::create([
            'user_id' => $user14->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '08283096232',
            'nis' => '08894442193',
            'nama_siswa' => 'Aoi',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '0843294800511',
            'kelas_id' => $kelas5->id,
        ]);

    	$user15 = User::create([
    		'username' => 'zero123',
    		'email' => 'zero@example.com',
    		'password' => Hash::make('password'),
    	]);    	

        $user15->assignRole('siswa');

        Siswa::create([
            'user_id' => $user15->id,
            'kode_siswa' => 'SSW'.Str::upper(Str::random(5)),
            'nisn' => '0823998096',
            'nis' => '08893322232',
            'nama_siswa' => 'Zero',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Tokyo',
            'no_telepon' => '08423509511',
            'kelas_id' => $kelas6->id,
        ]);
    }
}
