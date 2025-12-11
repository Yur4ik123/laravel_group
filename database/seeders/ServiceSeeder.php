<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $forWoman = \App\Models\Category::where('slug', 'for-woman')->first();
        $forMan = \App\Models\Category::where('slug', 'for-man')->first();

        // Послуги для жінок
        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'womens-haircut',
            'price' => 450.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Жіноча стрижка',
                'description' => 'Професійна жіноча стрижка з урахуванням типу обличчя та структури волосся'
            ],
            'ru' => [
                'name' => 'Женская стрижка',
                'description' => 'Профессиональная женская стрижка с учетом типа лица и структуры волос'
            ],
            'en' => [
                'name' => 'Women\'s Haircut',
                'description' => 'Professional women\'s haircut taking into account face type and hair structure'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'hair-coloring',
            'price' => 1200.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Фарбування волосся',
                'description' => 'Професійне фарбування волосся якісними фарбами з попереднім консультуванням'
            ],
            'ru' => [
                'name' => 'Окрашивание волос',
                'description' => 'Профессиональное окрашивание волос качественными красками с предварительной консультацией'
            ],
            'en' => [
                'name' => 'Hair Coloring',
                'description' => 'Professional hair coloring with quality dyes and preliminary consultation'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'manicure',
            'price' => 350.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Манікюр',
                'description' => 'Класичний або апаратний манікюр з покриттям гель-лаком'
            ],
            'ru' => [
                'name' => 'Маникюр',
                'description' => 'Классический или аппаратный маникюр с покрытием гель-лаком'
            ],
            'en' => [
                'name' => 'Manicure',
                'description' => 'Classic or hardware manicure with gel polish coating'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'pedicure',
            'price' => 450.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Педикюр',
                'description' => 'Класичний педикюр з обробкою стоп та покриттям'
            ],
            'ru' => [
                'name' => 'Педикюр',
                'description' => 'Классический педикюр с обработкой стоп и покрытием'
            ],
            'en' => [
                'name' => 'Pedicure',
                'description' => 'Classic pedicure with foot treatment and coating'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'hair-styling',
            'price' => 600.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Укладка волосся',
                'description' => 'Професійна укладка волосся для будь-якого випадку'
            ],
            'ru' => [
                'name' => 'Укладка волос',
                'description' => 'Профессиональная укладка волос для любого случая'
            ],
            'en' => [
                'name' => 'Hair Styling',
                'description' => 'Professional hair styling for any occasion'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'makeup',
            'price' => 800.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Макіяж',
                'description' => 'Професійний макіяж: денний, вечірній або весільний'
            ],
            'ru' => [
                'name' => 'Макияж',
                'description' => 'Профессиональный макияж: дневной, вечерний или свадебный'
            ],
            'en' => [
                'name' => 'Makeup',
                'description' => 'Professional makeup: day, evening or bridal'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'facial-massage',
            'price' => 550.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Масаж обличчя',
                'description' => 'Розслаблюючий та омолоджуючий масаж обличчя'
            ],
            'ru' => [
                'name' => 'Массаж лица',
                'description' => 'Расслабляющий и омолаживающий массаж лица'
            ],
            'en' => [
                'name' => 'Facial Massage',
                'description' => 'Relaxing and rejuvenating facial massage'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'facial-cleansing',
            'price' => 650.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Чистка обличчя',
                'description' => 'Глибоке очищення шкіри обличчя з використанням професійних засобів'
            ],
            'ru' => [
                'name' => 'Чистка лица',
                'description' => 'Глубокая очистка кожи лица с использованием профессиональных средств'
            ],
            'en' => [
                'name' => 'Facial Cleansing',
                'description' => 'Deep cleansing of facial skin using professional products'
            ],
        ]);

        Service::create([
            'category_id' => $forWoman->id,
            'slug' => 'waxing',
            'price' => 400.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Епіляція воском',
                'description' => 'Видалення небажаного волосся воском на обраній зоні'
            ],
            'ru' => [
                'name' => 'Эпиляция воском',
                'description' => 'Удаление нежелательных волос воском на выбранной зоне'
            ],
            'en' => [
                'name' => 'Waxing',
                'description' => 'Unwanted hair removal with wax on selected area'
            ],
        ]);

        // Послуги для чоловіків
        Service::create([
            'category_id' => $forMan->id,
            'slug' => 'mens-haircut',
            'price' => 300.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Чоловіча стрижка',
                'description' => 'Стильна чоловіча стрижка від досвідченого майстра'
            ],
            'ru' => [
                'name' => 'Мужская стрижка',
                'description' => 'Стильная мужская стрижка от опытного мастера'
            ],
            'en' => [
                'name' => 'Men\'s Haircut',
                'description' => 'Stylish men\'s haircut from experienced master'
            ],
        ]);

        Service::create([
            'category_id' => $forMan->id,
            'slug' => 'beard-trim',
            'price' => 200.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Стрижка бороди',
                'description' => 'Моделювання та стрижка бороди за бажаною формою'
            ],
            'ru' => [
                'name' => 'Стрижка бороды',
                'description' => 'Моделирование и стрижка бороды по желаемой форме'
            ],
            'en' => [
                'name' => 'Beard Trim',
                'description' => 'Beard modeling and trimming to desired shape'
            ],
        ]);

        Service::create([
            'category_id' => $forMan->id,
            'slug' => 'shaving',
            'price' => 250.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Гоління',
                'description' => 'Класичне гоління небезпечною бритвою з догляд за шкірою'
            ],
            'ru' => [
                'name' => 'Бритье',
                'description' => 'Классическое бритье опасной бритвой с уходом за кожей'
            ],
            'en' => [
                'name' => 'Shaving',
                'description' => 'Classic straight razor shave with skin care'
            ],
        ]);

        Service::create([
            'category_id' => $forMan->id,
            'slug' => 'mens-manicure',
            'price' => 250.00,
            'images' => 'default.jpg',
            'uk' => [
                'name' => 'Чоловічий манікюр',
                'description' => 'Догляд за нігтями та шкірою рук для чоловіків'
            ],
            'ru' => [
                'name' => 'Мужской маникюр',
                'description' => 'Уход за ногтями и кожей рук для мужчин'
            ],
            'en' => [
                'name' => 'Men\'s Manicure',
                'description' => 'Nail and hand skin care for men'
            ],
        ]);
    }
}
