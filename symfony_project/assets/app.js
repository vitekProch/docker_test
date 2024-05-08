import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import "./turbo/turbo-helper";
import "./styles/app.scss";
import "./bootstrap";
import "./dynamic-imports.js";

import { Application } from '@hotwired/stimulus'
import Lightbox from 'stimulus-lightbox'

const application = Application.start()
application.register('lightbox', Lightbox)
