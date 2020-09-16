<!-- =========================================================================================
	File Name: App.vue
	Description: Main vue file - APP
	----------------------------------------------------------------------------------------
	Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
	<div id="app" >
		<router-view  :key="$route.path" />
	</div>
</template>

<script>

export default {

}
</script>

<style>
body{
	background-color: #262c49;
}
</style>

