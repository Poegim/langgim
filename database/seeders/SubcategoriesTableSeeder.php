<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategoriesTableSeeder extends Seeder
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
        //     for ($i=0; $i < 50; $i++) {

        //         DB::table('subcategories')->insert(
        //             [
        //                 // 'name' => $this->faker->word(),
        //                 'name' => 'subcategory'.$i+1,
        //                 'slug' => 'subcategory'.$i+1,
        //                 'category_id' => rand(1,15),
        //             ]
        //         );
        //     }

        // }

        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Restauracje',
                'slug' => Str::slug('Restauracje', '-'),
                'english' => 'Restaurants',
                'german' => 'Restaurants',
                'spanish' => 'Restaurantes',
                'ukrainian' => 'Ресторани',
            ],
            [
                'category_id' => 1,
                'name' => 'Potrawy',
                'slug' => Str::slug('Potrawy', '-'),
                'english' => 'Dishes',
                'german' => 'Gerichte',
                'spanish' => 'Platillos',
                'ukrainian' => 'Страви',
            ],
            [
                'category_id' => 1,
                'name' => 'Napoje',
                'slug' => Str::slug('Napoje', '-'),
                'english' => 'Beverages',
                'german' => 'Getränke',
                'spanish' => 'Bebidas',
                'ukrainian' => 'Напої',
            ],
            [
                'category_id' => 1,
                'name' => 'Produkty spożywcze',
                'slug' => Str::slug('Produkty spożywcze', '-'),
                'english' => 'Groceries',
                'german' => 'Lebensmittel',
                'spanish' => 'Comestibles',
                'ukrainian' => 'Продукти харчування',
            ],
            [
                'category_id' => 2,
                'name' => 'Lotnisko',
                'slug' => Str::slug('Lotnisko', '-'),
                'english' => 'Airport',
                'german' => 'Flughafen',
                'spanish' => 'Aeropuerto',
                'ukrainian' => 'Аеропорт',
            ],
            [
                'category_id' => 2,
                'name' => 'Hotel',
                'slug' => Str::slug('Hotel', '-'),
                'english' => 'Hotel',
                'german' => 'Hotel',
                'spanish' => 'Hotel',
                'ukrainian' => 'Готель',
            ],
            [
                'category_id' => 2,
                'name' => 'Zwroty przydatne w podróży',
                'slug' => Str::slug('Zwroty przydatne w podróży', '-'),
                'english' => 'Useful Phrases for Travel',
                'german' => 'Nützliche Phrasen für die Reise',
                'spanish' => 'Frases útiles para viajar',
                'ukrainian' => 'Корисні вислови для подорожей',
            ],
            [
                'category_id' => 3,
                'name' => 'Zawody',
                'slug' => Str::slug('Zawody', '-'),
                'english' => 'Professions',
                'german' => 'Berufe',
                'spanish' => 'Profesiones',
                'ukrainian' => 'Професії',
            ],
            [
                'category_id' => 3,
                'name' => 'Umiejętności',
                'slug' => Str::slug('Umiejętności', '-'),
                'english' => 'Skills',
                'german' => 'Fähigkeiten',
                'spanish' => 'Habilidades',
                'ukrainian' => 'Навички',
            ],
            [
                'category_id' => 3,
                'name' => 'Rozmowy o pracę',
                'slug' => Str::slug('Rozmowy o pracę', '-'),
                'english' => 'Job Interviews',
                'german' => 'Bewerbungsgespräche',
                'spanish' => 'Entrevistas de trabajo',
                'ukrainian' => 'Співбесіди на роботу',
            ],
            [
                'category_id' => 3,
                'name' => 'Życiorysy',
                'slug' => Str::slug('Życiorysy', '-'),
                'english' => 'Resumes',
                'german' => 'Lebensläufe',
                'spanish' => 'Currículums',
                'ukrainian' => 'Резюме',
            ],
            [
                'category_id' => 4,
                'name' => 'Rodzina',
                'slug' => Str::slug('Rodzina', '-'),
                'english' => 'Family',
                'german' => 'Familie',
                'spanish' => 'Familia',
                'ukrainian' => 'Родина',
            ],
            [
                'category_id' => 4,
                'name' => 'Przyjaciele',
                'slug' => Str::slug('Przyjaciele', '-'),
                'english' => 'Friends',
                'german' => 'Freunde',
                'spanish' => 'Amigos',
                'ukrainian' => 'Друзі',
            ],
            [
                'category_id' => 4,
                'name' => 'Opisywanie relacji między ludźmi',
                'slug' => Str::slug('Opisywanie relacji między ludźmi', '-'),
                'english' => 'Describing Relationships',
                'german' => 'Beschreibung von Beziehungen',
                'spanish' => 'Descripción de Relaciones',
                'ukrainian' => 'Опис відносин між людьми',
            ],
            [
                'category_id' => 5,
                'name' => 'Rośliny',
                'slug' => Str::slug('Rośliny', '-'),
                'english' => 'Plants',
                'german' => 'Pflanzen',
                'spanish' => 'Plantas',
                'ukrainian' => 'Рослини',
            ],
            [
                'category_id' => 5,
                'name' => 'Zwierzęta',
                'slug' => Str::slug('Zwierzęta', '-'),
                'english' => 'Animals',
                'german' => 'Tiere',
                'spanish' => 'Animales',
                'ukrainian' => 'Тварини',
            ],
            [
                'category_id' => 5,
                'name' => 'Krajobrazy',
                'slug' => Str::slug('Krajobrazy', '-'),
                'english' => 'Landscapes',
                'german' => 'Landschaften',
                'spanish' => 'Paisajes',
                'ukrainian' => 'Ландшафти',
            ],
            [
                'category_id' => 5,
                'name' => 'Pogoda',
                'slug' => Str::slug('Pogoda', '-'),
                'english' => 'Weather',
                'german' => 'Wetter',
                'spanish' => 'Clima',
                'ukrainian' => 'Погода',
            ],
            [
                'category_id' => 6,
                'name' => 'Przedmioty szkolne',
                'slug' => Str::slug('Przedmioty szkolne', '-'),
                'english' => 'School Subjects',
                'german' => 'Schulfächer',
                'spanish' => 'Materias escolares',
                'ukrainian' => 'Шкільні предмети',
            ],
            [
                'category_id' => 6,
                'name' => 'Kształcenie',
                'slug' => Str::slug('Kształcenie', '-'),
                'english' => 'Education',
                'german' => 'Bildung',
                'spanish' => 'Educación',
                'ukrainian' => 'Освіта',
            ],
            [
                'category_id' => 6,
                'name' => 'Uczelnie',
                'slug' => Str::slug('Uczelnie', '-'),
                'english' => 'Educational Institutions',
                'german' => 'Bildungseinrichtungen',
                'spanish' => 'Instituciones educativas',
                'ukrainian' => 'Освітні заклади',
            ],
            [
                'category_id' => 7,
                'name' => 'Dyscypliny sportowe',
                'slug' => Str::slug('Dyscypliny sportowe', '-'),
                'english' => 'Sports Disciplines',
                'german' => 'Sportdisziplinen',
                'spanish' => 'Disciplinas deportivas',
                'ukrainian' => 'Види спорту',
            ],
            [
                'category_id' => 7,
                'name' => 'Aktywności rekreacyjne',
                'slug' => Str::slug('Aktywności rekreacyjne', '-'),
                'english' => 'Recreational Activities',
                'german' => 'Freizeitaktivitäten',
                'spanish' => 'Actividades recreativas',
                'ukrainian' => 'Рекреаційні заняття',
            ],
            [
                'category_id' => 8,
                'name' => 'Ciało',
                'slug' => Str::slug('Ciało', '-'),
                'english' => 'Body',
                'german' => 'Körper',
                'spanish' => 'Cuerpo',
                'ukrainian' => 'Тіло',
            ],
            [
                'category_id' => 8,
                'name' => 'Objawy chorób',
                'slug' => Str::slug('Objawy chorób', '-'),
                'english' => 'Symptoms of Illness',
                'german' => 'Krankheitssymptome',
                'spanish' => 'Síntomas de enfermedad',
                'ukrainian' => 'Симптоми хвороб',
            ],
            [
                'category_id' => 8,
                'name' => 'Wizyta u lekarza',
                'slug' => Str::slug('Wizyta u lekarza', '-'),
                'english' => 'Doctor\'s Visit',
                'german' => 'Arztbesuch',
                'spanish' => 'Visita al médico',
                'ukrainian' => 'Візит до лікаря',
            ],
            [
                'category_id' => 9,
                'name' => 'Literatura',
                'slug' => Str::slug('Literatura', '-'),
                'english' => 'Literature',
                'german' => 'Literatur',
                'spanish' => 'Literatura',
                'ukrainian' => 'Література',
            ],
            [
                'category_id' => 9,
                'name' => 'Film',
                'slug' => Str::slug('Film', '-'),
                'english' => 'Film',
                'german' => 'Film',
                'spanish' => 'Cine',
                'ukrainian' => 'Кіно',
            ],
            [
                'category_id' => 9,
                'name' => 'Muzyka',
                'slug' => Str::slug('Muzyka', '-'),
                'english' => 'Music',
                'german' => 'Musik',
                'spanish' => 'Música',
                'ukrainian' => 'Музика',
            ],
            [
                'category_id' => 9,
                'name' => 'Teatr',
                'slug' => Str::slug('Teatr', '-'),
                'english' => 'Theater',
                'german' => 'Theater',
                'spanish' => 'Teatro',
                'ukrainian' => 'Театр',
            ],
            [
                'category_id' => 9,
                'name' => 'Sztuki wizualne',
                'slug' => Str::slug('Sztuki wizualne', '-'),
                'english' => 'Visual Arts',
                'german' => 'Bildende Kunst',
                'spanish' => 'Artes visuales',
                'ukrainian' => 'Візуальні мистецтва',
            ],
            [
                'category_id' => 10,
                'name' => 'Sklepy',
                'slug' => Str::slug('Sklepy', '-'),
                'english' => 'Shops',
                'german' => 'Geschäfte',
                'spanish' => 'Tiendas',
                'ukrainian' => 'Магазини',
            ],
            [
                'category_id' => 10,
                'name' => 'Zakupy',
                'slug' => Str::slug('Zakupy', '-'),
                'english' => 'Shopping',
                'german' => 'Einkaufen',
                'spanish' => 'Compras',
                'ukrainian' => 'Покупки',
            ],
            [
                'category_id' => 10,
                'name' => 'Opisywanie produktów',
                'slug' => Str::slug('Opisywanie produktów', '-'),
                'english' => 'Describing Products',
                'german' => 'Beschreibung von Produkten',
                'spanish' => 'Descripción de productos',
                'ukrainian' => 'Опис продуктів',
            ],
            [
                'category_id' => 11,
                'name' => 'Urządzenia elektroniczne',
                'slug' => Str::slug('Urządzenia elektroniczne', '-'),
                'english' => 'Electronic Devices',
                'german' => 'Elektronische Geräte',
                'spanish' => 'Dispositivos electrónicos',
                'ukrainian' => 'Електронні пристрої',
            ],
            [
                'category_id' => 11,
                'name' => 'Media',
                'slug' => Str::slug('Media', '-'),
                'english' => 'Media',
                'german' => 'Medien',
                'spanish' => 'Medios de comunicación',
                'ukrainian' => 'Медіа',
            ],
            [
                'category_id' => 11,
                'name' => 'Internet',
                'slug' => Str::slug('Internet', '-'),
                'english' => 'Internet',
                'german' => 'Internet',
                'spanish' => 'Internet',
                'ukrainian' => 'Інтернет',
            ],
            [
                'category_id' => 12,
                'name' => 'Przywitanie',
                'slug' => Str::slug('Przywitanie', '-'),
                'english' => 'Greetings',
                'german' => 'Begrüßung',
                'spanish' => 'Saludos',
                'ukrainian' => 'Привітання',
            ],
            [
                'category_id' => 12,
                'name' => 'Pożegnanie',
                'slug' => Str::slug('Pożegnanie', '-'),
                'english' => 'Farewells',
                'german' => 'Abschied',
                'spanish' => 'Despedidas',
                'ukrainian' => 'Прощання',
            ],
            [
                'category_id' => 12,
                'name' => 'Pytania o drogę',
                'slug' => Str::slug('Pytania o drogę', '-'),
                'english' => 'Asking for Directions',
                'german' => 'Nach dem Weg fragen',
                'spanish' => 'Preguntar por direcciones',
                'ukrainian' => 'Запитання про шлях',
            ],
            [
                'category_id' => 12,
                'name' => 'Zakupy',
                'slug' => Str::slug('Zakupy', '-'),
                'english' => 'Shopping',
                'german' => 'Einkaufen',
                'spanish' => 'Compras',
                'ukrainian' => 'Покупки',
            ],
            [
                'category_id' => 13,
                'name' => 'Meble',
                'slug' => Str::slug('Meble', '-'),
                'english' => 'Furniture',
                'german' => 'Möbel',
                'spanish' => 'Muebles',
                'ukrainian' => 'Меблі',
            ],
            [
                'category_id' => 13,
                'name' => 'Pomieszczenia',
                'slug' => Str::slug('Pomieszczenia', '-'),
                'english' => 'Rooms',
                'german' => 'Räume',
                'spanish' => 'Habitaciones',
                'ukrainian' => 'Приміщення',
            ],
            [
                'category_id' => 13,
                'name' => 'Opisy mieszkania',
                'slug' => Str::slug('Opisy mieszkania', '-'),
                'english' => 'Describing a Home',
                'german' => 'Beschreibung eines Hauses',
                'spanish' => 'Describiendo una casa',
                'ukrainian' => 'Опис житла',
            ],
            [
                'category_id' => 14,
                'name' => 'Garderoba',
                'slug' => Str::slug('Garderoba', '-'),
                'english' => 'Wardrobe',
                'german' => 'Garderobe',
                'spanish' => 'Guardarropa',
                'ukrainian' => 'Гардероб',
            ],
            [
                'category_id' => 14,
                'name' => 'Ubrania',
                'slug' => Str::slug('Ubrania', '-'),
                'english' => 'Clothing',
                'german' => 'Kleidung',
                'spanish' => 'Ropa',
                'ukrainian' => 'Одяг',
            ],
            [
                'category_id' => 14,
                'name' => 'Opisywanie stylu',
                'slug' => Str::slug('Opisywanie stylu', '-'),
                'english' => 'Describing Style',
                'german' => 'Stilbeschreibung',
                'spanish' => 'Describiendo el estilo',
                'ukrainian' => 'Опис стилю',
            ],
            [
                'category_id' => 15,
                'name' => 'Wakacje',
                'slug' => Str::slug('Wakacje', '-'),
                'english' => 'Vacations',
                'german' => 'Ferien',
                'spanish' => 'Vacaciones',
                'ukrainian' => 'Відпустка',
            ],
            [
                'category_id' => 15,
                'name' => 'Święta',
                'slug' => Str::slug('Święta', '-'),
                'english' => 'Holidays',
                'german' => 'Feiertage',
                'spanish' => 'Fiestas',
                'ukrainian' => 'Свята',
            ],
            [
                'category_id' => 16,
                'name' => 'Bank',
                'slug' => Str::slug('Bank', '-'),
                'english' => 'Bank',
                'german' => 'Bank',
                'spanish' => 'Banco',
                'ukrainian' => 'Банк',
            ],
            [
                'category_id' => 16,
                'name' => 'Pieniądze',
                'slug' => Str::slug('Pieniądze', '-'),
                'english' => 'Money',
                'german' => 'Geld',
                'spanish' => 'Dinero',
                'ukrainian' => 'Гроші',
            ],
            [
                'category_id' => 17,
                'name' => 'Środki transportu',
                'slug' => Str::slug('Środki transportu', '-'),
                'english' => 'Means of Transport',
                'german' => 'Verkehrsmittel',
                'spanish' => 'Medios de Transporte',
                'ukrainian' => 'Засоби транспорту',
            ],
            [
                'category_id' => 17,
                'name' => 'Podróżowanie',
                'slug' => Str::slug('Podróżowanie', '-'),
                'english' => 'Traveling',
                'german' => 'Reisen',
                'spanish' => 'Viajar',
                'ukrainian' => 'Подорожування',
            ],
            [
                'category_id' => 17,
                'name' => 'Rozmowy w podróży',
                'slug' => Str::slug('Rozmowy w podróży', '-'),
                'english' => 'Conversations while Traveling',
                'german' => 'Unterhaltungen auf Reisen',
                'spanish' => 'Conversaciones durante el viaje',
                'ukrainian' => 'Розмови під час подорожі',
            ],
            [
                'category_id' => 18,
                'name' => 'Dni tygodnia',
                'slug' => Str::slug('Dni tygodnia', '-'),
                'english' => 'Days of the Week',
                'german' => 'Tage der Woche',
                'spanish' => 'Días de la semana',
                'ukrainian' => 'Дні тижня',
            ],
            [
                'category_id' => 18,
                'name' => 'Miesiące',
                'slug' => Str::slug('Miesiące', '-'),
                'english' => 'Months',
                'german' => 'Monate',
                'spanish' => 'Meses',
                'ukrainian' => 'Місяці',
            ],
            [
                'category_id' => 18,
                'name' => 'Pory dnia',
                'slug' => Str::slug('Pory dnia', '-'),
                'english' => 'Times of Day',
                'german' => 'Tageszeiten',
                'spanish' => 'Horas del día',
                'ukrainian' => 'Часи доби',
            ],
            [
                'category_id' => 18,
                'name' => 'Zegar',
                'slug' => Str::slug('Zegar', '-'),
                'english' => 'Clock',
                'german' => 'Uhr',
                'spanish' => 'Reloj',
                'ukrainian' => 'Годинник',
            ],
            [
                'category_id' => 19,
                'name' => 'Kraje',
                'slug' => Str::slug('Kraje', '-'),
                'english' => 'Countries',
                'german' => 'Länder',
                'spanish' => 'Países',
                'ukrainian' => 'Країни',
            ],
            [
                'category_id' => 19,
                'name' => 'Narodowości',
                'slug' => Str::slug('Narodowości', '-'),
                'english' => 'Nationalities',
                'german' => 'Nationalitäten',
                'spanish' => 'Nacionalidades',
                'ukrainian' => 'Національності',
            ],
            [
                'category_id' => 19,
                'name' => 'Kultury',
                'slug' => Str::slug('Kultury', '-'),
                'english' => 'Cultures',
                'german' => 'Kulturen',
                'spanish' => 'Culturas',
                'ukrainian' => 'Культури',
            ],
            [
                'category_id' => 20,
                'name' => 'Części ciała',
                'slug' => Str::slug('Części ciała', '-'),
                'english' => 'Body Parts',
                'german' => 'Körperteile',
                'spanish' => 'Partes del cuerpo',
                'ukrainian' => 'Частини тіла',
            ],
            [
                'category_id' => 20,
                'name' => 'Ubrania',
                'slug' => Str::slug('Ubrania', '-'),
                'english' => 'Clothing',
                'german' => 'Kleidung',
                'spanish' => 'Ropa',
                'ukrainian' => 'Одяг',
            ],
            [
                'category_id' => 20,
                'name' => 'Cechy fizyczne',
                'slug' => Str::slug('Cechy fizyczne', '-'),
                'english' => 'Physical Traits',
                'german' => 'Physische Eigenschaften',
                'spanish' => 'Características físicas',
                'ukrainian' => 'Фізичні риси',
            ],
            [
                'category_id' => 21,
                'name' => 'Zainteresowania',
                'slug' => Str::slug('Zainteresowania', '-'),
                'english' => 'Interests',
                'german' => 'Interessen',
                'spanish' => 'Intereses',
                'ukrainian' => 'Зацікавлення',
            ],
            [
                'category_id' => 21,
                'name' => 'Hobby',
                'slug' => Str::slug('Hobby', '-'),
                'english' => 'Hobbies',
                'german' => 'Hobbys',
                'spanish' => 'Aficiones',
                'ukrainian' => 'Хобі',
            ],
            [
                'category_id' => 21,
                'name' => 'Czas wolny',
                'slug' => Str::slug('Czas wolny', '-'),
                'english' => 'Free Time',
                'german' => 'Freizeit',
                'spanish' => 'Tiempo libre',
                'ukrainian' => 'Вільний час',
            ],
            [
                'category_id' => 22,
                'name' => 'Sprzątanie',
                'slug' => Str::slug('Sprzątanie', '-'),
                'english' => 'Cleaning',
                'german' => 'Reinigen',
                'spanish' => 'Limpieza',
                'ukrainian' => 'Прибирання',
            ],
            [
                'category_id' => 22,
                'name' => 'Gotowanie',
                'slug' => Str::slug('Gotowanie', '-'),
                'english' => 'Cooking',
                'german' => 'Kochen',
                'spanish' => 'Cocinar',
                'ukrainian' => 'Готування',
            ],
            [
                'category_id' => 22,
                'name' => 'Opieka nad domem',
                'slug' => Str::slug('Opieka nad domem', '-'),
                'english' => 'Home Care',
                'german' => 'Hauspflege',
                'spanish' => 'Cuidado del hogar',
                'ukrainian' => 'Догляд за домом',
            ],
            [
                'category_id' => 23,
                'name' => 'Wydarzenia społeczne',
                'slug' => Str::slug('Wydarzenia społeczne', '-'),
                'english' => 'Social Events',
                'german' => 'Gesellschaftliche Ereignisse',
                'spanish' => 'Eventos sociales',
                'ukrainian' => 'Суспільні події',
            ],
            [
                'category_id' => 23,
                'name' => 'Spotkania towarzyskie',
                'slug' => Str::slug('Spotkania towarzyskie', '-'),
                'english' => 'Social Meetings',
                'german' => 'Soziale Treffen',
                'spanish' => 'Encuentros sociales',
                'ukrainian' => 'Суспільні зустрічі',
            ],
            [
                'category_id' => 23,
                'name' => 'Życie społeczne',
                'slug' => Str::slug('Życie społeczne', '-'),
                'english' => 'Social Life',
                'german' => 'Gesellschaftliches Leben',
                'spanish' => 'Vida social',
                'ukrainian' => 'Соціальне життя',
            ],
        ];


        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->insert([
                'category_id' => $subcategory['category_id'],
                'name' => $subcategory['name'],
                'slug' => $subcategory['slug'],
                'english' => $subcategory['english'],
                'german' => $subcategory['german'],
                'spanish' => $subcategory['spanish'],
                'ukrainian' => $subcategory['ukrainian'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
