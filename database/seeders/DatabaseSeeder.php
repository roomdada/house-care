<?php

namespace Database\Seeders;

use App\Domain\City\City;
use App\Domain\House\House;
use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\Role;
use App\Domain\User\ServiceUser;
use App\Domain\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'provider']);
        Role::create(['name' => 'canvasser']);
        Role::create(['name' => 'customer']);

         $cities = [

            ['city' => 'Koumassi', 'slug' => 'koumassi'],
            ['city' => 'Marcory', 'slug' => 'marcory'],
            ['city' => 'Port bouet', 'slug' => 'port-bouet'],
            ['city' => 'Cocody', 'slug' => 'cocody'],
            ['city' => 'Plateau', 'slug' => 'plateau'],
            ['city' => 'Bingerville', 'slug' => 'bingerville'],
            ['city' => 'Adjamé', 'slug' => 'adjame'],
            ['city' => 'Attecoubé', 'slug' => 'attecoube'],
            ['city' => 'Anyama', 'slug' => 'anyama'],
            ['city' => 'Abobo', 'slug' => 'abobo'],
            ['city' => 'Yopougon', 'slug' => 'yopougon'],
         ];



        foreach ($cities as $city) {
             City::create($city);
         }


         $users = [
            [
                'firstname' => 'User',
                'lastname' => 'admin',
                'role_id' => 1,
                'validation' => 1,
                'admin_validation' => 1,
                'password' => Hash::make('admin'),
                'token' => Str::random(60),
                'email' => 'admin@hc.com',
                'city_id' => City::all()->random()->id,
                'phone' =>'no phone'

            ],

            [
                'firstname' => 'User',
                'lastname' => 'Provider',
                'role_id' => 2,
                'validation' => 1,
                'admin_validation' => 1,
                'password' => Hash::make('provider'),
                'token' => Str::random(60),
                'email' => 'provider@hc.com',
                'inline' => 1,
                'city_id' => City::all()->random()->id,
                'genre' => "M",
                'phone' => 'XXXXXXXXXX',
                'matricule' => 'user-provider'
            ],


                 [
                'firstname' => 'User',
                'lastname' => 'Canvasser',
                'role_id' => 3,
                'validation' => 1,
                'admin_validation' => 1,
                'password' => Hash::make('canvasser'),
                'token' => Str::random(60),
                'email' => 'canvasser@hc.com',
                'inline' => 1,
                'city_id' => City::all()->random()->id,
                'genre' => "M",
                'phone' => 'XXXXXXXXXX',
                'matricule' => 'user-canvasser'
            ],


             [
                'firstname' => 'User',
                'lastname' => 'Provider',
                'role_id' => 4,
                'validation' => 1,
                'admin_validation' => 1,
                'password' => Hash::make('provider'),
                'token' => Str::random(60),
                'email' => 'customer@hc.com',
                'inline' => 1,
                'city_id' => City::all()->random()->id,
                'genre' => "M",
                'phone' => 'XXXXXXXXXX',
                'matricule' => 'user-customer'
            ],
         ];


       


        foreach ($users as $user) {
             User::create($user);
         }


        for($i=0; $i<=100; $i++)
        {
            User::create([
                'firstname' => "User $i",
                'lastname' => 'Provider',
                'role_id' => 2,
                'validation' => 1,
                'admin_validation' => 1,
                'password' => Hash::make('provider'),
                'token' => Str::random(60),
                'email' => "provider@hc_$i.com",
                'inline' => 1,
                'city_id' => City::all()->random()->id,
                'genre' => rand(0, 1) ? 'M' : 'F',
                'phone' => 'XXXXXXXXXX',
                'matricule' => 'user-provider'
            ]);

        }

  




        $houses = [
            [
                'city_id' => City::all()->random()->id,
                'place' => 4,
                'price' => '1000000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 4,
                'price' => '1000000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 2,
                'price' => '100000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 3,
                'price' => '90000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 6,
                'price' => '200000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 3,
                'price' => '900000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 4,
                'price' => '2000000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_1' => 'house_3.jpg',
                'image_1' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
            [
                'city_id' => City::all()->random()->id,
                'place' => 1,
                'price' => '50000',
                'image_1' => 'house_1.jpg',
                'image_2' => 'house_2.jpg',
                'image_4' => 'house_3.jpg',
                'image_3' => 'house_4.jpg',
                'description' => "Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.",
                'user_id' => 3,
                'token' => Str::random(60),
            ],
        ]; 


        foreach ($houses as $value) {
            House::create($value);
        }



         Domaine::create(
            [
                'name' => 'Froid et climatisation',
                'slug' => 'froid-et-climatisation',
                'icone' => '1.svg',
                'color' => '#5E35B1'
            ]);

          Domaine::create(
            [
                'name' => 'Electricité',
                'slug' => 'electricite',
                'icone' => '2.svg',
                'color' => '#CDDC39'
            ]);
            Domaine::create(
            [
                'name' => 'Jardinage',
                'slug' => 'jardinage',
                'icone' => '3.svg',
                'color' => '#EB1E79'
            ]);
              Domaine::create(
            [
                'name' => 'Entretien de maison',
                'slug' => 'entretien-de-maison',
                'icone' => '4.svg',
                'color' => '#000A99'
            ]);
            Domaine::create(
            [
                'name' => 'Prestation culinaire et acquisition de compétences',
                'slug' => 'prestation-culinaire-et-acquisition-de-competences',
                'icone' => '5.svg',
                'color' => '#000A45'
            ]);
            Domaine::create(
            [
                'name' => 'Travaux de plomberie et sanitaire',
                'slug' => 'travaux-de-plomberie-et-sanitaire',
                'icone' => '6.svg',
                'color' => '#22B274'
            ]);

           Domaine::create(
            [
                'name' => 'Location de voiture',
                'slug' => 'location-de-voiture',
                'icone' => '7.svg',
                'color' => "#FFAD03",
            ]);

        Service::create(
            [
                'name' => 'Maintenance/Entretien de split et climatisation' ,
                'slug' => 'maintenanceentretien-de-split-et-climatisation',
                'price' => 1000,
                'domaine_id' => 1,
                "image" => 'service.jpg'
            ]);

        Service::create(
            [
                'name' => 'Dépannage réfrigérateur, congélateur' ,
                'slug' => 'depannage-refrigerateur-congelateur',
                'price' => 1000,
                "image" => 'service.jpg',
                'domaine_id' => 1,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Électricité et bâtiment(audit et dépannage' ,
                'slug' => 'audit-electricite-batiment',
                'price' => 1000,
                'domaine_id' => 2,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Création de jardins' ,
                'slug' => 'creation-de-jardins',
                'price' => 1000,
                'domaine_id' => 3,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Tonte de gazon' ,
                'slug' => 'tonte-de-gazon',
                'price' => 1000,
                'domaine_id' => 3,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Entretien de fleurs' ,
                'slug' => 'entretien-de-fleurs',
                'price' => 1000,
                'domaine_id' => 3,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Lavage maison, nettoyage vitres (H. courante)' ,
                'slug' => 'lavage-maison-nettoyage-vitres-h-courante',
                'price' => 1000,
                'domaine_id' => 4,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Ponçage de carreaux' ,
                'slug' => 'ponçage-de-carreaux',
                'price' => 1000,
                'domaine_id' => 4,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Nettoyage fauteuil, divan, sofa etc' ,
                'slug' => 'nettoyage-fauteuil-divan-sofa-etc',
                'price' => 1000,
                'domaine_id' => 4,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Décoration de maison (peinture décorative)' ,
                'slug' => 'decoration-de-maison-peinture-decorative',
                'price' => 9000,
                'domaine_id' => 4,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Femme de ménage temporaire' ,
                'slug' => 'femme-de-menage-temporaire',
                'price' => 30000,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);

        Service::create(
            [
                'name' => 'Cuisinière temporaire' ,
                'slug' => 'cuisiniere-temporaire',
                'price' => 10000,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);
         Service::create(
            [
                'name' => 'Tresses a Domicile' ,
                'slug' => 'tresses-a-domicile',
                'price' => 1200,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);
          Service::create(
            [
                'name' => 'Formation en cuisine' ,
                'slug' => 'formation-en-cuisine',
                'price' => 2500,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);


        Service::create(
            [
                'name' => 'Habits a raccomoder' ,
                'slug' => 'habits-a-raccomoder',
                'price' => 3000,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);
        Service::create(
            [
                'name' => 'Coiffure a domicile (Homme,hemme)' ,
                'slug' => 'coiffure-a-domicile-hommehemme',
                'price' => 2000,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);

         Service::create(
            [
                'name' => 'Esthetique et onglérie' ,
                'slug' => 'esthetique-et-onglerie',
                'price' => 1500,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);


         Service::create(
            [
                'name' => 'Demenagement' ,
                'slug' => 'demenagement',
                'price' => 3400,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);

            Service::create(
            [
                'name' => 'Coursier motorisé' ,
                'slug' => 'coursier-motorise',
                'price' => 1000,
                'domaine_id' => 5,
                "image" => 'service.jpg'

            ]);

           Service::create(
            [
                'name' => 'Installation/désinstallation split et climatiseur' ,
                'slug' => 'installationdesinstallation-split-et-climatiseur',
                'price' => 8000,
                'domaine_id' => 1,
                "image" => 'service.jpg'

            ]);

            Service::create(
            [
                'name' => 'Dépannage électricité de ménage' ,
                'slug' => 'depannage-electricite-de-menage',
                'price' => 5000,
                'domaine_id' => 1,
                "image" => 'service.jpg'

            ]);


            for($i=1; $i<= 21; $i++){
                ServiceUser::create(['user_id' => User::where('role_id', 2)->get()->random()->id, 'service_id' => Service::all()->random()->id]);
            }




    }

      
         
    
}
