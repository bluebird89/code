Vue.component('message', {
    props: ['title', 'body'],

    data() {
        return {
            isVisiable: true
        }
    },

    template: `
    <article class="message" v-show="isVisiable">
        <div class="message-header">
            <p>{{ title }}</p>
            <button class="delete" aria-label="delete" @click='isVisiable = false'></button>
        </div>
        <div class="message-body">
            {{ body }}
        </div>
    </article>
    `
});
