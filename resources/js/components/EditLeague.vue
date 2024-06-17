<template>
    <div>
        <h1>Edit League</h1>
        <form @submit.prevent="editLeague">
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
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: ['id'],
    data() {
        return {
            name: '',
            status: 'published'
        };
    },
    methods: {
        fetchLeague() {
            axios.get(`/api/leagues/${this.id}`).then(response => {
                this.name = response.data.name;
                this.status = response.data.status;
            });
        },
        editLeague() {
            axios.put(`/api/leagues/${this.id}`, {
                    name: this.name,
                    status: this.status
            }).then(() => {
                this.$router.push('/');
            }).catch(error => {
                console.error('Error editing league:', error);
            });
        }
    },
    mounted() {
        this.fetchLeague();
    }
}
</script>
