<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'code' => 'fotaka-alcantarilla-f135-4eec-8423-c964cfaf10da',
            'question_number' => 'q1',
            'store' => 'Fotaka Alcantarilla',
            'map_url' => 'https://goo.gl/maps/UKLD8dFNFAX5bAsJ8',
            'title' => 'Pregunta Fotaka Alcantarilla',
            'question' => '¿Cuántos fantasmas blancos hay encima de la maleta?',
            'answer_1' => '3',
            'answer_2' => '6',
            'answer_3' => '9',
            'correct_answer' => 'answer_1',
        ]);

        Quiz::create([
            'code' => 'basica-ferreteria-servicios-b3cc-40ed-8fde-95b7a1c5a09b',
            'question_number' => 'q2',
            'store' => 'Básica Ferretería y Servicios',
            'map_url' => 'https://g.page/FerreteriaBasica?share',
            'title' => 'Pregunta Básica Ferretería y Servicios',
            'question' => '¿Cuántos cuervos han robado una llave de ferretería Básica?',
            'answer_1' => '4',
            'answer_2' => '6',
            'answer_3' => '9',
            'correct_answer' => 'answer_1',
        ]);

        Quiz::create([
            'code' => 'kris-moda-intima-ba78-48f4-acf3-26709bf74c23',
            'question_number' => 'q3',
            'store' => 'Kris\'S Moda Íntima',
            'map_url' => 'https://goo.gl/maps/K3cQi7Py1Z5Qstyq7',
            'title' => 'Pregunta Kris\'S Moda Íntima',
            'question' => 'Cuenta cuenta y sabrás, ¿cuántos leggings hay en este lugar?',
            'answer_1' => '5',
            'answer_2' => '9',
            'answer_3' => '14',
            'correct_answer' => 'answer_3',
        ]);

        Quiz::create([
            'code' => 'sanz-zapatos-0569-4375-8eb7-af5913c2bc5a',
            'question_number' => 'q4',
            'store' => 'Sanz Zapatos',
            'map_url' => 'https://goo.gl/maps/1WcnuXZ1AshpWF9A8',
            'title' => 'Pregunta Sanz Zapatos',
            'question' => '¿cuántas brujas hay en este escaparate?',
            'answer_1' => '1',
            'answer_2' => '3',
            'answer_3' => '7',
            'correct_answer' => 'answer_2',
        ]);

        Quiz::create([
            'code' => 'centro-estetica-caresse-bfa6-4118-9a0c-23b6132a37d5',
            'question_number' => 'q5',
            'store' => 'Centro de Estética Caresse',
            'map_url' => 'https://goo.gl/maps/5nEs1gUfyJ2WV7B47',
            'title' => 'Pregunta Centro de Estética Caresse',
            'question' => '¿Cuántos gorros de brujas vuelan en el escaparate?',
            'answer_1' => '1',
            'answer_2' => '2',
            'answer_3' => '3',
            'correct_answer' => 'answer_3',
        ]);

        Quiz::create([
            'code' => 'mariano-cano-0950-4781-a89f-287c3a234f60',
            'question_number' => 'q6',
            'store' => 'Mariano Cano',
            'map_url' => 'https://goo.gl/maps/qNWHeP8iCKVvX2T67',
            'title' => 'Pregunta Mariano Cano',
            'question' => '¿cuántas patas tienen las arañas terroríficas del escaparate?',
            'answer_1' => '3',
            'answer_2' => '5',
            'answer_3' => '8',
            'correct_answer' => 'answer_3',
        ]);

        Quiz::create([
            'code' => 'veronica-ballester-f81a-4c49-87fa-668d8ca484a4',
            'question_number' => 'q7',
            'store' => 'Verónica Ballesta Láser y Estética',
            'map_url' => 'https://www.facebook.com/veronicaballestalaseryestetica/',
            'title' => 'Pregunta Verónica Ballesta Láser y Estética',
            'question' => '¿Cuántas momias hay en el escaparate?',
            'answer_1' => '0',
            'answer_2' => '1',
            'answer_3' => '2',
            'correct_answer' => 'answer_2',
        ]);

        Quiz::create([
            'code' => 'audio-optica-caride-112c-40b5-af2c-8ae151432180',
            'question_number' => 'q8',
            'store' => 'Audio Óptica Caride',
            'map_url' => 'https://g.page/opticacaride?share',
            'title' => 'Pregunta Audio Óptica Caride',
            'question' => '¿Cuántas manos ensangrentadas hay en el escaparate?',
            'answer_1' => '1',
            'answer_2' => '6',
            'answer_3' => '9',
            'correct_answer' => 'answer_2',
        ]);
    }
}
