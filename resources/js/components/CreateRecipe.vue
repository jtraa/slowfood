<template>
    <div>
	    <div class="w-full flex justify-center" data-aos="fade-up" data-aos-delay="200">
	        <div class="w-11/12 md:w-1/2">
	            <div class="p-5 shadow border my-5">
		                <div class="flex justify-center items-center py-5">
			                <div class="w-11/12">
								<h3 class="text-4xl mb-4">Create recipe</h3>
								<form @submit.prevent="addRecipe">
				                    <div class="mb-4">
				                        <label class="block font-medium mb-2">Name</label>
				                        <input type="text" class="border shadow p-2 w-full" v-model="recipe.name">
				                    </div>
				                    <div class="block mb-4">
				                        <label class="block font-medium mb-2">Description</label>
				                        <textarea class="border shadow p-2 w-full" rows="5" v-model="recipe.description"></textarea>
				                    </div>
				                    <div class="flex justify-between">
					                    <v-btn type="submit" class="border px-3 py-4 bg-blue-300" elevation="2">Create</v-btn>
					                    <router-link to="/"><v-btn class="border px-3 py-4 bg-blue-300" elevation="2">Back to recipes</v-btn></router-link>
				                    </div>
				                </form>
			                </div>
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
                recipe: {}
            }
        },
        methods: {
            addRecipe() {
                this.axios
                    .post('http://localhost:8000/api/recipes', this.recipe)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
                    notyf.success('Recipe added');
            }
        }
    }
</script>