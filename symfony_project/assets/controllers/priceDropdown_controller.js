import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';

export default class extends Controller {
    connect() {
        this.element.addEventListener('click', () => {
            let priceListSign = this.element.children[1]?.children[0];
            if (priceListSign) {
                priceListSign.classList.toggle('show');
            }
            $(`#priceDropdownId-${this.element.dataset.value}`).slideToggle();
        })
    }
}