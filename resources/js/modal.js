import Alpine from "alpinejs";

document.addEventListener("alpine:init", () => {
    Alpine.store("modal", {
        active: null,
        open(id) {
            this.active = id;
        },
        close() {
            this.active = null;
        },
        isOpen(id) {
            return this.active === id;
        },
    });

    // lock/unlock scroll
    Alpine.effect(() => {
        if (Alpine.store("modal").active) {
            document.body.classList.add("overflow-hidden");
        } else {
            document.body.classList.remove("overflow-hidden");
        }
    });
});

// Fungsi global
window.openModal = function (id) {
    Alpine.store("modal").open(id);
};

window.closeModal = function () {
    Alpine.store("modal").close();
};
