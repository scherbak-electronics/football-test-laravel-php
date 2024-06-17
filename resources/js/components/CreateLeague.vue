<template>
    <div>
        <h1>Create League</h1>
        <form @submit.prevent="createLeague">
            <div>
                <label for="name">Name:</label>
                <input v-model="name" type="text" id="name">
            </div>
            <div>
                <label for="status">Status:</label>
                <select v-model="status" id="status">
                    <option value="published">Published</option>
                    <option value="unpublished">Unpublished</option>
                </select>
            </div>
            <div>
                <label for="league_service_id">League Service ID:</label>
                <input v-model="league_service_id" type="number" id="league_service_id">
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            status: 'published',
            league_service_id: null
        }
    },
    methods: {
        async createLeague() {
            try {
                await axios.post('/api/leagues', {
                    name: this.name,
                    status: this.status,
                    league_service_id: this.league_service_id
                });
                this.$router.push('/');
            } catch (error) {
                console.error('Error creating league:', error);
            }
        }
    }
}
</script>
