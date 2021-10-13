<template>
    <header>
        <router-link v-for="item in nav" :key="item.label" :to="item.path" class="link">{{item.label}}</router-link>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
      return {
        nav: [
          {
            label: 'Ristoranti',
            path: '/restaurants',
          },
          {
            label: 'Cousines',
            path: '/cuisines',
          },
        ]
    }
  }
}
</script>

<style lang="scss" scoped>
  header {
    background-color: rgb(3, 3, 3);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80px;
    font-size: 23px;
    text-transform: uppercase;
    .link {
      color: white;
      padding: 0 30px;
      transition: all .3s linear;
      &:hover {
        transform: scale(1.1);
        text-decoration: none;
      }
    }
  }
</style>