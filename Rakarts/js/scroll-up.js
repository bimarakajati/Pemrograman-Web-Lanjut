//Get the button
var mybutton = document.getElementById("myBtn");

// initially, the button stays hidden
var visible = false;

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var threshold = 20;
    var below_threshold = document.body.scrollTop > threshold || document.documentElement.scrollTop > threshold;

    if (below_threshold) {
        if (!visible) {
            // if the button is not visible,
            unfade(mybutton); // function to gradually fadein button
        }

        return;
    }

    if (visible) {
        // if the button is visible,
        fade(mybutton); // function to gradually fadeout button
    }
}

var current_opacity = 0.1;
var is_unfading = false;
var is_fading = false;

function unfade(element) {
    if (!visible) {
        element.style.display = "flex";
        visible = true;
    }

    is_fading = false;
    is_unfading = true;

    unfade_step(element);
}

function unfade_step(element) {
    element.style.opacity = current_opacity;
    element.style.filter = "alpha(opacity=" + current_opacity * 100 + ")";

    if (current_opacity >= 1) {
        // end
        is_unfading = false;
        current_opacity = 1;
        return;
    }

    current_opacity += 0.01;
    if (is_unfading) {
        setTimeout(function () {
            unfade_step(element);
        }, 10);
    }
}

function fade(element) {
    if (!visible) {
        return;
    }

    is_fading = true;
    is_unfading = false;

    fade_step(element);
}

function fade_step(element) {
    element.style.opacity = current_opacity;
    element.style.filter = "alpha(opacity=" + current_opacity * 100 + ")";

    if (current_opacity <= 0.001) {
        // end
        is_fading = false;
        visible = false;
        current_opacity = 0.1;
        element.style.display = "none";
        return;
    }

    current_opacity -= 0.01;
    if (is_fading) {
        setTimeout(function () {
            fade_step(element);
        }, 10);
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    //   document.body.scrollTop = 0;
    //   document.documentElement.scrollTop = 0;
    location.href = "#";
}
