<template>
    <div>
        <h1>Match List</h1>
        <ul>
            <li v-for="match in matches" :key="match.id">
                <div>
                    <strong>Start Date:</strong> {{ formatDate(match.start_date) }}
                </div>
                <div>
                    <strong>League:</strong> {{ match.league_name }}
                </div>
                <div>
                    <strong>Teams:</strong>
                    <img :src="match.home_team_logo" alt="Home Team Logo" />
                    {{ match.home_team_name }} vs
                    <img :src="match.away_team_logo" alt="Away Team Logo" />
                    {{ match.away_team_name }}
                </div>
                <div>
                    <strong>Odds:</strong> {{ match.odds }}
                </div>
            </li>
        </ul>
        <router-link to="/">Back to League List</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            matches: []
        }
    },
    methods: {
        async fetchMatches() {
            try {
                const response = await axios.get('/api/matches');
                this.matches = response.data;
            } catch (error) {
                console.error('Error fetching matches:', error);
            }
        },
        formatDate(date) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
            return new Date(date).toLocaleString('en-GB', options);
        }
    },
    mounted() {
        this.fetchMatches();
    }
}
</script>

<style>
/* Add your styles here */
</style>
