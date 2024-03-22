<template>
   <Head>
      <title>Questions</title>
   </Head>
      <MaterailCard :materials="questions"/>
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
        questions: Array,
    },
};
</script>
