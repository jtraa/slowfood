<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest('created_at')->get();
        return $recipes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view
//         return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating name and description column
        $this->validate($request, [
	        'name' => 'required',
	        'description' => 'required'
        ]);
        
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        
        // Make new Recipe and save
    	$recipe = new Recipe;
    	$recipe->name = $request->input('name');
    	$recipe->slug = $slug;
    	$recipe->description = $request->input('description');
        $recipe->save();
        
        // Return to tickets view with success message
    	return response()->json('Recipe created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return response()->json($recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
		$recipe = Recipe::find($id);
        $recipe->update($request->all());

        return response()->json('Product updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // Validating name and description column
        $recipe = Recipe::find($id);
        $recipe->update($request->all());

        return response()->json('Product updated!');
        
/*
        $this->validate($request, [
	        'name' => 'required',
	        'description' => 'required'
        ]);

    	$recipe = Recipe::where('id', $id)->first();
    	$recipe->name = $request->input('name');
    	$recipe->description = $request->input('description');
    	$name = $request->input('name');
        $recipe->id = Str::slug($name, '-');
        $recipe->save();

    	return response()->json('Recipe updated!')->with('success', 'Recipe updated');
*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
    	$recipe = Recipe::find($slug);
        $recipe->delete();

        return response()->json('Product deleted!');
    }
}
