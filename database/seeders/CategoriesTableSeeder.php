<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // if(env('APP_ENV') == 'local')
        // {
        //     $this->faker = Factory::create();
        //     for ($i=0; $i < 15; $i++) {

        //         DB::table('categories')->insert(
        //             [
        //                 // 'name' => $this->faker->word(),
        //                 'name' => 'category'.$i+1,
        //                 'slug' => 'category'.$i+1,
        //             ]
        //         );
        //     }

        // }

        $categories = [
            [
                'priority' => 1,
                'name' => 'Jedzenie i napoje',
                'slug' => Str::slug('Jedzenie i napoje', '-'),
                'english' => 'Food and Drinks',
                'german' => 'Essen und Trinken',
                'spanish' => 'Comida y Bebidas',
                'ukrainian' => 'Їжа та напої',
            ],
            [
                'name' => 'Podróże',
                'slug' => Str::slug('Podróże', '-'),
                'english' => 'Travel',
                'german' => 'Reisen',
                'spanish' => 'Viajes',
                'ukrainian' => 'Подорожі',
            ],
            [
                'name' => 'Praca i zawód',
                'slug' => Str::slug('Praca i zawód', '-'),
                'english' => 'Work and Occupation',
                'german' => 'Arbeit und Beruf',
                'spanish' => 'Trabajo y Ocupación',
                'ukrainian' => 'Робота та професія',
            ],
            [
                'name' => 'Rodzina i relacje',
                'slug' => Str::slug('Rodzina i relacje', '-'),
                'english' => 'Family and Relationships',
                'german' => 'Familie und Beziehungen',
                'spanish' => 'Familia y Relaciones',
                'ukrainian' => 'Сім’я та стосунки',
            ],
            [
                'name' => 'Przyroda i otoczenie',
                'slug' => Str::slug('Przyroda i otoczenie', '-'),
                'english' => 'Nature and Environment',
                'german' => 'Natur und Umwelt',
                'spanish' => 'Naturaleza y Medio Ambiente',
                'ukrainian' => 'Природа та довкілля',
            ],
            [
                'name' => 'Szkoła i edukacja',
                'slug' => Str::slug('Szkoła i edukacja', '-'),
                'english' => 'School and Education',
                'german' => 'Schule und Bildung',
                'spanish' => 'Escuela y Educación',
                'ukrainian' => 'Школа та освіта',
            ],
            [
                'name' => 'Sport i rekreacja',
                'slug' => Str::slug('Sport i rekreacja', '-'),
                'english' => 'Sports and Recreation',
                'german' => 'Sport und Freizeit',
                'spanish' => 'Deporte y Recreación',
                'ukrainian' => 'Спорт та відпочинок',
            ],
            [
                'name' => 'Zdrowie i medycyna',
                'slug' => Str::slug('Zdrowie i medycyna', '-'),
                'english' => 'Health and Medicine',
                'german' => 'Gesundheit und Medizin',
                'spanish' => 'Salud y Medicina',
                'ukrainian' => 'Здоров’я та медицина',
            ],
            [
                'name' => 'Kultura i sztuka',
                'slug' => Str::slug('Kultura i sztuka', '-'),
                'english' => 'Culture and Art',
                'german' => 'Kultur und Kunst',
                'spanish' => 'Cultura y Arte',
                'ukrainian' => 'Культура та мистецтво',
            ],
            [
                'name' => 'Zakupy i handel',
                'slug' => Str::slug('Zakupy i handel', '-'),
                'english' => 'Shopping and Commerce',
                'german' => 'Einkaufen und Handel',
                'spanish' => 'Compras y Comercio',
                'ukrainian' => 'Покупки та торгівля',
            ],
            [
                'name' => 'Technologia i media',
                'slug' => Str::slug('Technologia i media', '-'),
                'english' => 'Technology and Media',
                'german' => 'Technologie und Medien',
                'spanish' => 'Tecnología y Medios',
                'ukrainian' => 'Технології та медіа',
            ],
            [
                'priority' => 2,
                'name' => 'Podstawowe życiowe sytuacje',
                'slug' => Str::slug('Podstawowe życiowe sytuacje', '-'),
                'english' => 'Basic Life Situations',
                'german' => 'Grundlegende Lebenssituationen',
                'spanish' => 'Situaciones Básicas de la Vida',
                'ukrainian' => 'Основні життєві ситуації',
            ],
            [
                'priority' => 2,
                'name' => 'Wnętrze domu',
                'slug' => Str::slug('Wnętrze domu', '-'),
                'english' => 'Home Interior',
                'german' => 'Wohnungseinrichtung',
                'spanish' => 'Interior del Hogar',
                'ukrainian' => 'Інтер’єр дому',
            ],
            [
                'priority' => 1,
                'name' => 'Ubrania i moda',
                'slug' => Str::slug('Ubrania i moda', '-'),
                'english' => 'Clothing and Fashion',
                'german' => 'Kleidung und Mode',
                'spanish' => 'Ropa y Moda',
                'ukrainian' => 'Одяг та мода',
            ],
            [
                'name' => 'Wakacje i święta',
                'slug' => Str::slug('Wakacje i święta', '-'),
                'english' => 'Holidays and Celebrations',
                'german' => 'Ferien und Feiern',
                'spanish' => 'Vacaciones y Celebraciones',
                'ukrainian' => 'Відпустки та свята',
            ],
            [
                'name' => 'Finanse i pieniądze',
                'slug' => Str::slug('Finanse i pieniądze', '-'),
                'english' => 'Finances and Money',
                'german' => 'Finanzen und Geld',
                'spanish' => 'Finanzas y Dinero',
                'ukrainian' => 'Фінанси та гроші',
            ],
            [
                'name' => 'Transport i komunikacja',
                'slug' => Str::slug('Transport i komunikacja', '-'),
                'english' => 'Transport and Communication',
                'german' => 'Verkehr und Kommunikation',
                'spanish' => 'Transporte y Comunicación',
                'ukrainian' => 'Транспорт та комунікація',
            ],
            [
                'priority' => 2,
                'name' => 'Czas i pory dnia',
                'slug' => Str::slug('Czas i pory dnia', '-'),
                'english' => 'Time and Times of the Day',
                'german' => 'Zeit und Tageszeiten',
                'spanish' => 'Tiempo y Momentos del Día',
                'ukrainian' => 'Час та час доби',
            ],
            [
                'priority' => 1,
                'name' => 'Kraje i narodowości',
                'slug' => Str::slug('Kraje i narodowości', '-'),
                'english' => 'Countries and Nationalities',
                'german' => 'Länder und Nationalitäten',
                'spanish' => 'Países y Nacionalidades',
                'ukrainian' => 'Країни та національності',
            ],
            [
                'priority' => 2,
                'name' => 'Człowiek i ciało',
                'slug' => Str::slug('Człowiek i ciało', '-'),
                'english' => 'Human and Body',
                'german' => 'Mensch und Körper',
                'spanish' => 'Persona y Cuerpo',
                'ukrainian' => 'Людина та тіло',
            ],
            [
                'name' => 'Działania i czas wolny',
                'slug' => Str::slug('Działania i czas wolny', '-'),
                'english' => 'Actions and Leisure Time',
                'german' => 'Aktionen und Freizeit',
                'spanish' => 'Acciones y Tiempo Libre',
                'ukrainian' => 'Дії та дозвілля',
            ],
            [
                'name' => 'Czynności domowe',
                'slug' => Str::slug('Czynności domowe', '-'),
                'english' => 'Household Activities',
                'german' => 'Hausarbeit',
                'spanish' => 'Actividades del Hogar',
                'ukrainian' => 'Побутові дії',
            ],
            [
                'name' => 'Życie społeczne',
                'slug' => Str::slug('Życie społeczne', '-'),
                'english' => 'Social Life',
                'german' => 'Soziales Leben',
                'spanish' => 'Vida Social',
                'ukrainian' => 'Суспільне життя',
            ],

        ];

        foreach ($categories as $category) {
            if (!array_key_exists('priority', $category))
            {
                $category['priority'] = 0;
            }

            DB::table('categories')->insert([
                'priority' => $category['priority'],
                'name' => $category['name'],
                'slug' => $category['slug'],
                'english' => $category['english'],
                'german' => $category['german'],
                'spanish' => $category['spanish'],
                'ukrainian' => $category['ukrainian'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
