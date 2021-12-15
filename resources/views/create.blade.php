<x-layout>
    
     <div class="w-full flex justify-center">
        <div class="w-11/12 md:w-1/4">
            <div class="p-5 shadow border my-5">
                <div class="shadow border mb-3">
	                <div class="flex justify-center items-center py-5">
		                <div class="">
						    {!! Form::open(['action' => 'App\Http\Controllers\RecipeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}

					        <div class="block mb-4">
					            {{Form::label('name', 'Name', ['class' => 'block font-medium mb-2'])}}
					            {{Form::text('name', '', ['class' => 'border shadow p-2', 'placeholder' => 'Name'])}}
					        </div>     
					        <div class="block mb-4">
					            {{Form::label('description', 'Description', ['class' => 'block font-medium mb-2'])}}
					            {{Form::textarea('description', '', ['class' => 'border shadow p-2', 'cols' => '30', 'placeholder' => 'Description'])}}
					        </div>
							<div class="flex justify-between">
						        {{Form::submit('Create', ['class'=>'border px-3 py-2 bg-blue'])}}
						        <a href="/" class="border px-3 py-3 bg-blue">Back to recipes</a>
							</div>
					        {!! Form::close() !!}
		                </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
        
</x-layout>
