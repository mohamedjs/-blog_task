/*=========================================================================================
  File Name: moduleCalendarActions.js
  Description: Calendar Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios.js"

export default {
  fetchArticles({ commit, state }) {
    return new Promise((resolve, reject) => {
      axios.get("/api/v1/articles",{ params : state.search })
        .then((response) => {
          commit('SET_ARTICLES', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },

  fetchArticle({ commit, state }, articleId) {
    return new Promise((resolve, reject) => {
      axios.get(`/api/v1/articles/${articleId}`)
        .then((response) => {
          commit('SET_ARTICLE', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },

  createComment({ commit, state }, articleId){
    return new Promise((resolve,reject) => {
      state.comment['article_id'] = articleId
      axios.post('/api/v1/comments',state.comment)
      .then((response) => {
        resolve(response)
      })
      .catch((error) => { reject(error) })
    })
  },  

   setCommentKey({ commit } , payload){
    commit('SET_COMMENT_KEY',payload)
  },

  setSearchKey({ commit, dispatch } , search){
    commit('SET_SEARCH_KEY', search)
    if(search.value) { dispatch('fetchArticles'); }
  },

  initSearchKey({ commit, dispatch }){
    commit('INIT_SEARCH')
  }

 
}
