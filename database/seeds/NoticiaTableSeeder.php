<?php

use Illuminate\Database\Seeder;

class NoticiaTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('noticia')->insert([
            'id_noticia' => 1,
            'titulo' => 'Timex Marlin',
        	'fecha_publicacion' => date('Y-m-d H:i:s'),
            'contenido' => 'Sere el primero en admitir que los relojes de vestir no es algo que me atraiga. De hecho, hoy en día hay muchas opciones que pueden servir a un entusiasta de los relojes de múltiples maneras. Su Omega Speedmaster promedio, por ejemplo, puede asumir tareas de relojería mientras que también sirve como una opción de uso diario muy capaz. Sin embargo, el año pasado noté un pequeño cambio en la forma en que una marca en particular comenzó a posicionar sus lanzamientos y Timex, la marca estadounidense que nos robó nuestros corazones durante la infancia, comenzó a seducirnos con los relanzamientos de clásicos y las versiones modernas. De sus diseños más populares. El modelo más impresionante es el primer lanzamiento totalmente mecánico de la marca desde 1982, y se le conoce simplemente como Timex Marlin. Como parte de la nueva serie Archive de la marca, la reedición de Timex Marlin no solo demostró ser un reloj de vestir capaz, sino también un reloj barato y accesible con la capacidad de atraer nuevos y entusiastas entusiastas de los relojes.',
            'imagen' => 'timex-merlin.jpg',
            'id_categoria' => 1,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('noticia')->insert([
            'id_noticia' => 2,
            'titulo' => 'Bulova Pilot',
        	'fecha_publicacion' => date('Y-m-d H:i:s'),
            'contenido' => 'El histórico Reloj de la Luna de Bulova tiene una historia larga y fascinante, aunque un tanto complicada. El reloj fue hecho para el astronauta David Scott, quien lo usó en la misión Apollo 15. Su reloj apareció en 2015, y más tarde ese año se vendió por el precio de us$ 1,300,000 en una subasta. El año pasado, el colaborador de Worn & Wound Hung Doan hizo una profunda inmersión en el reloj.',
            'imagen' => 'bulova-pilot.jpg',
            'id_categoria' => 1,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
        DB::table('noticia')->insert([
            'id_noticia' => 3,
            'titulo' => 'Hamilton Interstellar',
        	'fecha_publicacion' => date('Y-m-d H:i:s'),
            'contenido' => 'El nombre completo de este reloj Hamilton Interstellar es bastante largo: en realidad es Khaki Aviation Pilot Day Date H64615135 (tomado del sitio web de Hamilton) pero es más conocido simplemente como Hamilton Khaki Pilot o Khaki Aviation. Lo lleva Matthew McConaughey en la película de ciencia ficción "Interstellar". Hamilton seguro que sabe cómo comercializar sus relojes asociándose con estudios de cine.',
            'imagen' => 'hamilton-interstellar.png',
            'id_categoria' => 3,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('noticia')->insert([
            'id_noticia' => 4,
            'titulo' => '¿Porqué los relojes Rolex son tan caros?',
        	'fecha_publicacion' => date('Y-m-d H:i:s'),
            'contenido' => 'Ocurre con casi todo lo que se encuentra en el mercado bajo la etiqueta de “lujo”, ¿por qué demonios es tan caro? En el caso de los relojes Rolex, muchos se habrán preguntado a qué se deben esos precios inalcanzables para la gran mayoría de personas. Al fin y al cabo, es solo un reloj, ¿verdad? Rolex es probablemente la marca de relojes de lujo más famosa del mundo. La compañía con sede en Suiza ha logrado crear a lo largo del tiempo uno de esos productos que se asocian con el éxito y, principalmente, con el dinero, mucho dinero. ¿Está justificado su precio?  La complejidad que acompaña a la fabricación de cada unidad, con todo tipo de detalles únicos, es una señal distintiva. En su interior: una pequeña obra de arte que comprende cientos o incluso miles de piezas individuales.Es probable que sea difícil encontrar otro producto con el mismo nivel de calidad en cada pieza. La compañía tiende a producir relojes mecánicos que, por su propia naturaleza, consumen mucho tiempo.',
            'imagen' => 'rolex-porque-tan-caros.jpg',
            'id_categoria' => 5,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('noticia')->insert([
            'id_noticia' => 5,
            'titulo' => 'Nuevo Longines Big Eye',
        	'fecha_publicacion' => date('Y-m-d H:i:s'),
            'contenido' => 'Cuando Longines anunció el Legend Diver en 2007, se encontraban entre las primeras marcas de renombre en la tendencia de producir relojes deportivos inspirados en la época que se propusieron capturar el atractivo de los modelos antiguos al tiempo que ofrecían los beneficios de la producción moderna. Diez años más tarde, la marca ha producido una serie de modelos de este tipo y continúa ofreciendo una versión del Legend Diver. Para sumarse a las filas exitosas del COSD, el Heritage Chronograph 1967, el Legend Diver y el encantador Heritage 1945 (por nombrar solo algunos), Longines anunció recientemente el Avigation BigEye Chronograph. Un cronógrafo de acero bastante guapo con una estética de inspiración militar antigua, BigEye intenta recrear la combinación de atractivo y ejecución que hizo que el Legend Diver fuera un éxito.',
            'imagen' => 'longines-big-eye.jpg',
            'id_categoria' => 5,
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
    }

}
