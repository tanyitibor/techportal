<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateSeeds extends Command
{
    protected $tables = [
        'admin_menu', 'admin_permissions', 'admin_roles', 'admin_role_menu',
        'admin_role_permissions', 'admin_role_users', 'admin_users',
        'admin_user_permissions',
    ];

    protected $seedsDir;

    protected $hiddenColumns = [
        'created_at', 'updated_at', 'remember_token',
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:seeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate seed data from database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->seedsDir = base_path('database/seeds/sources/');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->tables as $table) {
            $data = DB::table($table)->get()->toArray();

            $data = array_map(function($row) {
                foreach ($this->hiddenColumns as $col) {
                    unset($row->$col);
                }

                return $row;
            }, $data);

            file_put_contents($this->seedsDir . $table . '.json', json_encode($data));
        }
    }
}
