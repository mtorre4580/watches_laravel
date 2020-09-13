<?php

use Illuminate\Database\Seeder;

class MarcaTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('marca')->insert([
            'id_marca' => 1,
            'nombre' => 'Audemars Piguet',
            'historia' => 'Los relojes de ultra lujo de Piguet son de los modelos más auténticos en el mercado. Fundada en 1875 por Jules-Louis Audemars y Edward-Auguste Piguet, esta marca produce un promedio de 36 mil relojes al año. Además de sus diseños y mecanismos, Audemars Piguet pasó a la historia como la marca creadora de los relojes de acero deportivos de lujo. También fueron pioneros en los relojes oversize con el Royal Oak Offshore.',
            'logo' => 'Audemars_Piguet.png',
            'web' => 'https://www.audemarspiguet.com/es',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 2,
            'nombre' => 'Vacheron Constantin',
            'historia' => 'Vacheron Constantin es una de las marcas más antiguas de relojes de lujo, fundada en 1755 por Jean-Marc Vacheron en Ginebra. Sus relojes reflejan a la perfección los más de 200 años de herencia, con detalles fascinantes de precisión junto a formas tradicionales y llenas de estilo. Napoleón Bonaparte fue fan de esta marca.',
            'logo' => 'Vacheron_Constantin.png',
            'web' => 'http://www.vacheron-constantin.com/en2/home.html',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 3,
            'nombre' => 'Patek Philippe',
            'historia' => 'Otra marca suiza, esta fue fundada en 1851 y ha lanzado al mercado algunos de los mecanismos más complicados en la historia de la relojería. Con una marcada línea clásica, los Patek Philippe han sido de los favoritos de la realeza europea durante años.',
            'logo' => 'Patek_Philippe.png',
            'web' => 'https://www.patek.com/es/coleccion/nuevos-modelos-2018',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 4,
            'nombre' => 'Blancpain',
            'historia' => 'Ahora una subsidiaria del Grupo Swatch, Blancpain es una de las marcas de lujo pioneras en diseño. Fundada en 1735 (una de las más antiguas, también), tuvo su mayor auge durante el siglo XIX, modernizando su producción e innovando en sus mecanismos. La marca tiene una variedad impresionante de modelos que van desde el minimalismo contemporáneo hasta piezas sumamente elaboradas que nos recuerdan un reloj de bolsillo del siglo XVIII.',
            'logo' => 'BLANC_PAIN.svg',
            'web' => 'https://www.blancpain.com/es',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 5,
            'nombre' => 'Chopard',
            'historia' => 'Chopard no sólo es conocida por sus relojes suizos, sino también por sus increíbles piezas de joyería. La casa fue fundada en 1860 por Louis-Ulysse Chopard, un relojero suizo, y sus relojes son fáciles de identificar por su look clásico y la atención de los detalles que ponen en ellos. Chopard fusiona tecnología de punto con fabricación artesanal que resulta en modelos sofisticados para gustos exquisitos.',
            'logo' => 'Chopard.jpg',
            'web' => 'https://www.chopard.com/intl/',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 6,
            'nombre' => 'IWC Schaffhausen',
            'historia' => 'Fundada en 1868, esta marca se especializa en relojes suizos premium, combinando ingeniería de precisión con diseños exclusivos. Sus relojes se identifican por su forma clásica y sus materiales de calidad superior.',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 7,
            'nombre' => 'Rolex',
            'historia' => 'Rolex es la marca en la que todos pensamos cuando nos dicen relojes de lujo, y la fama no ha sido gratuita. Premiada por sus formas eternas y su funcionalidad, los Rolex siguen siendo relevantes en todo el mundo. Sus orígenes británicos siguen presentes en todos sus diseños y es la marca que más relojes produce, 2 mil al día.',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 8,
            'nombre' => 'Ulysse Nardin',
            'historia' => 'Una marca que no ha dejado de sorprendernos desde su creación en 1846, Ulysse Nardin se especializa en relojes de muñeca, plumas y accesorios con un distintivo visual que sigue conquistando al mundo.',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 9,
            'nombre' => 'Jaeger-LeCoultre',
            'historia' => 'La fascinación de esta marca de lujo suiza es sorprender al mundo con carátulas únicas de complejo diseño, manteniendo los estándares originales desde que fue creada en 1833. Los elementos clásicos de estos relojes son particularmente atractivos porque jamás pasan de moda. Un Jaeger-LeCoultre siempre será una excelente inversión.',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('marca')->insert([
            'id_marca' => 10,
            'nombre' => 'Panerai',
            'historia' => 'Fundada en 1860, esta es una de las marcas italianas más reconocidas en el mundo. Son conocidos por sus diseños arriesgados y la simpleza de sus diseños.',
            'origen' => 'Suiza',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
