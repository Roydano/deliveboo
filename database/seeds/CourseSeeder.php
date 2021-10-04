<?php

use Illuminate\Database\Seeder;
use App\Course;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Antipasto',
            'Primo',
            'Secondo',
            'Contorno',
            'Snacks',
            'Dessert'
        ];

        foreach($courses as $course) {
            $newCourse = new Course();
            $newCourse->name = $course;
            $newCourse->slug = Str::slug($newCourse->name, '-');
            $newCourse->save();
        }
    }
}
