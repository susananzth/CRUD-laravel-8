<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * Para generar los registros, abrir la consola de tinker con
         * > php artisan tinker
         * Luego ingresar el comando:
         * > Post::factory()->count(10)->create()
         */
        return [
            'user_id'   => 1,
            'title'     => $this->faker->sentence,
            'body'      => $this->faker->text(800),
        ];
    }
}
