<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'nombre' => 'CanchaFutbol',
                'estado' => 'Activo',
                'descripcion' => 'Cancha de fútbol para partidos y entrenamientos.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CanchaBaloncesto',
                'estado' => 'Activo',
                'descripcion' => 'Cancha de baloncesto para partidos y prácticas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'ClubTenis',
                'estado' => 'Activo',
                'descripcion' => 'Club de tenis con varias pistas para socios.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'PiscinaNatacion',
                'estado' => 'Activo',
                'descripcion' => 'Piscina para nadar y actividades acuáticas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'PistaAtletismo',
                'estado' => 'Activo',
                'descripcion' => 'Pista de atletismo para entrenamientos y competiciones.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CanchaVoleibol',
                'estado' => 'Activo',
                'descripcion' => 'Cancha de voleibol para partidos y prácticas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'PistaHockey',
                'estado' => 'Activo',
                'descripcion' => 'Pista de hockey para partidos y entrenamientos.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CampoBeisbol',
                'estado' => 'Activo',
                'descripcion' => 'Campo de béisbol para partidos y entrenamientos.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CampoCricket',
                'estado' => 'Activo',
                'descripcion' => 'Campo de cricket para partidos y prácticas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CampoGolf',
                'estado' => 'Activo',
                'descripcion' => 'Campo de golf con varios hoyos y greens.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'ZonaPingPong',
                'estado' => 'Activo',
                'descripcion' => 'Zona de ping pong para jugar con amigos.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CentroBadminton',
                'estado' => 'Activo',
                'descripcion' => 'Centro de badminton con varias pistas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'DojoArtesMarciales',
                'estado' => 'Activo',
                'descripcion' => 'Dojo de artes marciales para entrenar y aprender.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'EstudioGimnasia',
                'estado' => 'Activo',
                'descripcion' => 'Estudio de gimnasia para ejercicios y clases.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'ParqueSkateboarding',
                'estado' => 'Activo',
                'descripcion' => 'Parque para practicar skateboarding y patinaje.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'ParedEscalada',
                'estado' => 'Activo',
                'descripcion' => 'Pared de escalada para escalar y entrenar.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CampoTiroArco',
                'estado' => 'Activo',
                'descripcion' => 'Campo de tiro con arco para practicar puntería.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CanchaSquash',
                'estado' => 'Activo',
                'descripcion' => 'Cancha de squash para partidos y prácticas.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'CanchaRugby',
                'estado' => 'Activo',
                'descripcion' => 'Cancha de rugby para partidos y entrenamientos.',
                'tipo' => $this->getRandomTipo(),
            ],
            [
                'nombre' => 'PistaCorrer',
                'estado' => 'Activo',
                'descripcion' => 'Pista para correr y hacer ejercicio al aire libre.',
                'tipo' => $this->getRandomTipo(),
            ],
        ];

        DB::table('areas')->insert($areas);
    }

    private function getRandomTipo()
    {
        $tipos = ['Area común', 'Area Deportiva'];
        return $tipos[array_rand($tipos)];
    }
}
