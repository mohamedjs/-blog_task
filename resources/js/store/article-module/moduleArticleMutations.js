export default {
  SET_ARTICLES(state, data) {
    state.articles = data.articles
    state.total = data.total_pages
    state.page = data.current_page
  },  
  SET_ARTICLE(state, data) {
    state.article = data
  },

  SET_SEARCH_KEY(state, search) {
    state.search[search.key] = search.value
  },

  SET_COMMENT_KEY(state, payload) {
    state.comment[payload.key] = payload.value
  },

  INIT_SEARCH(state) {
    state.search = {'category_id' : '', 'per_page' : '', 'page' : '', 'global_search' : '', 'from' : '', 'to': ''}
  },  
}
