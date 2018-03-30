<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

abstract class JsonSeeder extends Seeder
{
    protected $files = '*';

    protected $truncate = true;

    public function run()
    {
        foreach(glob($this->sourcesDir()) as $seed) {
            $table = explode('/', $seed);
            $table = str_replace('.json', '', $table[count($table) - 1]);

            $data = file_get_contents($seed);

            if ($this->truncate) DB::table($table)->truncate();
            DB::table($table)->insert(json_decode($data, true));
        }
    }

    private function sourcesDir()
    {
        return base_path('database/seeds/sources/' . $this->files);
    }
}
