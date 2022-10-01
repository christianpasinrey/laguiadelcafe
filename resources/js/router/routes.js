import AdminDashboard from '../admin-components/AdminDashboard.vue';
import AdminPosts from '../admin-components/AdminPosts.vue';
const routes = [
    { path: '/', component: AdminDashboard },
    { path: '/admin-posts', component: AdminPosts}
]
export default routes;
