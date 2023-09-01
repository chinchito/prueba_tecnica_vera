<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear usuarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $validated = Validator::make($this->arguments(), [
            "name" => ["required", "string"],
            "email" => ["required", "email", $this->user() ? Rule::unique('users')->ignore($this->user()->id) : ""],
            "password" => ["required"],
        ]);

        $new_user = new User;
        $new_user->name = $validated["name"];
        $new_user->name = $validated["email"];
        $new_user->name = $validated["password"];
        $new_user->save();

        return "Usuario creado correctamente\n";
    }
}
