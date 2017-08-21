<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RefTableSeeder::class);
    }
}

class RefTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ref')->truncate();

        DB::table('ref')->insert([
          ['refid' => '1','refno' => '1','reftext' => 'Laki-laki'],
          ['refid' => '1','refno' => '2','reftext' => 'Perempuan'],
          ['refid' => '2','refno' => '1','reftext' => 'Islam'],
          ['refid' => '2','refno' => '2','reftext' => 'Katolik'],
          ['refid' => '2','refno' => '3','reftext' => 'Protestan'],
          ['refid' => '2','refno' => '4','reftext' => 'Hindu'],
          ['refid' => '2','refno' => '5','reftext' => 'Budha'],
          ['refid' => '2','refno' => '6','reftext' => 'Konghucu'],
          ['refid' => '2','refno' => '7','reftext' => 'Lainnya'],
          ['refid' => '99999','refno' => '1','reftext' => 'PENDAPATAN'],
          ['refid' => '99999','refno' => '11','reftext' => 'Pendapatan Asli Desa'],
          ['refid' => '99999','refno' => '111','reftext' => 'Hasil Usaha'],
          ['refid' => '99999','refno' => '112','reftext' => 'Swadaya, Partisipasi dan Gotong Royong'],
          ['refid' => '99999','refno' => '113','reftext' => 'Lain-lain Pendapatan Asli Desa Yang Sah'],
          ['refid' => '99999','refno' => '12','reftext' => 'Pendapatan Transfer'],
          ['refid' => '99999','refno' => '121','reftext' => 'Dana Desa'],
          ['refid' => '99999','refno' => '122','reftext' => 'Bagian dari Hasil Pajak dan Retribusi Daerah Kabupaten Kota'],
          ['refid' => '99999','refno' => '123','reftext' => 'Alokasi Dana Desa'],
          ['refid' => '99999','refno' => '124','reftext' => 'Bantuan Keuangan'],
          ['refid' => '99999','refno' => '1241','reftext' => 'Bantuan Provinsi'],
          ['refid' => '99999','refno' => '1242','reftext' => 'Bantuan Kabupaten/Kota'],
          ['refid' => '99999','refno' => '13','reftext' => 'Pendapatan Lain-lain'],
          ['refid' => '99999','refno' => '131','reftext' => 'Hibah dan Sumbangan dari Pihak Ketiga yang Tidak Mengikat'],
          ['refid' => '99999','refno' => '132','reftext' => 'Lain-lain Pendapatan Desa yang Sah'],
          ['refid' => '99999','refno' => '2','reftext' => 'BELANJA'],
          ['refid' => '99999','refno' => '21','reftext' => 'Bidang Penyelenggaraan Pemerintah Desa'],
          ['refid' => '99999','refno' => '211','reftext' => 'Penghasilan Tetap dan Tunjangan'],
          ['refid' => '99999','refno' => '2111','reftext' => 'Belanja Pegawai'],
          ['refid' => '99999','refno' => '212','reftext' => 'Operasional Perkantoran'],
          ['refid' => '99999','refno' => '2122','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '2123','reftext' => 'Belanja Modal'],
          ['refid' => '99999','refno' => '213','reftext' => 'Operasional BPD'],
          ['refid' => '99999','refno' => '2132','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '214','reftext' => 'Operasional RT/RW'],
          ['refid' => '99999','refno' => '2142','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '22','reftext' => 'Bidang Pelaksanaan Pembangunan Desa'],
          ['refid' => '99999','refno' => '221','reftext' => 'Perbaikan Saluran Irigasi'],
          ['refid' => '99999','refno' => '2212','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '2213','reftext' => 'Belanja Modal'],
          ['refid' => '99999','refno' => '222','reftext' => 'Pengaspalan Jalan Desa'],
          ['refid' => '99999','refno' => '2222','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '2223','reftext' => 'Belanja Modal'],
          ['refid' => '99999','refno' => '223','reftext' => 'Kegiatan'],
          ['refid' => '99999','refno' => '23','reftext' => 'Bidang Pembinaan Kemasyarakatan'],
          ['refid' => '99999','refno' => '231','reftext' => 'Kegiatan Pembinaan Ketentraman dan Ketertiban'],
          ['refid' => '99999','refno' => '2312','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '232','reftext' => 'Kegiatan'],
          ['refid' => '99999','refno' => '24','reftext' => 'Bidang Pemberdayaan Masyarakat'],
          ['refid' => '99999','refno' => '241','reftext' => 'Kegiatan Pelatihan Kepala Desa dan Perangkat'],
          ['refid' => '99999','refno' => '2412','reftext' => 'Belannja Barang dan Jasa'],
          ['refid' => '99999','refno' => '242','reftext' => 'Kegiatan'],
          ['refid' => '99999','refno' => '25','reftext' => 'Bidang Tak Terduga'],
          ['refid' => '99999','refno' => '251','reftext' => 'Kegiatan Kejadian Luar Biasa'],
          ['refid' => '99999','refno' => '2512','reftext' => 'Belanja Barang dan Jasa'],
          ['refid' => '99999','refno' => '262','reftext' => 'Kegiatan'],
          ['refid' => '99999','refno' => '3','reftext' => 'PEMBIAYAAN'],
          ['refid' => '99999','refno' => '31','reftext' => 'Penerimaan Pembiayaan'],
          ['refid' => '99999','refno' => '311','reftext' => 'SILPA'],
          ['refid' => '99999','refno' => '312','reftext' => 'Pencairan Dana Cadangan'],
          ['refid' => '99999','refno' => '313','reftext' => 'Hasil Kekayaan Desa yang Dipisahkan'],
          ['refid' => '99999','refno' => '32','reftext' => 'PENGELUARAN PEMBIAYAAN'],
          ['refid' => '99999','refno' => '321','reftext' => 'Pembentukan Dana Cadangan'],
          ['refid' => '99999','refno' => '322','reftext' => 'Penyertaan Modal Desa'],




        ]);
    }

}
