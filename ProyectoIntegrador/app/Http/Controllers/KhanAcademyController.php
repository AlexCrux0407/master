<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KhanAcademyController extends Controller
{
    protected $baseUrl = 'https://www.khanacademy.org/api/internal/';
    protected $graphqlEndpoint = 'https://www.khanacademy.org/api/internal/graphql';

    /**
     * Obtener temas de Khan Academy
     */
    public function getTopics()
    {
        try {
            // Consulta GraphQL para obtener temas
            $query = '
            {
              topicsList {
                id
                slug
                title
                description
                children {
                  id
                  slug
                  title
                }
              }
            }
            ';

            $response = Http::post($this->graphqlEndpoint, [
                'query' => $query
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('khan-academy.topics', [
                    'topics' => $data['data']['topicsList'] ?? [],
                    'error' => null
                ]);
            } else {
                Log::error('Error en la API de Khan Academy: ' . $response->status() . ' - ' . $response->body());
                return view('khan-academy.topics', [
                    'topics' => [],
                    'error' => 'Error al obtener datos de Khan Academy (' . $response->status() . ')'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Excepción al llamar a la API de Khan Academy: ' . $e->getMessage());
            return view('khan-academy.topics', [
                'topics' => [],
                'error' => 'No se pudo conectar con Khan Academy: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Obtener ejercicios de Khan Academy
     */
    public function getExercises()
    {
        try {
            // Consulta GraphQL para obtener ejercicios (enfocado en matemáticas)
            $query = '
            {
              topicById(id: "math") {
                id
                title
                children {
                  id
                  title
                  description
                  slug
                  exercises {
                    id
                    title
                    description
                    url
                    difficulty
                  }
                }
              }
            }
            ';

            $response = Http::post($this->graphqlEndpoint, [
                'query' => $query
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('khan-academy.exercises', [
                    'exercises' => $data['data']['topicById']['children'] ?? [],
                    'error' => null
                ]);
            } else {
                Log::error('Error en la API de Khan Academy (Ejercicios): ' . $response->status() . ' - ' . $response->body());
                return view('khan-academy.exercises', [
                    'exercises' => [],
                    'error' => 'Error al obtener ejercicios de Khan Academy (' . $response->status() . ')'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Excepción al obtener ejercicios de Khan Academy: ' . $e->getMessage());
            return view('khan-academy.exercises', [
                'exercises' => [],
                'error' => 'No se pudo conectar con Khan Academy: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Obtener información de un video específico
     */
    public function getVideos(Request $request, $videoId)
    {
        try {
            // Consulta GraphQL para obtener detalles del video
            $query = '
            {
              videoById(id: "' . $videoId . '") {
                id
                title
                description
                youtubeId
                durationSeconds
                downloadUrls
                relatedVideos {
                  id
                  title
                  thumbnailUrl
                }
              }
            }
            ';

            $response = Http::post($this->graphqlEndpoint, [
                'query' => $query
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('khan-academy.video', [
                    'video' => $data['data']['videoById'] ?? [],
                    'error' => null
                ]);
            } else {
                Log::error('Error en la API de Khan Academy (Video): ' . $response->status() . ' - ' . $response->body());
                return view('khan-academy.video', [
                    'video' => [],
                    'error' => 'Error al obtener el video de Khan Academy (' . $response->status() . ')'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Excepción al obtener video de Khan Academy: ' . $e->getMessage());
            return view('khan-academy.video', [
                'video' => [],
                'error' => 'No se pudo conectar con Khan Academy: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Obtener perfil de usuario
     */
    public function getUserProfile(Request $request)
    {
        $username = $request->input('username');

        if (empty($username)) {
            return view('khan-academy.user-profile', [
                'profile' => [],
                'error' => null
            ]);
        }

        try {
            // Consulta GraphQL para obtener el perfil de usuario
            $query = '
            {
              userByUsername(username: "' . $username . '") {
                id
                kaid
                username
                nickname
                bio
                points
                avatarSrc
                dateJoined
                countVideosCompleted
                badges {
                  id
                  description
                  iconSrc
                }
              }
            }
            ';

            $response = Http::post($this->graphqlEndpoint, [
                'query' => $query
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('khan-academy.user-profile', [
                    'profile' => $data['data']['userByUsername'] ?? [],
                    'error' => null
                ]);
            } else {
                Log::error('Error en la API de Khan Academy (Perfil): ' . $response->status() . ' - ' . $response->body());
                return view('khan-academy.user-profile', [
                    'profile' => [],
                    'error' => 'Error al obtener el perfil de Khan Academy (' . $response->status() . ')'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Excepción al obtener perfil de Khan Academy: ' . $e->getMessage());
            return view('khan-academy.user-profile', [
                'profile' => [],
                'error' => 'No se pudo conectar con Khan Academy: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Método alternativo: Obtener contenido incrustado de Khan Academy
     * 
     * Esta función proporciona una alternativa cuando la API no está disponible
     */
    public function getEmbeddedContent()
    {
        // Datos de ejemplo con enlaces directos a YouTube
        $embeddedContent = [
            [
                'title' => 'Álgebra Básica',
                'embed_url' => 'https://www.youtube.com/embed/NRB6s77nx5o',
                'topic' => 'Matemáticas',
                'ka_url' => 'https://www.khanacademy.org/math/algebra-basics'
            ],
            [
                'title' => 'Introducción a la Biología Celular',
                'embed_url' => 'https://www.youtube.com/embed/URUJD5NEXC8',
                'topic' => 'Biología',
                'ka_url' => 'https://www.khanacademy.org/science/biology'
            ],
            [
                'title' => 'Física: Leyes de Newton',
                'embed_url' => 'https://www.youtube.com/embed/BpXIXCT7X_s',
                'topic' => 'Física',
                'ka_url' => 'https://www.khanacademy.org/science/physics'
            ],
            [
                'title' => 'Introducción a la Economía',
                'embed_url' => 'https://www.youtube.com/embed/vU0w4P42v0A',
                'topic' => 'Economía',
                'ka_url' => 'https://www.khanacademy.org/economics-finance-domain'
            ]
        ];

        return view('khan-academy.embedded', ['content' => $embeddedContent]);
    }
}