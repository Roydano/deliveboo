<template>
    <div>
        <transition name='fade' mode="in-out">
                <router-view >
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
    * {
        overflow-x: hidden;
    }
</style>