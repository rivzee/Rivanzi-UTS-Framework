<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServisFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_pemilik' => $this->faker->name(),
            'no_polisi' => strtoupper($this->faker->bothify('?? #### ??')),
            'jenis_kendaraan' => $this->faker->randomElement(['Mobil', 'Motor', 'Truk']),
            'keluhan' => $this->faker->sentence(6),
            'jenis_servis' => $this->faker->randomElement(['Ganti Oli', 'Tune Up', 'Perbaikan Rem', 'Servis Ringan']),
            'tanggal_servis' => $this->faker->date(),
            'biaya' => $this->faker->numberBetween(100000, 5000000),
            'status' => $this->faker->randomElement(['menunggu', 'dikerjakan', 'selesai']),
        ];
    }
}
