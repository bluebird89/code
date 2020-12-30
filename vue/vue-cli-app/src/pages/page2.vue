<!--公用组件-->
<template>
  <div :class="$style.hello">Hello World 1! {{msg}}</div>
</template>

<script>
export default {
  data() {
    return {
      msg: [7, 15, 31].map((n) => n + 1),
    }
  },
}
</script>

<style module lang="scss">
.hello {
  background-color: red;
  width: 300px;
  height: 300px;
}
</style>
