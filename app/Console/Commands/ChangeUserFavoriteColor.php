<?php

namespace App\Console\Commands;

use App\Events\UserFavoriteColorChanged;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ChangeUserFavoriteColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user favorite color';

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
        $user = User::find(1);
        $colors = [
            'Red',
            'Orange',
            'Yellow',
            'Green',
            'Teal',
            'Blue',
            'Purple',
            'Pink',
            'Brown',
            'Grey'
        ];

        $user->update([
            'favorite_color' => Arr::random($colors)
        ]);

        UserFavoriteColorChanged::dispatch($user);

        return 0;
    }
}

