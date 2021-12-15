import AllRecipes from './components/AllRecipes.vue';
import ShowRecipe from './components/ShowRecipe.vue';
import CreateRecipe from './components/CreateRecipe.vue';
import EditRecipe from './components/EditRecipe.vue';
import Test from './Test.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllRecipes
    },
    {
        name: 'test',
        path: '/test',
        component: Test.vue
    },
    {
        name: 'show',
        path: '/show/:id',
        component: ShowRecipe
    },
    {
        name: 'create',
        path: '/create',
        component: CreateRecipe
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditRecipe
    }
];