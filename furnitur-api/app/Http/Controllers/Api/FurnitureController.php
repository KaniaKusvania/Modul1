<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FurnitureController extends Controller
{
    // List all furniture
    public function index()
    {
        $furniture = Furniture::all();
        return response()->json(['success' => true, 'data' => $furniture]);
    }

    // Store new furniture
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/furniture');
        }

        $furniture = Furniture::create([
            'name'        => $request->name,
            'type'        => $request->type,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $imagePath,
        ]);

        return response()->json(['success' => true, 'data' => $furniture]);
    }

    // Show specific furniture
    public function show($id)
    {
        $furniture = Furniture::find($id);
        if (!$furniture) {
            return response()->json(['success' => false, 'message' => 'Furniture not found'], 404);
        }
        return response()->json(['success' => true, 'data' => $furniture]);
    }

    // Update furniture
    public function update(Request $request, $id)
    {
        $furniture = Furniture::find($id);
        if (!$furniture) {
            return response()->json(['success' => false, 'message' => 'Furniture not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            if ($furniture->image) {
                Storage::delete($furniture->image);
            }
            $furniture->image = $request->file('image')->store('public/furniture');
        }

        $furniture->update($request->only(['name', 'type', 'description', 'price']));
        return response()->json(['success' => true, 'data' => $furniture]);
    }

    // Delete furniture
    public function destroy($id)
    {
        $furniture = Furniture::find($id);
        if (!$furniture) {
            return response()->json(['success' => false, 'message' => 'Furniture not found'], 404);
        }

        if ($furniture->image) {
            Storage::delete($furniture->image);
        }
        $furniture->delete();
        return response()->json(['success' => true, 'message' => 'Furniture deleted successfully']);
    }
}
