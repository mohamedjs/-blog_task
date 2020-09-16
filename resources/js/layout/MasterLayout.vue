<template>
	<div class="center examplex">
	    <vs-navbar  text-white color="#10163a" center-collapsed v-model="active">
	        <template  #left>
	         <h3 @click.prevent="$router.push({ name: 'home' }).catch(() => {})" >Blog System</h3>
	        </template>
	        <template #right>
	          <vs-navbar-item  @click.prevent="$router.push({ name: 'category', params: { categoryId: category.id } }).catch(() => {})" v-for="(category,index) in categories" :key="index" :active="active == category.name" :id="category.name">
	            {{ category.name }}
	          </vs-navbar-item>
	        </template>
	    </vs-navbar>
	    <div class="square">
	    	<div class="child">
	    		<router-view  :key="$route.path" />
	    	</div>
		</div>
  	</div>
</template>

<script>
import { mapState } from 'vuex'

export default {
	data(){
		return {
			active : '',
			data : ['category1','category2','category3']
		}
	},
	computed:{
		...mapState('category',['categories']),
	},
	methods: {
		fetchCategory() {
			this.$store.dispatch('category/fetchCategories')
		}
	},
	mounted(){
		this.fetchCategory()
	}
}
</script>
