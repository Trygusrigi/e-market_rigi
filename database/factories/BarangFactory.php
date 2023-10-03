<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_barang' => Str::random(20),
            'produk_id' => rand(1000000, 9999999),
            'nama_barang' => fake()->name(),
            'harga_jual' => rand(1000, 999999999),
            'satuan' => 'segitu',
            'stok' => rand(1, 999),
            'ditarik' => rand(1, 999),
            'user_id' => rand(1, 2),
            
        ];
    }
}
