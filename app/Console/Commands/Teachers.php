<?php

namespace App\Console\Commands;

use App\Models\Teacher;
use Illuminate\Console\Command;

class Teachers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teachers:list {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all teachers from teachers table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers  = ["ID", "Name"];
        $teachers = Teacher::select('id', 'name')->where('id', $this->argument('id'))->get();

        $this->table($headers, $teachers);
    }
}
