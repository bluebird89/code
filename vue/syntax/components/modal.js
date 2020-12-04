Vue.component("modal", {
    template: `
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">
                    <slot name="title">
                        Default Title
                    </slot>
                </p>
                <button class="delete" aria-label="close"></button>
            </header>

            <section class="modal-card-body">
                <slot>
                    Default Content.
                </slot>
            </section>

            <footer class="modal-card-foot">
                <slot name="footer">
                    <button class="button is-success">Okay</button>
                </slot>
            </footer>
        </div>
    </div>
    `
});
