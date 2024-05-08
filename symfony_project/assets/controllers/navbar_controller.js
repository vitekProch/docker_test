import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["navbarBackground", "toggleButton"];

    connect() {
        console.log('CHello')
        if (window.location.pathname === "/") {
            this.navbarBackgroundTarget.classList.remove("bg-body-tertiary");
        }
    }

    navbarHamburgerClicked() {
        let ariaExpanded = this.toggleButtonTarget.getAttribute("aria-expanded")
        if (ariaExpanded) {
            this.navbarBackgroundTarget.classList.add("bg-body-tertiary");
        }
        if ((window.location.pathname === "/") && ariaExpanded === "false" && (window.scrollY === 0)) {
            this.navbarBackgroundTarget.classList.remove("bg-body-tertiary");
        }
    }

    navbarBackgroundShow() {
        let ariaExpanded = this.toggleButtonTarget.getAttribute("aria-expanded")
        if ((window.location.pathname === "/") && (ariaExpanded === "false") && (window.scrollY === 0)) {
            this.navbarBackgroundTarget.classList.remove("bg-body-tertiary");
        }
        if ((window.scrollY > 1) || (ariaExpanded === "true")) {
            this.navbarBackgroundTarget.classList.add("bg-body-tertiary");
        }
    }
}
