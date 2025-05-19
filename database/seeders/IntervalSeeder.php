<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            $start = rand(0, 1000);
            // 20% случаев будет NULL для end
            $end = rand(0, 4) === 0 ? null : rand($start, $start + 100);

            $data[] = [
                'start' => $start,
                'end'   => $end,
            ];
        }

        foreach (array_chunk($data, 500) as $chunk) {
            DB::table('intervals')->insert($chunk);
        }
    }
}
