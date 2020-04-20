<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");

        DB::table('quotes')->truncate();
        DB::table('tags')->truncate();
        DB::table('quote_tag')->truncate();

        DB::table('quotes')->insert([
            [ 'author_name' => 'Дмитрий', 'text' => 'xxx: А, на кладбище ходить можно из-за карантина? yyy: Можно, но там самоизоляцию соблюдают строго... ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Алена', 'text' => 'Позвонила домработница. Теперь будет работать из дома по телефону, будет говорить, что я должен делать.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Настя', 'text' => 'Оказывается 1 кг риса - это 1.675.374 рисинок! Сахар чуть позже скину.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Оксана', 'text' => 'Как то забавно получилось: вирус привезли богатые на самолётах, а расплачиваться как всегда бедным?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Никита', 'text' => 'когда одна обезьяна взяла палку работать пришлось другой обезьяне ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Денис', 'text' => 'Какую максимально возможную социальную дистанцию может обеспечить Горыныч между тремя своими головами, если у него все шеи одинаковой длины в Х метров?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Алиса', 'text' => 'Сколько уже бьются над вакциной, а ВОЗ (Всемирная орг. здр.) и ныне там. ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Анна', 'text' => 'Атака планеты Нибиру откладывается до конца карантина? ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Кот', 'text' => 'Да, собаки теперь нагуляются всласть - пока каждый член семьи не погуляет, собаку в дом не впускать! ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Пес', 'text' => 'Час Земли - это, конечно, хорошая акция. Но коронавирус сделал в миллионы раз больше для экологии, чем любой гринпис. ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Мышь', 'text' => 'Этот вирус из-за того что Microsoft прекратила поддержку Windows 7. На ней походу наша планета работала ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'author_name' => 'Бегемот', 'text' => 'Отвечаю, эта VR версия Plague inc просто о*уенна. Но я чета никак с интерфейсом не разберусь, подскажите как из нее выйти? ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
        ]);

        DB::table('quote_tag')->insert([
            [ 'quote_id' => 1, 'tag_id' => 1 ],
            [ 'quote_id' => 1, 'tag_id' => 4 ],
            [ 'quote_id' => 2, 'tag_id' => 2 ],
            [ 'quote_id' => 3, 'tag_id' => 3 ],
            [ 'quote_id' => 4, 'tag_id' => 1 ],
            [ 'quote_id' => 4, 'tag_id' => 2 ],
            [ 'quote_id' => 4, 'tag_id' => 3 ],
            [ 'quote_id' => 5, 'tag_id' => 5 ],
            [ 'quote_id' => 6, 'tag_id' => 6 ],
            [ 'quote_id' => 7, 'tag_id' => 2 ],
            [ 'quote_id' => 7, 'tag_id' => 3 ],
            [ 'quote_id' => 8, 'tag_id' => 2 ],
            [ 'quote_id' => 9, 'tag_id' => 8 ],
            [ 'quote_id' => 10, 'tag_id' => 9 ],
            [ 'quote_id' => 11, 'tag_id' => 10 ],
            [ 'quote_id' => 12, 'tag_id' => 3 ],
        ]);

        DB::table('tags')->insert([
            [ 'name' => 'Юмор', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Смех', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Прикол', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'История', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Рофл', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Культура', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Актуально', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'ТВ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Ужасы', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'Прочее', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]
        ]);
    }
}
