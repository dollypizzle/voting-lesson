<?php

namespace Database\Factories;

use App\Models\CommunityLink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommunityLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => factory('App/Models/User')->create()->id,
            'user_id' => User::factory(),
            'channel_id' => 1,
            'title' => $this->faker->sentence,
            'link' => $this->faker->url,
            'approved' => 0
        ];
    }
}
