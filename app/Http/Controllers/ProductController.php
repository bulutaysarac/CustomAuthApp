<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('store');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Product::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }
}
