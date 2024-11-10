<template>
    <div v-for="line in lines" class="line bg-gray-400 animate-pulse"></div>
</template>

<script>
export default {
    name: 'MenuSkeleton',
    props: {
        lines: {
            type: Number,
            default: 3,
        },
    },
}
</script>

<style scoped>
.line {
    height: 24px;
    margin-bottom: .5rem;
    border-radius: 5px;
}
</style>
