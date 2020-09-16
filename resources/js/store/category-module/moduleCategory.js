import state from './moduleCategoryState.js'
import mutations from './moduleCategoryMutations.js'
import actions from './moduleCategoryActions.js'
import getters from './moduleCategoryGetters.js'

export default {
  namespaced: true,
  state: state,
  mutations: mutations,
  actions: actions,
  getters: getters
}

