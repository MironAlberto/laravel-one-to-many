<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Project;

// Helpers 
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i = 0; $i < 15; $i++) { 
            $project = new Project();

            $project->url = fake()->url();
            $project->title = fake()->sentence();
            $project->slug = Str::slug($project->title);
            $project->content = fake()->paragraph();
            $project->save();
        }
    }
}
