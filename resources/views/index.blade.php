<x-layout>
    
     	<div class="flex justify-center">
            <div class="w-11/12 md:w-1/2 flex justify-around flex-wrap">
	           @foreach ($recipes as $recipe)
		           <div class="{{$loop->iteration < 5 ? 'w-full' : 'w-5/12' }}">
			            <div class="cursor-pointer" onclick="location.href='/recipes/{{$recipe->slug}}';">
			                <div class="p-5 shadow border my-5">
			                    <div class="p-5 shadow border mb-3">
				                    <div class="flex justify-end items-center">
					                    <a href="recipes/create"><i class="far fa-plus-square pt-1.5 mr-2"></i></a>           	
				                    	<a href="recipes/{{$recipe->slug}}/edit"><i class="far fa-edit mr-2"></i></a>
				                    	{!!Form::open(['action' => ['App\Http\Controllers\RecipeController@destroy', $recipe->slug], 'method' => 'POST', 'class' => 'pull-right'])!!}									
										{{Form::hidden('_method', 'DELETE')}}
											<button type="submit"><i class="far fa-trash-alt mr-2"></i></button>
										{!!Form::close()!!}
				                    </div>
				                    <h2 class="capitalize text-xl font-bold text-black-400">{{ $recipe->name }}</h2>
			                        <p class="truncate mb-0 text-gray-600">{{ $recipe->description }}</p>	
			                        <div class="flex justify-end mt-5">
			                        	<p class="mb-0 text-red-600 font-bold">{{ $recipe->created_at->diffForHumans() }}</p>	
			                        </div>
			                    </div>
			                </div>
			            </div>    
		           </div>
                @endforeach
            </div>            
        </div>
        
</x-layout>
