import { createRouter, createWebHistory } from 'vue-router';
import LeagueList from './components/LeagueList.vue';
import CreateLeague from './components/CreateLeague.vue';
import EditLeague from './components/EditLeague.vue';
import MatchList from './components/MatchList.vue';

const routes = [
    { path: '/', name: 'home', component: LeagueList },
    { path: '/create-league', name: 'create-league', component: CreateLeague },
    { path: '/edit-league/:id', name: 'edit-league', component: EditLeague, props: true },
    { path: '/matches', name: 'matches', component: MatchList }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
