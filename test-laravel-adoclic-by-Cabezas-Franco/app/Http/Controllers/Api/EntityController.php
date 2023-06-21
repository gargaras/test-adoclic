<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Resources\EntityResource;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Entity;
use App\Models\Category;

class EntityController extends Controller
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getEntitiesByCategory($category)
    {
        $this->apiService->fetchEntities();

        $categoryId = Category::where('category', $category)->value('id');

        if ($categoryId) {
            $entities = Entity::where('category_id', $categoryId)->get();

            return response()->json([
                'success' => true,
                'data' => EntityResource::collection($entities),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found.',
            ], 404);
        }
    }    
}
