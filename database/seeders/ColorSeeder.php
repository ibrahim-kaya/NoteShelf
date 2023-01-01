<?php

namespace Database\Seeders;

use App\Models\NoteColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoteColor::create([
            'name' => 'Açık Mavi',
            'color' => '#60a5fa'
        ]);
        NoteColor::create([
            'name' => 'Mavi',
            'color' => '#3b82f6'
        ]);
        NoteColor::create([
            'name' => 'Yeşil',
            'color' => '#059669'
        ]);
        NoteColor::create([
            'name' => 'Sarı',
            'color' => '#f59e0b'
        ]);
        NoteColor::create([
            'name' => 'Kırmızı',
            'color' => '#dc2626'
        ]);
        NoteColor::create([
            'name' => 'Mor',
            'color' => '#7c3aed'
        ]);
        NoteColor::create([
            'name' => 'Gri',
            'color' => '#6b7280'
        ]);
    }
}
