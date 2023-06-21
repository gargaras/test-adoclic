<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Entity;
use App\Models\Category;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function fetchEntitiesByCategory(Request $request, $category)
    {
        // Llama a un método del servicio ApiService para obtener las entidades por categoría
        $entities = $this->apiService->fetchEntities();

        $category = Category::where('category', $category)->first();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $entities = $category->entities;

        $formattedEntities = [];
        foreach ($entities as $entity) {
            $formattedEntities[] = [
                'api' => $entity->api,
                'description' => $entity->description,
                'link' => $entity->link,
                'category' => [
                    'id' => $entity->category_id,
                    'category' => $entity->category->category,
                ],
            ];
        }

        $responseData = [
            'success' => true,
            'data' => $formattedEntities,
        ];

        return response()->json($responseData);
    }
}
