<template>
	<div class="center grid">
		<vs-row>
	      <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
	        <vs-row>
	        	<vs-col class="filter" vs-type="flex" vs-justify="center" vs-align="center" w="12">
	        		<vs-row>
	        			<vs-col  vs-type="flex" vs-justify="center" vs-align="center" w="2">
		        		    <div class="center">
						      <vs-input  v-model="search" placeholder="Search">
						        <template #icon>
						          <i class='bx bx-user'></i>
						        </template>
						      </vs-input>
						    </div>
						</vs-col>
	        			<vs-col  vs-type="flex" vs-justify="center" vs-align="center" w="2">
		        		    <div class="center">
						      <vs-select  class="w-100" color="primary" placeholder="Select Category" v-model="category_id">
						        <vs-option v-for="(category,index) in categories" :key="index" :label="category.name" :value="category.id">
						          {{ category.name }}
						        </vs-option>
						      </vs-select>
						    </div>
						</vs-col>
						<vs-col  vs-type="flex" vs-justify="center" vs-align="center" w="2">
		        		    <div class="center">
						      <vs-select class="w-100" color="primary" placeholder="Select" v-model="per_page">
						        <vs-option label="10" value="10">
						          10
						        </vs-option>
						        <vs-option label="20" value="20">
						          20
						        </vs-option> 
						        <vs-option label="50" value="50">
						          50
						        </vs-option>
						        <vs-option label="10" value="100">
						          100
						        </vs-option>
						      </vs-select>
						    </div>
						</vs-col>
						<vs-col  vs-type="flex" vs-justify="center" vs-align="center" w="3">
		        		    <div class="center">
						      	<flat-pickr 
							        v-model="from" 
							        :config="dateConfig" 
							        @on-change="changeFromValue" 
							        class="w-full" />
						    </div>
						</vs-col>
						<vs-col  vs-type="flex" vs-justify="center" vs-align="center" w="3">
		        		    <div class="center">
						      	<flat-pickr 
							        v-model="to" 
							        :config="dateConfig" 
							        @on-change="changeToValue" 
							        class="w-full" />
						    </div>
						</vs-col>

					</vs-row>
	        	</vs-col>
	        	<vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
	        		<vs-row>
		        		<vs-col  v-for="(article,index) in articles" :key="index"  vs-type="flex" vs-justify="center" vs-align="center" w="3" >
			        		<vs-card  @click.prevent="$router.push({ name: 'article', params: { articleId: article.id } }).catch(() => {})" class="card" type="1">
							    <template #title>
							      <h3>{{ article.name }}</h3>
							    </template>
							    <template #img>
							      <img :src="article.image" :alt="article.name">
							    </template>
							    <template #text>
							      <p>
							        {{ article.description }}
							      </p>
							    </template>
							    <template #interactions>
							      <vs-button class="btn-chat" shadow primary>
							        <i class='bx bx-chat' ></i>
							        <span class="span">
							          {{ article.comments.length }}
							        </span>
							      </vs-button>
							    </template>
							</vs-card>
						</vs-col>
					</vs-row>
					<vs-row vs-type="flex" vs-justify="center" vs-align="center">
						<vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
					      <vs-pagination v-model="page" :length="total" />
					    </vs-col>
					</vs-row>
	        	</vs-col>
	        </vs-row>
	      </vs-col>
	    </vs-row>
	</div>
</template>

<script>
import { mapState } from 'vuex'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import 'flatpickr/dist/themes/airbnb.css';

export default {
	components: {
		flatPickr
	},
	data() {
		return {
			value: 2,
			category_id:'',
			per_page : 10,
			page:1,
			from: moment(new Date()).format('DD-MM-YYYY'),
		    to: moment(new Date()).format('DD-MM-YYYY'),
		    dateConfig:{
	          dateFormat: 'd-m-Y',
	          weekNumbers: false, //show week number
	          monthSelectorType:'dropdown', //can be static
	          // maxDate:moment().format('d-m-Y'),
	          // minDate:'01-05-1991',
	          enableTime : false,
	          defaultDate:moment(new Date()).format('DD-MM-YYYY'),
	          // locale: Arabic, // locale for this instance only          
      		},
			search : ''
		}
	},
	computed: {
		...mapState('category',['categories']),
		...mapState('article',['articles','total']),
	},
	watch:{
	    search:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:'global_search', value:value}
        	this.$store.dispatch("article/setSearchKey",payload)
	      }
    	},
    	per_page:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:'per_page', value:value}
        	this.$store.dispatch("article/setSearchKey",payload)
	      }
    	},
    	page:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:'page', value:value}
        	this.$store.dispatch("article/setSearchKey",payload)
	      }
    	},
    	category_id:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:'category_id', value:value}
        	this.$store.dispatch("article/setSearchKey",payload)
	      }
    	},

  	},
	methods: {
		fetchArticle() { 
			if (this.$route.params.categoryId) {
			  const payload = {key:'category_id', value:this.$route.params.categoryId }
		      this.$store.dispatch('article/setSearchKey',payload)
			}
			this.$store.dispatch('article/fetchArticles')
		},
		changeFromValue(selectedDates, dateStr, instance){
	      const payload = {key:'from', value:dateStr }
	      this.$store.dispatch('article/setSearchKey',payload)
	    },
	    changeToValue(selectedDates, dateStr, instance){
	      const payload = {key:'to', value:dateStr }
	      this.$store.dispatch('article/setSearchKey',payload)
	    }
	},
	mounted(){
		this.fetchArticle()
	}
}
</script>

<style type="text/css">
.filter {
	background-color: #10163a;
	padding: 15px;
	margin-bottom: 8px;
	border-radius: 10px;
	box-shadow: 1px 1px 1px #10163a;
}
.card{
	width: 90%;
	margin-bottom: 6px;
	margin-right: 8px;
}
</style>