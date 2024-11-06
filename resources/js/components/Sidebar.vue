<template>
    <div>
        <div v-for="category in menuItems" :key="category.id">
            {{ category.name }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
    props: {
        menuItems: Array,
    },
}
</script>

<style scoped></style>
