<template>
    <div class="sidebar bg-gray-300">
        <MenuSkeleton v-if="isLoading" :lines="12"/>
        <MenuItem v-for="category in menuItems" :key="category.id" :item="category" />
    </div>
</template>

<script>
import MenuItem from './MenuItem.vue';
import MenuSkeleton from './MenuSkeleton.vue';

import { mapGetters } from 'vuex';

export default {
    name: 'Sidebar',
    components: { MenuItem, MenuSkeleton },
    props: {
        menuItems: Array,
    },
    computed: {
        ...mapGetters([
            'isLoading'
        ])
    }
}
</script>

<style scoped>
.sidebar {
    width: 350px;
    height: 100vh;
    overflow-y: auto;
    padding: 1rem;

    &.tablet,
    &.mobile {
        height: calc(100vh - 40px);
    }
}

::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: transparent;
}

::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
