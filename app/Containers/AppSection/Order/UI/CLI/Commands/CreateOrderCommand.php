<?php


namespace App\Containers\AppSection\Order\UI\CLI\Commands;


use App\Containers\AppSection\Order\Actions\CreateOrderAction;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Commands\ConsoleCommand;
use Carbon\Carbon;

class CreateOrderCommand extends ConsoleCommand
{
    protected $signature = 'order:create';
    protected $description = 'Create Order';

    public function handle()
    {
        /*$email = $this->ask('Enter user email');
        $departure = $this->ask('Enter departure address');
        $arrival = $this->ask('Enter arrival address');
        $earliestDepartureTime = $this->ask('Enter the earliest departure time (H:i)');
        $latestDepartureTime = $this->ask('Enter the latest departure time (H:i)');*/

        $email = 'admin@admin.com';
        $departure = 'Ногатинский спуск, 38';
        $arrival = 'Маршала Савицкого, 12';
        $earliestDepartureTime = '12:00';
        $latestDepartureTime = '12:10';

        $user = User::whereEmail($email)->firstOrFail();

        $data = [
            'user_id' => $user->id,
            'departure_address' => $departure,
            'arrival_address' => $arrival,
            'earliest_time' => Carbon::createFromFormat('H:i', $earliestDepartureTime),
            'latest_time' => Carbon::createFromFormat('H:i', $latestDepartureTime),
        ];

        app(CreateOrderAction::class)->run($data);

        $this->info('Order created successfully');
    }
}
