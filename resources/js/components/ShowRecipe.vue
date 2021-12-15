<template>
    <div>
	    <div class="w-full flex justify-center" data-aos="fade-up" data-aos-delay="150">
	        <div class="w-11/12 md:w-1/2">
	            <div class="p-5 shadow border my-5">
	                <div class="shadow border mb-3">
		                <div class="flex justify-center items-center py-5">
			                <div class="w-11/12">
				                <div class="flex justify-between items-center">
					                <div>
										<h2 class="capitalize text-xl font-bold txt-blue">{{ recipe.name }}</h2>
						                <p class="mb-0 text-gray-600">{{ recipe.description }}</p>
					                </div>
					                <p class="mb-0 text-red-600 font-bold capitalize">{{ recipe.created_at | moment("from", true) }}</p>
				                </div>
			                    <div class="flex justify-end mt-5">
				                    
					                <router-link to="/"><v-btn class="border px-3 py-4 bg-blue-300" elevation="2">Back to recipes</v-btn></router-link>
			                    </div>
							</div>
		                </div>
	                </div>
	            </div>
	        </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                recipe: {}
            }
        },
        created() {
            this.axios
                .get(`http://127.0.0.1:8000/api/recipes/${this.$route.params.id}`)
                .then((res) => {
                    this.recipe = res.data;
                });
        }
    }
</script>