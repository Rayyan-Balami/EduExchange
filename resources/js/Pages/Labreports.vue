<template>
   <Head>
      <title>Labreports</title>
   </Head>
      <MaterailCard :materials="labreports"/>
</template>

<script>
import Layout from '../Shared/Layout.vue';
import MaterailCard from '../Shared/MaterailCard.vue';

export default {
   layout : Layout,
  components: {
         MaterailCard
  },
  props: {
        labreports: Array,
    },
};
</script>
