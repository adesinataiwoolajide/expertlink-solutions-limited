$.sidebarMenu = function (menu) {
  var animationSpeed = 300;

  $(menu).on("click", "li a", function (e) {
    var $this = $(this);
    var checkElement = $this.next();

    if (checkElement.is(".treeview-menu") && checkElement.is(":visible")) {
      checkElement.slideUp(animationSpeed, function () {
        checkElement.removeClass("menu-open");
      });
      checkElement.parent("li").removeClass("active");
    }

    //If the menu is not visible
    else if (
      checkElement.is(".treeview-menu") &&
      !checkElement.is(":visible")
    ) {
      //Get the parent menu
      var parent = $this.parents("ul").first();
      //Close all open menus within the parent
      var ul = parent.find("ul:visible").slideUp(animationSpeed);
      //Remove the menu-open class from the parent
      ul.removeClass("menu-open");
      //Get the parent li
      var parent_li = $this.parent("li");

      //Open the target menu and add the menu-open class
      checkElement.slideDown(animationSpeed, function () {
        //Add the class active to the parent li
        checkElement.addClass("menu-open");
        parent.find("li.active").removeClass("active");
        parent_li.addClass("active");
      });
    }
    //if this isn't a link, prevent the page from being redirected
    if (checkElement.is(".treeview-menu")) {
      e.preventDefault();
    }
  });
};
$.sidebarMenu($(".sidebar-menu"));

// Custom Sidebar JS
jQuery(function ($) {
  //toggle sidebar
  $(".toggle-sidebar").on("click", function () {
    $(".page-wrapper").toggleClass("toggled");
  });

  // Toggle sidebar overlay
  $("#overlay").on("click", function () {
    $(".page-wrapper").toggleClass("toggled");
  });

  // Added by Srinu Basava
  $(function () {
    // When the window is resized,
    $(window).resize(function () {
      // When the width and height meet your specific requirements or lower
      if ($(window).width() >= 768) {
        $(".page-wrapper").removeClass("toggled");
      }
    });
  });
});

/***********
***********
***********
  Bootstrap JS 
***********
***********
***********/

// Tooltip
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Popover
var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

// Toasts
document.addEventListener('DOMContentLoaded', function () {
  // Helper function to set up toast button listeners
  function setupToastButton(btnId, toastId) {
    const btn = document.getElementById(btnId);
    if (btn) {
      btn.addEventListener('click', function () {
        const toastElement = document.getElementById(toastId);
        if (toastElement) {
          const toast = new bootstrap.Toast(toastElement);
          toast.show();
        }
      });
    }
  }

  // Basic Toast
  setupToastButton('liveToastBtn', 'liveToast');

  // Placement Toasts
  setupToastButton('topLeftToastBtn', 'topLeftToast');
  setupToastButton('topRightToastBtn', 'topRightToast');
  setupToastButton('bottomLeftToastBtn', 'bottomLeftToast');
  setupToastButton('bottomRightToastBtn', 'bottomRightToast');

  // Colored Toasts
  setupToastButton('primaryToastBtn', 'primaryToast');
  setupToastButton('successToastBtn', 'successToast');
  setupToastButton('dangerToastBtn', 'dangerToast');
  setupToastButton('warningToastBtn', 'warningToast');
  setupToastButton('infoToastBtn', 'infoToast');

  // Icon Toasts
  setupToastButton('infoIconToastBtn', 'infoIconToast');
  setupToastButton('successIconToastBtn', 'successIconToast');
  setupToastButton('errorIconToastBtn', 'errorIconToast');
  setupToastButton('warningIconToastBtn', 'warningIconToast');
});

