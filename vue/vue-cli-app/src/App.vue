<template>
  <div id="app">
    <img alt="Vue logo"
         src="./assets/logo.png" />

    <HelloWorld msg="Welcome to Your Vue.js App" />

    <message>Test Apple</message>
    <message>Test Oooo</message>
    <hr />

    <!-- Button trigger modal -->
    <button type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal">模态框</button>

    <!-- Modal -->
    <ModalExample :languages="this.languages">
      <template slot="header">{{ this.title }}</template>
      <template scope="bodyProps">
        {{ bodyProps.language.name }}
        <span v-if="bodyProps.language.name === 'PHP'">☑️</span>
      </template>
    </ModalExample>

    <div>
      <router-link to="/page1">Go to Page 1</router-link>
      <router-link to="/page2">Go to Page 2</router-link>
    </div>
    <router-view />

  </div>
</template >

<script>
import HelloWorld from './components/HelloWorld.vue'
import Message from './components/Message.vue'
import ModalExample from './components/ModalExample.vue'

export default {
  name: 'App',
  data() {
    return {
      title: 'Web 编程语言',
      languages: [
        { id: 1, name: 'PHP' },
        { id: 2, name: 'JavaScript' },
        { id: 3, name: 'Golang' },
      ],
    }
  },

  // 局部注册（注册到指定父组件）
  components: {
    HelloWorld,
    Message,
    ModalExample,
  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>

<style lang="scss">
@import './styles/_variables.scss';
@import './styles/_reset.scss';
@import './styles/_global.scss';
</style>