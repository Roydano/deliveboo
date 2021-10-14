<template>
    <div>
        <transition name='fade' mode="out-in">
                <router-view v-slot="{Component}" :key="$route.fullPath">
                        <component :is="Component"/>
                </router-view>
            </transition>
    </div>
</template>

<script>


export default {
    name: 'Main',
}
</script>

<style lang="scss" scoped>
</style>