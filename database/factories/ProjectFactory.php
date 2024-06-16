<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $province = Province::inRandomOrder()->first();
        $district = District::where('province_id', $province->id)->inRandomOrder()->first();
        $subdistrict = Subdistrict::where('district_id', $district->id)->inRandomOrder()->first();
        $village = Village::where('subdistrict_id', $subdistrict->id)->inRandomOrder()->first();
        $owner = User::role('project-owner')->inRandomOrder()->first();

        $startTime = $this->faker->time('H:i');
        $startDateTime = \DateTime::createFromFormat('H:i', $startTime);
        $endDateTime = clone $startDateTime;
        $endDateTime->modify('+8 hours');
        $endTime = $endDateTime->format('H:i');

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'province_id' => $province->id,
            'district_id' => $district->id,
            'subdistrict_id' => $subdistrict->id,
            'village_id' => $village->id,
            'user_id' => $owner->id,
            'workers_needed' => $this->faker->numberBetween(10, 20),
            'salary' => $this->faker->numberBetween(1000000, 2300000),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+6 months')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['open', 'closed']),
        ];
    }
}
