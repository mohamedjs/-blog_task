import state from './moduleArticleState.js'
import mutations from './moduleArticleMutations.js'
import actions from './moduleArticleActions.js'
import getters from './moduleArticleGetters.js'


export default {
  namespaced: true,
  state: state,
  mutations: mutations,
  actions: actions,
  getters: getters
}

