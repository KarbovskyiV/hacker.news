<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class ResetPostUpvotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-post-upvotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the post upvotes count';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::query()->update(['amount_of_upvotes' => 0]);

        $this->info('The post upvotes count has been reset.');
    }
}
