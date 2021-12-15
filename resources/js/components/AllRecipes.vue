<template>
    <div class="flex justify-center items-center">
        <div class="w-11/12 md:w-1/2 flex justify-around flex-wrap">
	        <div class="flex justify-between w-full">
		        <h2 class="text-center text-6xl mb-4 capitalize">recipes List</h2>
		        <router-link to="/create"><v-btn class="border px-3 py-4" elevation="2">New recipe</v-btn></router-link>
        	</div>
			
		    <div class="w-full" v-for="recipe in recipes">
                <div class="item p-5 shadow border my-5" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex justify-end items-center">
	                    <router-link to="/create"><i class="far fa-plus-square pt-1.5 mr-2"></i></router-link>           	
						<router-link :to="{name: 'edit', params: { id: recipe.id }}"><i class="far fa-edit mr-2"></i></router-link>  

						<button @click="deleteRecipe(recipe.id)"><i class="far fa-trash-alt mr-2"></i></button>	
                    </div>
                    <h2 class="capitalize text-xl font-bold text-black-400">{{ recipe.name }}</h2>
                    <p class="truncate mb-0 text-gray-600">{{ recipe.description }}</p>	
                    <div class="flex justify-between items-end mt-5">
                        <router-link :to="{name: 'show', params: { id: recipe.id }}"><v-btn class="border px-3 py-4 bg-blue-300" elevation="2">Show</v-btn></router-link>
                    	<p class="mb-0 text-red-600 font-bold capitalize">{{ recipe.created_at | moment("from", true) }}</p>	
                    </div>	                         
                </div>	           
		    </div>    
    	</div>      
    </div>
</template>
 
<script>
	
	import { Notyf } from 'notyf';
	import 'notyf/notyf.min.css';
	
	const notyf = new Notyf();
	
    export default {
        data() {
            return {
                recipes: []
            }
        },
        created() {
            this.axios
                .get('http://127.0.0.1:8000/api/recipes')
                .then(response => {
                    this.recipes = response.data;                              
                });            
                
        },
        methods: {
            deleteRecipe(id) { 
                this.axios
                    .delete(`http://127.0.0.1:8000/api/recipes/${id}`)
                    .then(response => {
                        let i = this.recipes.map(data => data.id).indexOf(id);
                        this.recipes.splice(i, 1)
                        notyf.success('Recipe deleted');
                    });
            }
        }
    }
    
</script>