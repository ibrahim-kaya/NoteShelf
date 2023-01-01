<?php

namespace Database\Seeders;

use App\Models\NoteIcon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoteIcon::create([
            'name' => 'Not',
            'icon' => 'fa-solid fa-note-sticky'
        ]);
        NoteIcon::create([
            'name' => 'Yıldız',
            'icon' => 'fa-solid fa-star'
        ]);
    }
}
