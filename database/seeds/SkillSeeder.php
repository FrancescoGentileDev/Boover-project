<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        // Il commento di fianco indica la Category di appartenenza di quelle Skills
        $groups = [
            ['Gaming', 'Brand Identity', 'Social Media', 'Moda e Accessori'], // Grafica e Design
            ['Pubbliche Relazioni', 'E-Commerce', 'Web Analytics', 'Display Advertising'], // Marketing
            ['Blog Post', 'Traduzione di Testi', 'Scrittura Creativa', 'Case Study'], // Scrittura e Traduzione
            ['Produttori e Compositori', 'Cantanti e Vocalist', 'Mixaggio DJ', 'Produzione Audiolibri'], // Musica e Audio
            ['Sviluppo Siti Web', 'Sviluppo Videogiochi', 'Sicurezza Informatica', 'Blockchain e Criptovalute'], // Programmazione e Tecnologia
            ['Life Coaching', 'Fitness e Benessere', 'Lezioni di Cucina', 'Fotografia'], // Lifestyle
            ['Fisioterapia', 'Psicologia e Psicoterapia', 'Dietologia', 'Medicina Generale'], // Medicina e Salute
            ['Sport di Squadra', 'Discipline Olimpiche', 'Lezioni di Scacchi', 'Sport Invernali'], // Sport e Hobby
            ['Altro'], // Altro
        ];
        foreach ($groups as $group => $skills) {

            foreach ($skills as $skill) {
                $addSkill = new Skill();
                $addSkill->name = $skill;
                $addSkill->category_id = $group + 1 ;
                $addSkill->slug = Str::slug($addSkill->name);
                $addSkill->description = $faker->realText(256);
                $addSkill->image = $faker->image();
                $addSkill->save();
            };
        }
    }
}
