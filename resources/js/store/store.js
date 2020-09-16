import Vue from 'vue'
import Vuex from 'vuex'

import state from "./state"
import getters from "./getters"
import mutations from "./mutations"
import actions from "./actions"

Vue.use(Vuex)

import moduleCategory from './category-module/moduleCategory.js'
import moduleArticle from './article-module/moduleArticle.js'

export default new Vuex.Store({
    getters,
    mutations,
    state,
    actions,
    modules: {
      category: moduleCategory,
      article: moduleArticle,
    },
    strict: false
})
