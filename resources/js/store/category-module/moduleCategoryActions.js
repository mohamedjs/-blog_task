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
  fetchCategories({ commit, state }) {
    return new Promise((resolve, reject) => {
      axios.get("/api/v1/categories")
        .then((response) => {
          commit('SET_CATEGORIES', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },

 
}
