<template>
   <Head>
      <title>Notes</title>
   </Head>
      <MaterailCard :materials="notes"/>
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
        notes: Array,
    },
};
</script>
