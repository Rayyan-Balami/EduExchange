<template>
  <Head>
     <title>Requests</title>
  </Head>
     <RequestCard :requests="requests"/>
</template>

<script>
import Layout from '../Shared/Layout.vue';
import RequestCard from '../Shared/RequestCard.vue';

export default {
  layout : Layout,
 components: {
        RequestCard
 },
 props: {
  requests: Array,
   },
};
</script>
