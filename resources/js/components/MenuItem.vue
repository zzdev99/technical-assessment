<template>
    <div class="menu-item" :class="[{ 'has-children': childCount }, depthClass]">
        <div @click="expandHandler" class="menu-item-name">
            {{ item.name }}
            <span class="product-count">({{ productCount }})</span>

            <span v-if="childCount" class="dropdown-arrow material-symbols-outlined">
                keyboard_arrow_down
            </span>
        </div>

        <div v-show="showChildren" v-if="childCount" class="children">
            <MenuItem v-for="category in item.children" :key="category.id" :item="category" :depth="depth + 1" />
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
    name: 'MenuItem',
    props: {
        item: Object,
        depth: {
            type: Number,
            default: 0,
        }
    },
    computed: {
        ...mapGetters([
            'getOpenItem',
            'getCategories'
        ]),
        childCount() {
            return this.item.children.length
        },
        depthClass() {
            return `depth-${this.depth}`
        },
        productCount() {
            return this.item.count
        },
        showChildren() {
            if (this.item.id == this.getOpenItem || this.isAncestorOfSelectedItem(this.item)) return true
            return false
        }
    },
    methods: {
        ...mapActions([
            'setOpenItem'
        ]),
        isAncestorOfSelectedItem(item) {
            if (item.children.length == 0) return false

            if (item.children.some(child => child.id == this.getOpenItem)) return true;

            return item.children.some(child => this.isAncestorOfSelectedItem(child));
        },
        expandHandler() {
            // if has not children make it not selectable
            if (this.item.children.length == 0) return

            // if already open, close it
            if (this.item.id == this.getOpenItem) {
                this.setOpenItem(this.item.parent_id)
            } else {
                this.setOpenItem(this.item.id)
            }
        }
    }
}
</script>

<style scoped>
.menu-item {
    cursor: pointer;
    font-family: figtree, sans-serif;
    text-transform: uppercase;
    letter-spacing: .1em;
    padding-left: 0.75rem;
    font-weight: 500;

    &.depth-0 {
        font-weight: 600;
        margin-bottom: .5rem;
        padding-left: 0;
    }

    .product-count {
        font-size: .75em;
        font-weight: 400;
    }

    .children {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .dropdown-arrow {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }

    .menu-item-name {
        position: relative;
        padding-right: 1.5em;
    }
}
</style>
