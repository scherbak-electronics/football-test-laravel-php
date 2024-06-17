<template>
    <div>
        <h1>League List</h1>
        <ul>
            <li v-for="league in leagues" :key="league.id">
                {{ league.name }} - {{ league.status }}
                <button @click="editLeague(league.id)">Edit</button>
                <button @click="deleteLeague(league.id)">Delete</button>
            </li>
        </ul>
        <button @click="createLeague">Create League</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            leagues: []
        }
    },
    methods: {
        async fetchLeagues() {
            try {
                const response = await axios.get('/api/leagues');
                this.leagues = response.data;
                console.log(this.leagues);
            } catch (error) {
                console.error('Error fetching leagues:', error);
            }
        },
        createLeague() {
            this.$router.push('/create-league');
        },
        editLeague(id) {
            this.$router.push(`/edit-league/${id}`);
        },
        async deleteLeague(id) {
            try {
                await axios.delete(`/api/leagues/${id}`);
                this.fetchLeagues();
            } catch (error) {
                console.error('Error deleting league:', error);
            }
        }
    },
    mounted() {
        this.fetchLeagues();
    }
}
</script>
