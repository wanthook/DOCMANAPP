<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->truncate();
        DB::table('kategori')->insert([
            [
                'kategori_nama'     => 'Instruksi Kerja',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Parameter/Standar Proses',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Pedoman Sistem Manajemen',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Prosedur Sistem Manajemen',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Metode, Program Manajemen dan Sasaran Mutu',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Flowchart Sistem Manajemen',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Matriks Dokumen',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Daftar Isi',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'Aspek & Dampak Lingkungan',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ],
            [
                'kategori_nama'     => 'File',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')

            ]]);
    }
}
