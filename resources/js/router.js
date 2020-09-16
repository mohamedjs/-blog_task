import Vue from 'vue'
import Router from 'vue-router'
const originalReplace = Router.prototype.replace
Router.prototype.replace = function replace(location, onResolve, onReject) {
  if (onResolve || onReject) return originalReplace.call(this, location, onResolve, onReject)
  return originalReplace.call(this, location).catch(err => err)
}
Vue.use(Router)
const router = new Router({
    mode: 'history',
    base: '/web',
    routes: [
      {
        // =============================================================================
        // MAIN LAYOUT ROUTES
        // =============================================================================
        path: '',
        component: () => import('@/layout/MasterLayout.vue'),
        children: [
          {
            path: '/',
            name: 'home',
            component: () => import('@/views/Home.vue'),
            meta: {
              breadcrumb: [
                  { title: 'Home' },
              ],
              pageTitle: 'Home'
            }
          },
          {
            path: 'catgory/:categoryId',
            name: 'category',
            component: () => import('@/views/Home.vue'),
            meta: {
              breadcrumb: [
                  { title: 'Home' },
              ],
              pageTitle: 'Home'
            }
          },
          {
            path: 'article/:articleId',
            name: 'article',
            component: () => import('@/views/Article.vue'),
            meta: {
              breadcrumb: [
                  { title: 'Home' },
              ],
              pageTitle: 'Home'
            }
          },
          {
            path: '/error-404',
            name: 'Error',
            component: () => import('@/views/Error.vue'),
            meta: {
              breadcrumb: [
                  { title: 'Error' },
              ],
              pageTitle: 'Error',
            }
          }
        ]
      },
      // Redirect to 404 page, if no match found
      {
        path: '*',
        redirect: 'error-404'
      }
    ],
})
export default router
