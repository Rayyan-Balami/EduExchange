<template>

   <Head />
   <Nav />
   <Main>
    <slot />
   </Main>






</template>

<script>
import Head from "./Header.vue";
import Nav from './Nav.vue';
import Main from "./Main.vue";


export default {
  components: {
       Head,Nav,Main
  },
};
</script>
