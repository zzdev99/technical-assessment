<template>
    <div>
        <div @click="isMenuOpen = !isMenuOpen" class="menu-toggle bg-gray-300" :class="widthClass">
            <span class="material-symbols-outlined">menu</span>
        </div>

        <Sidebar v-show="isMenuOpen || widthClass == 'desktop'" :menu-items="getCategories" :class="widthClass" />
    </div>
</template>

<script>
import Sidebar from './components/Sidebar.vue';
import { mapActions, mapGetters } from 'vuex';

export default {
    name: 'App',
    components: { Sidebar },
    data() {
        return {
            windowWidth: window.innerWidth,
            BREAKPOINTS: {
                mobile: 640,
                tablet: 992
            },
            isMenuOpen: false,
        }
    },
    methods: {
        ...mapActions([
            'setCategories',
            'setLoading',
        ]),
        loadMenuItems() {
            this.setLoading(true)
            axios.get('/api/get-category-tree').then(response => {
                this.setCategories(response.data.categories)
            }).finally(() => {
                this.setLoading(false)
            })
        },
        updateWidth() {
            this.windowWidth = window.innerWidth
        },
    },
    computed: {
        ...mapGetters([
            'getCategories',
        ]),
        widthClass() {
            if (this.windowWidth < this.BREAKPOINTS.mobile) return 'mobile'
            if (this.windowWidth < this.BREAKPOINTS.tablet) return 'tablet'
            return 'desktop'
        }
    },
    mounted() {
        // setTimeout(() => {
        //     this.loadMenuItems()
        // }, 15000)
        this.loadMenuItems()

        window.addEventListener('resize', this.updateWidth)
        this.updateWidth()
    }
}
</script>

<style scoped>
.menu-toggle {
    cursor: pointer;
    height: 40px;
    align-items: center;
    display: flex;
    padding: 0 1rem;

    &.desktop {
        display: none;
    }
}

.sidebar {
    &.desktop {
        display: block;
    }
}
</style>
