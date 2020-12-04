Vue.component("task-list", {
    template: `
        <div>
            <task v-for="task in tasks" v-bind:key="task.id">{{task.id}}:{{ task.description }}</task>
        </div>
    `,

    data() {
        return {
            tasks: [
                { id: 1, description: "Go to work", completed: false },
                { id: 2, description: "Go to bank", completed: false },
                { id: 3, description: "Go to store", completed: false }
            ]
        };
    }
});

Vue.component("task", {
    template: "<li><slot></slot></li>"
});
