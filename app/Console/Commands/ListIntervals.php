<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ListIntervals extends Command
{
    protected $signature = 'intervals:list {--left= : Левый конец интервала} {--right= : Правый конец интервала}';
    protected $description = 'Выводит интервалы, пересекающиеся с интервалом [left, right]';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $left = $this->option('left');
        $right = $this->option('right');

        if ($left === null || $right === null) {
            $this->error('Пожалуйста, укажите опции --left и --right.');
            return 1;
        }

        if (!is_numeric($left) || !is_numeric($right)) {
            $this->error('Опции --left и --right должны быть числами.');
            return 1;
        }

        if ($left > $right) {
            $this->error('Опция --left должна быть меньше или равна --right.');
            return 1;
        }

        $intervals = DB::table('intervals')
            ->where(function ($query) use ($left, $right) {
                $query->where('start', '<=', $right)
                    ->where(function ($q) use ($left) {
                        $q->whereNull('end')
                            ->orWhere('end', '>=', $left);
                    });
            })
            ->get();

        if ($intervals->isEmpty()) {
            $this->info("Интервалы, пересекающиеся с [$left, $right], не найдены.");
            return 0;
        }

        $data = $intervals->map(fn($item) => (array) $item)->toArray();

        $this->table(['ID', 'Start', 'End'], $data);

        return 0;
    }


}
