import 'flowbite';

// Base
const { anchorSmooth } = require("./base/anchorSmooth");
const { buttons } = require("./base/button");
const { videoBanner } = require("./blocks/videoBanner");
const { videoBannerInterativo } = require("./blocks/videoBannerInterativo");

// Blocks
import { Tabs } from './blocks/Tabs';
import { Processes } from './blocks/Processes';

document.addEventListener("DOMContentLoaded", function() {
    // Base
    anchorSmooth()
    buttons()
    videoBannerInterativo()
    videoBanner()
    // faq();

    new Tabs();
    new Processes();
});
