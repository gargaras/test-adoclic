<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Entity;
use Illuminate\Support\Facades\Http;
use App\Services\LoggerService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ApiService
{
    // protected $logger;

    // public function __construct(LoggerService $logger)
    // {
    //     $this->logger = $logger;
    // }

    public function fetchEntities()
    {
        $response = Http::get('https://api.publicapis.org/entries');
        $data = $response->json();
        $entities = [];
    
        foreach ($data['entries'] as $entry) {
            // Aca podria hacer una funcion para hacer mas general las categorias
            if ($entry['Category'] === 'Animals' || $entry['Category'] === 'Security') {
                $entities[] = [
                    'api' => $entry['API'],
                    'description' => $entry['Description'],
                    'link' => $entry['Link'],
                    'category_id' => Category::where('category', $entry['Category'])->value('id'),
                ];
            }
        }
        $existingEntities = Entity::whereIn('api', array_column($entities, 'api'))->count();

        if ($existingEntities === 0) {
            Entity::insert($entities);
        }
        // para hacer este ejercicio mas completo guardo en la bd y tomo de alli la info
        return $entities;
    }
}
