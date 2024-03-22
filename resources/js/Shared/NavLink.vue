<template>
    <Link class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" :class="{'bg-gray-100 text-black dark:bg-gray-600 ' : active }" role="menuitem">
      <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
  components: {
    Link,
  },
  props:{
    active : Boolean,
  },
};
</script>