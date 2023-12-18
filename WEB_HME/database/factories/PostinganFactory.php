<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt'=>$this->faker->paragraph(),
            //'body'=>$this->faker->sentence(mt_rand(5,10)),
            //supaya ada text paraghraphnya maka 
            'body'=>collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p)=>"<p>$p</p>")->implode(''),
            'user_id'=>1,
            'kategori_id'=>mt_rand(1,3)
        ];
    }
}
