<?php

use Illuminate\Database\Seeder;

class DepartemenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemen')->truncate();
        DB::table('departemen')->insert([
            [
                'departemen_nama'     => 'Information Systems',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'GA',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'MTC Build',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Safety & Healthy',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Marketing',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Purchasing',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Managing Director',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'QMR/EMR',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'HRD-GA Dept Head',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Manager',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-PPIC',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Tenun',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Celup Handuk',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Operational Director',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Pers.Tenun',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Twisting',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Bordir',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Celup Benang',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Jahit',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-R&D',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'MTC Dept Head',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Utility Dept Head',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Sec. ISO',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Marketing Lokal',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Desain',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Packing',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Lokal',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Spare Parts',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Benang Grey',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Kimia',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Maklon',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Spinning 1',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Knitting',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Printing',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Spinning 2',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Spinning 3',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Logistik',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'QA/QC',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Director',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Finance',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'HRD-GA',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Lab',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Produksi-Stenter',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'MTC',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'UTILITY',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Benang Warna',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'departemen_nama'     => 'Gudang Handuk Grey',
                'created_by'        => '1',
                'updated_by'        => '1',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ]

            ]);
    }
}