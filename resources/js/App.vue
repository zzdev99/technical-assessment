<template>
    <Sidebar :menu-items="categories"/>
</template>

<script>
import Sidebar from './components/Sidebar.vue';

export default {
    name: 'App',
    components: { Sidebar },
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        loadMenuItems() {
            axios.get('/api/get-category-tree').then(response => {
                this.categories = response.data.categories
            })
        }
    },
    mounted() {
        this.loadMenuItems()
    }
}
</script>
