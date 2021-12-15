<x-layout>
    
     <div class="w-full flex justify-center">
        <div class="w-11/12 md:w-1/2">
            <div class="p-5 shadow border my-5">
                <div class="p-5 shadow border mb-3">
                    <h2 class="capitalize text-xl font-bold txt-blue">{{ $recipe->name }}</h2>
                    <p class="mb-0 text-gray-600">{{ $recipe->description }}</p>
                    <div class="flex justify-between items-center mt-4">                    	
                    	<a href="/" class="border px-3 py-2 bg-blue">Back to recipes</a>
                    	<p class="mb-0 text-red-600 font-bold">{{ $recipe->created_at->diffForHumans() }}</p>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
        
</x-layout>
