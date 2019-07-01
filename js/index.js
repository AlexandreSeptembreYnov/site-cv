var sidebar = document.getElementsByClassName("sidebar")[0];

var lowerLayerBurger = document.getElementsByClassName("menu-toggler__line")[2];
lowerLayerBurger.addEventListener("animationend", function(evt) {
});

// Add click listeners to the menu on the sidebar
document.getElementsByTagName("ul")[0].addEventListener("click", function(evt) {
    // when a menu item is clicked hide the sidebar by unchecking the input
    document.getElementById("menuToggler").checked = false;

    function handleTransitionEnd(transitionEvent) {

        // show the correct content based on the target of the menu item
        // first hide everything
        var contentDivs = document.querySelectorAll("main div");
        for (var i = 0; i < contentDivs.length; i++) {
            contentDivs[i].style.display = "none";
        }

        // show the correct div
        var contentId = evt.srcElement.hash;
        var contentDiv = document.getElementById(contentId.substr(1));
        contentDiv.style.display = "inherit";

        // remove listener
        sidebar.removeEventListener("transitionend", handleTransitionEnd);
    }

    sidebar.addEventListener("transitionend", handleTransitionEnd);
});

//portfolio

$(document).ready(function(){
    var slide =  $('.card')
    $(slide).first().addClass('active-img');
    $(slide).last().addClass('small').addClass('prev');
    $(slide).last().prev('.card').addClass('smaller prevSmall');
    $(slide).first().next('.card').addClass('small next');
    $(slide).first().next('.card').next('.card').addClass('smaller nextSmall');



    $('.next-btn').click(function(e){
        e.preventDefault();
        var Active = $('.active-img'), Prev = $('.prev'), Next = $('.next'), SmallPrev = $('.prevSmall'), SmallNext = $('.nextSmall');

        $(Active).addClass('small prev ').removeClass('active-img');
        $(Next).addClass('active-img').removeClass('small next');
        $(Prev).addClass('smaller prevSmall ').removeClass('small prev ');
        $(SmallNext).addClass('small next').removeClass('smaller nextSmall ');
        $(SmallPrev).removeClass('prevSmall').addClass('nextSmall');

    });
    $('.prev-btn').click(function(e){
        e.preventDefault();
        var Active = $('.active-img'), Prev = $('.prev'), Next = $('.next'), SmallPrev = $('.prevSmall'), SmallNext = $('.nextSmall');

        $(Active).removeClass('active-img').addClass('small next');
        $(Prev).removeClass('small prev').addClass('active-img');
        $(Next).removeClass('small next').addClass('smaller nextSmall');
        $(SmallPrev).addClass('small prev').removeClass('smaller prevSmall');
        $(SmallNext).removeClass('nextSmall').addClass('prevSmall');

    });
});
