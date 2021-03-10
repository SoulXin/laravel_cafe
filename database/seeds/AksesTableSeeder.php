<?php

use Illuminate\Database\Seeder;
use App\Akses;

class AksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama_akses = [
            // Akun
            [   
                'nama' => 'Tambah Akun',
                'kategori' => 'Akun'
            ],
            [
                'nama' => 'Ubah Akun',
                'kategori' => 'Akun'
            ],
            [
                'nama' => 'Hapus Akun',
                'kategori' => 'Akun'
            ],
            // Makanan
            [
                'nama' => 'Tambah Makanan',
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Ubah Makanan',
                'kategori' => 'Makanan'
            ],
            [
                'nama' => 'Hapus Makanan',
                'kategori' => 'Makanan'
            ],

        ];

        foreach($nama_akses as $nama){
            Akses::create($nama);
        }
    }
}
