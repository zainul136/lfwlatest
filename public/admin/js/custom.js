var Zenix = (function () {
    "use strict";

    /* Search Bar ============ */
    var screenWidth = $(window).width();

    var handleSelectPicker = function () {
        if (jQuery(".default-select").length > 0) {
            jQuery(".default-select").selectpicker();
        }
    };

    var handleTheme = function () {
        $("#preloader").fadeOut(500);
        $("#main-wrapper").addClass("show");
    };

    var handleMetisMenu = function () {
        if (jQuery("#menu").length > 0) {
            $("#menu").metisMenu();
        }
        jQuery(".metismenu > .mm-active ").each(function () {
            if (!jQuery(this).children("ul").length > 0) {
                jQuery(this).addClass("active-no-child");
            }
        });
    };
    var handleCkEditor = function () {
        if (jQuery("#ckeditor").length > 0) {
            ClassicEditor.create(document.querySelector("#ckeditor"), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
                .then((editor) => {
                    window.editor = editor;
                })
                .catch((err) => {
                    // console.error( err.stack );
                });
        }
    };
    var domoPanel = function () {
        if (jQuery(".dz-demo-content").length > 0) {
            const ps = new PerfectScrollbar(".dz-demo-content");
            $(".dz-demo-trigger").on("click", function () {
                $(".dz-demo-panel").addClass("show");
            });
            $(".dz-demo-close, .bg-close,.dz_theme_demo,.dz_theme_demo_rtl").on(
                "click",
                function () {
                    $(".dz-demo-panel").removeClass("show");
                }
            );
            $(".dz-demo-bx").on("click", function () {
                $(".dz-demo-bx").removeClass("demo-active");
                $(this).addClass("demo-active");
            });
        }
    };

    var handleAllChecked = function () {
        $("#checkAll").on("change", function () {
            $(
                "td input:checkbox, .email-list .custom-checkbox input:checkbox"
            ).prop("checked", $(this).prop("checked"));
        });
    };

    var handleNavigation = function () {
        $(".nav-control").on("click", function () {
            $("#main-wrapper").toggleClass("menu-toggle");

            $(".hamburger").toggleClass("is-active");
        });
    };

    var handleCurrentActive = function () {
        for (
            var nk = window.location,
                o = $("ul#menu a")
                    .filter(function () {
                        return this.href == nk;
                    })
                    .addClass("mm-active")
                    .parent()
                    .addClass("mm-active");
            ;
        ) {
            if (!o.is("li")) break;

            o = o.parent().addClass("mm-show").parent().addClass("mm-active");
        }
    };

    var handleMiniSidebar = function () {
        $("ul#menu>li").on("click", function () {
            const sidebarStyle = $("body").attr("data-sidebar-style");
            if (sidebarStyle === "mini") {
                console.log($(this).find("ul"));
                $(this).find("ul").stop();
            }
        });
    };

    var handleMinHeight = function () {
        var win_h = window.outerHeight;
        var win_h = window.outerHeight;
        if (win_h > 0 ? win_h : screen.height) {
            $(".content-body").css("min-height", win_h + 60 + "px");
        }
    };

    var handleDataAction = function () {
        $('a[data-action="collapse"]').on("click", function (i) {
            i.preventDefault(),
                $(this)
                    .closest(".card")
                    .find('[data-action="collapse"] i')
                    .toggleClass("mdi-arrow-down mdi-arrow-up"),
                $(this)
                    .closest(".card")
                    .children(".card-body")
                    .collapse("toggle");
        });

        $('a[data-action="expand"]').on("click", function (i) {
            i.preventDefault(),
                $(this)
                    .closest(".card")
                    .find('[data-action="expand"] i')
                    .toggleClass("icon-size-actual icon-size-fullscreen"),
                $(this).closest(".card").toggleClass("card-fullscreen");
        });

        $('[data-action="close"]').on("click", function () {
            $(this).closest(".card").removeClass().slideUp("fast");
        });

        $('[data-action="reload"]').on("click", function () {
            var e = $(this);
            e.parents(".card").addClass("card-load"),
                e
                    .parents(".card")
                    .append(
                        '<div class="card-loader"><i class=" ti-reload rotate-refresh"></div>'
                    ),
                setTimeout(function () {
                    e.parents(".card").children(".card-loader").remove(),
                        e.parents(".card").removeClass("card-load");
                }, 2000);
        });
    };

    var handleHeaderHight = function () {
        const headerHight = $(".header").innerHeight();
        $(window).scroll(function () {
            if (
                $("body").attr("data-layout") === "horizontal" &&
                $("body").attr("data-header-position") === "static" &&
                $("body").attr("data-sidebar-position") === "fixed"
            )
                $(this.window).scrollTop() >= headerHight
                    ? $(".deznav").addClass("fixed")
                    : $(".deznav").removeClass("fixed");
        });
    };

    var handleDzScroll = function () {
        if (jQuery(".dz-scroll").length > 0) {
            jQuery(".dz-scroll").each(function () {
                var scroolWidgetId = jQuery(this).attr("id");
                const ps = new PerfectScrollbar("#" + scroolWidgetId, {
                    wheelSpeed: 2,
                    wheelPropagation: true,
                    minScrollbarLength: 20,
                });
                ps.isRtl = false;
            });
        }
    };

    var handleMenuTabs = function () {
        if (screenWidth <= 991) {
            jQuery(".menu-tabs .nav-link").on("click", function () {
                if (jQuery(this).hasClass("open")) {
                    jQuery(this).removeClass("open");
                    jQuery(".fixed-content-box").removeClass("active");
                    jQuery(".hamburger").show();
                } else {
                    jQuery(".menu-tabs .nav-link").removeClass("open");
                    jQuery(this).addClass("open");
                    jQuery(".fixed-content-box").addClass("active");
                    jQuery(".hamburger").hide();
                }
                //jQuery('.fixed-content-box').toggleClass('active');
            });
            jQuery(".close-fixed-content").on("click", function () {
                jQuery(".fixed-content-box").removeClass("active");
                jQuery(".hamburger").removeClass("is-active");
                jQuery("#main-wrapper").removeClass("menu-toggle");
                jQuery(".hamburger").show();
            });
        }
    };

    var handleChatbox = function () {
        jQuery(".bell-link").on("click", function () {
            jQuery(".chatbox").addClass("active");
        });
        jQuery(".chatbox-close").on("click", function () {
            jQuery(".chatbox").removeClass("active");
        });
    };

    var handlePerfectScrollbar = function () {
        if (jQuery(".deznav-scroll").length > 0) {
            const qs = new PerfectScrollbar(".deznav-scroll");
            qs.isRtl = false;
        }
    };

    var handleBtnNumber = function () {
        $(".btn-number").on("click", function (e) {
            e.preventDefault();

            fieldName = $(this).attr("data-field");
            type = $(this).attr("data-type");
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val(), 10);
            if (!isNaN(currentVal)) {
                if (type == "minus") input.val(currentVal - 1);
                else if (type == "plus") input.val(currentVal + 1);
            } else {
                input.val(0);
            }
        });
    };

    var handleDzChatUser = function () {
        jQuery(".dz-chat-user-box .dz-chat-user").on("click", function () {
            jQuery(".dz-chat-user-box").addClass("d-none");
            jQuery(".dz-chat-history-box").removeClass("d-none");
        });

        jQuery(".dz-chat-history-back").on("click", function () {
            jQuery(".dz-chat-user-box").removeClass("d-none");
            jQuery(".dz-chat-history-box").addClass("d-none");
        });

        jQuery(".dz-fullscreen").on("click", function () {
            jQuery(".dz-fullscreen").toggleClass("active");
        });
    };

    var handleDzFullScreen = function () {
        jQuery(".dz-fullscreen").on("click", function (e) {
            if (
                document.fullscreenElement ||
                document.webkitFullscreenElement ||
                document.mozFullScreenElement ||
                document.msFullscreenElement
            ) {
                /* Enter fullscreen */
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen(); /* IE/Edge */
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen(); /* Firefox */
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen(); /* Chrome, Safari & Opera */
                }
            } else {
                /* exit fullscreen */
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen();
                }
            }
        });
    };

    var handleshowPass = function () {
        jQuery(".show-pass").on("click", function () {
            jQuery(this).toggleClass("active");
            if (jQuery("#dz-password").attr("type") == "password") {
                jQuery("#dz-password").attr("type", "text");
            } else if (jQuery("#dz-password").attr("type") == "text") {
                jQuery("#dz-password").attr("type", "password");
            }
        });
    };

    var heartBlast = function () {
        $(".heart").on("click", function () {
            $(this).toggleClass("heart-blast");
        });
    };

    var handleDzLoadMore = function () {
        $(".dz-load-more").on("click", function (e) {
            e.preventDefault(); //STOP default action
            $(this).append(' <i class="fa fa-refresh"></i>');

            var dzLoadMoreUrl = $(this).attr("rel");
            var dzLoadMoreId = $(this).attr("id");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                method: "POST",
                url: dzLoadMoreUrl,
                dataType: "html",
                success: function (data) {
                    $("#" + dzLoadMoreId + "Content").append(data);
                    $(".dz-load-more i").remove();
                },
            });
        });
    };

    var handleLightgallery = function () {
        if (jQuery("#lightgallery").length > 0) {
            $("#lightgallery").lightGallery({
                loop: true,
                thumbnail: true,
                exThumbImage: "data-exthumbimage",
            });
        }
    };

    var handleSmartWizard = function () {
        if (jQuery("#smartwizard").length > 0) {
            $(document).ready(function () {
                // SmartWizard initialize
                $("#smartwizard").smartWizard();
            });
        }
    };
    var handleCustomFileInput = function () {
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this)
                .siblings(".custom-file-label")
                .addClass("selected")
                .html(fileName);
        });
    };

    var vHeight = function () {
        var ch = $(window).height() - 206;
        $(".chatbox .msg_card_body").css("height", ch);
    };

    var handleChatSidebar = function () {
        $(".chat-hamburger").on("click", function () {
            $(".chat-left-sidebar").toggleClass("show");
        });
    };

    var handleMenuPosition = function () {
        if (screenWidth > 1024) {
            $(".metismenu  li")
                .unbind()
                .each(function (e) {
                    if ($("ul", this).length > 0) {
                        var elm = $("ul:first", this).css("display", "block");

                        var off = elm.offset();
                        var l = off.left;
                        var w = elm.width();
                        var elm = $("ul:first", this).removeAttr("style");
                        var docH = $("body").height();
                        var docW = $("body").width();

                        if (jQuery("html").hasClass("rtl")) {
                            var isEntirelyVisible = l + w <= docW;
                        } else {
                            var isEntirelyVisible = l > 0 ? true : false;
                        }

                        if (!isEntirelyVisible) {
                            $(this).find("ul:first").addClass("left");
                        } else {
                            $(this).find("ul:first").removeClass("left");
                        }
                    }
                });
        }
    };

    var handleImageSelect = function () {
        const $_SELECT_PICKER = $(".image-select");
        $_SELECT_PICKER.find("option").each((idx, elem) => {
            const $OPTION = $(elem);
            const IMAGE_URL = $OPTION.attr("data-thumbnail");
            if (IMAGE_URL) {
                $OPTION.attr(
                    "data-content",
                    "<img src='%i'/> %s"
                        .replace(/%i/, IMAGE_URL)
                        .replace(/%s/, $OPTION.text())
                );
            }
            // console.warn('option:', idx, $OPTION)
        });
        // $_SELECT_PICKER.selectpicker();
    };
    var handleThemeMode = function () {
        jQuery(".dz-theme-mode").on("click", function () {
            jQuery(this).toggleClass("active");

            if (jQuery(this).hasClass("active")) {
                jQuery("body").attr("data-theme-version", "dark");
            } else {
                jQuery("body").attr("data-theme-version", "light");
            }
        });
    };

    /* Function ============ */
    return {
        init: function () {
            handleTheme();
            handleMetisMenu();
            handleAllChecked();
            handleNavigation();
            handleCurrentActive();
            handleMiniSidebar();
            handleMinHeight();
            handleDataAction();
            handleHeaderHight();
            handleDzScroll();
            handleMenuTabs();
            handleChatbox();
            handlePerfectScrollbar();
            handleBtnNumber();
            handleDzChatUser();
            handleDzFullScreen();
            handleshowPass();
            heartBlast();
            handleDzLoadMore();
            handleLightgallery();
            handleSmartWizard();
            handleCustomFileInput();
            vHeight();
            handleChatSidebar();
            handleCkEditor();
            handleImageSelect();
            handleThemeMode();
            domoPanel();
        },

        load: function () {
            handleTheme();
            handleSelectPicker();
            handleImageSelect();
        },

        resize: function () {
            vHeight();
        },

        handleMenuPosition: function () {
            handleMenuPosition();
        },
    };
})();

/* Document.ready Start */
jQuery(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    ("use strict");
    Zenix.init();
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});
/* Document.ready END */

/* Window Load START */
jQuery(window).on("load", function () {
    "use strict";
    Zenix.load();
    setTimeout(function () {
        Zenix.handleMenuPosition();
    }, 1000);
});

/*  Window Load END */
/* Window Resize START */
jQuery(window).on("resize", function () {
    "use strict";
    Zenix.resize();
    setTimeout(function () {
        Zenix.handleMenuPosition();
    }, 1000);
});

/*  Window Resize END */

// Dashboard User Information JS

// let trBodyUser = document.getElementById("user-info-tbody");
// trBodyUser.addEventListener("click", (event) => {
//     console.log(trBodyUser);
//     let item = event.target.parentNode.parentNode.parentNode;
//     item.remove();
// });

// Remove User Info Modal Functionality
if (document.getElementById("user-info-modal")) {
    let userInfoModal = document.getElementById("user-info-modal");
    let removeUserInfo = document.getElementsByClassName(
        "remove-user-info-close"
    )[0];
    const removeUserBtn = document.querySelectorAll(".remove-user-info");
    removeUserBtn.forEach((button) => {
        button.addEventListener("click", () => {
            userInfoModal.style.display = "block";
        });
    });

    removeUserInfo.addEventListener("click", () => {
        userInfoModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == userInfoModal) {
            userInfoModal.style.display = "none";
        }
    };
}
// custom modal code by remote dev


// Edit User Info Modal Functionality
if (document.getElementById("user-info-edit-modal")) {
    let userEditInfoModal = document.getElementById("user-info-edit-modal");
    let saveUserInfoBtn = document.getElementById("saveUserInfoBtn");

    let closeUserInfoEdit = document.querySelector(".close-edit-info-btn");
    const editBtn = document.querySelectorAll(".user-info-edit-btn");

    editBtn.forEach((button) => {
        button.addEventListener("click", () => {

            userEditInfoModal.style.display = "block";
        });
    });

    closeUserInfoEdit.addEventListener("click", () => {
        userEditInfoModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == userEditInfoModal) {
            userEditInfoModal.style.display = "none";
        }
    };
}
document.addEventListener("DOMContentLoaded", function () {
    // Select all "Edit" buttons
    const editButtons = document.querySelectorAll(".user-info-edit-btn");

    // Add a click event listener to each "Edit" button
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Get the user's ID from the data-userid attribute
            const userId = this.getAttribute("data-userid");

            // Build the ID of the corresponding user's modal
            const modalId = `user-info-edit-modal-${userId}`;

            // Find the modal element by ID
            const modal = document.getElementById(modalId);

            // Display the modal if it exists
            if (modal) {
                modal.style.display = "block";
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Select all "Edit" buttons
    const editButtons = document.querySelectorAll(".remove-user-info");

    // Add a click event listener to each "Edit" button
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Get the user's ID from the data-userid attribute
            const userId = this.getAttribute("data-userid");

            // Build the ID of the corresponding user's modal
            const modalId = `user-info-modal-${userId}`;

            // Find the modal element by ID
            const modal = document.getElementById(modalId);

            // Display the modal if it exists
            if (modal) {
                modal.style.display = "block";
            }
        });
    });
});

// Remove Public Post Modal Functionality
if (document.getElementById("remove-public-post-modal")) {
    let publicPostModal = document.getElementById("remove-public-post-modal");
    let PublicPostClose = document.getElementsByClassName(
        "remove-public-post-close"
    )[0];
    const removePublicPostBtn = document.querySelectorAll(
        ".remove-public-post"
    );
    removePublicPostBtn.forEach((button) => {
        button.addEventListener("click", () => {
            publicPostModal.style.display = "block";
        });
    });

    PublicPostClose.addEventListener("click", () => {
        publicPostModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == publicPostModal) {
            publicPostModal.style.display = "none";
        }
    };
}

// Remove Private Post Modal Functionality
if (document.getElementById("remove-private-post-modal")) {
    let privatePostModal = document.getElementById("remove-private-post-modal");
    let privatePostClose = document.getElementsByClassName(
        "remove-private-post-close"
    )[0];
    const removePrivatePostBtn = document.querySelectorAll(
        ".remove-private-post"
    );
    removePrivatePostBtn.forEach((button) => {
        button.addEventListener("click", () => {
            privatePostModal.style.display = "block";
        });
    });

    privatePostClose.addEventListener("click", () => {
        privatePostModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == privatePostModal) {
            privatePostModal.style.display = "none";
        }
    };
}

// FAQ Edit Modal Functionality
if (document.getElementById("faq-row")) {
    const faqEditBtn = document.querySelectorAll(".faq-edit-btn");
    faqEditBtn.forEach((button) => {
        button.addEventListener("click", (e) => {
            // let allTextAreas = document.querySelectorAll("textarea");
            document.querySelectorAll("textarea").forEach((event) => {
                event.style.resize = "none";
                event.disabled = true;
            });
            document.querySelectorAll("textarea").disabled = true;
            console.log(document.querySelectorAll("textarea"));
            let trElement = e.target.closest("tr");
            let textareas = trElement.querySelectorAll("textarea");
            textareas.forEach(function (textarea) {
                textarea.disabled = false;
                textarea.style.resize = "vertical";
            });
        });
    });
}

// FAQ Remove Modal Functionality
if (document.getElementById("faq-remove-modal")) {
    let faqRemoveModal = document.getElementById("faq-remove-modal");
    let faqRemoveClose = document.getElementsByClassName("faq-remove-close")[0];
    const removeFaqBtn = document.querySelectorAll(".faq-remove-btn");
    removeFaqBtn.forEach((button) => {
        button.addEventListener("click", () => {
            faqRemoveModal.style.display = "block";
        });
    });

    faqRemoveClose.addEventListener("click", () => {
        faqRemoveModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == faqRemoveModal) {
            faqRemoveModal.style.display = "none";
        }
    };
}

// Delete User Modal Permanent Page Functionality
if (document.getElementById("delete-modal")) {
    let delUserModal = document.getElementById("delete-modal");
    let delModalSpan = document.getElementsByClassName("delete-user-close")[0];
    const delUserBtn = document.querySelectorAll(".del-user-permanent");

    delUserBtn.forEach((button) => {
        button.addEventListener("click", () => {
            delUserModal.style.display = "block";
        });
    });

    delModalSpan.addEventListener("click", () => {
        delUserModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == delUserModal) {
            delUserModal.style.display = "none";
        }
    };
}

// Chat Message Modal View Functionality
if (document.getElementById("message-modal")) {
    let messageMContentModal = document.getElementById("message-modal");
    let messageModalSpan = document.getElementsByClassName(
        "message-modal-close"
    )[0];

    const messageViewBtn = document.querySelectorAll(
        ".message-content-view-btn"
    );

    messageViewBtn.forEach((button) => {
        button.addEventListener("click", () => {
            messageMContentModal.style.display = "block";
        });
    });

    messageModalSpan.addEventListener("click", () => {
        messageMContentModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == messageMContentModal) {
            messageMContentModal.style.display = "none";


        }
    };
}


document.addEventListener("DOMContentLoaded", function () {
    // Select all "Edit" buttons
    const editButtons = document.querySelectorAll(".post-content-view-btn");

    // Add a click event listener to each "Edit" button
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Get the user's ID from the data-userid attribute
            const userId = this.getAttribute("data-userid");

            // Build the ID of the corresponding user's modal
            const modalId = `public-post-modal-${userId}`;

            // Find the modal element by ID
            const modal = document.getElementById(modalId);

            // Display the modal if it exists
            if (modal) {
                modal.style.display = "block";
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    // Select all "Edit" buttons
    const editButtons = document.querySelectorAll(".message-contents-view-btn");

    // Add a click event listener to each "Edit" button
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Get the user's ID from the data-userid attribute
            const userId = this.getAttribute("data-userid");

            // Build the ID of the corresponding user's modal
            const modalId = `user-info-modal-${userId}`;

            // Find the modal element by ID
            const modal = document.getElementById(modalId);

            // Display the modal if it exists
            if (modal) {
                modal.style.display = "block";
            }
        });
    });
});

// Chat Message Modal View Functionality
if (document.getElementById("message-modal")) {
    let messageMContentModal = document.getElementById("message-modal");
    let messageModalSpan = document.getElementsByClassName(
        "message-modal-close"
    )[0];

    const messageViewBtn = document.querySelectorAll(
        ".message-content-view-btn"
    );

    messageViewBtn.forEach((button) => {
        button.addEventListener("click", () => {
            messageMContentModal.style.display = "block";
        });
    });

    messageModalSpan.addEventListener("click", () => {
        messageMContentModal.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == messageMContentModal) {
            messageMContentModal.style.display = "none";


        }
    };
}
// Chat Filter Box Modal Functionality

if (document.querySelector(".user-chat-filter-btn")) {
    document
        .querySelector(".user-chat-filter-btn")
        .addEventListener("click", () => {
            if (
                document.querySelector(".user-chat-filter-modal").style
                    .display == "none"
            ) {
                document.querySelector(
                    ".user-chat-filter-modal"
                ).style.display = "block";
            } else {
                document.querySelector(
                    ".user-chat-filter-modal"
                ).style.display = "none";
            }
        });
}

if (document.querySelector(".user-chat-filter-btn")) {
    document
        .querySelector(".user-chat-filter-cancel-btn")
        .addEventListener("click", () => {
            document.querySelector(".user-chat-filter-modal").style.display =
                "none";
        });
}

// User Information Filter Box Modal Functionality

if (document.querySelector(".user-info-filter-btn")) {
    document
        .querySelector(".user-info-filter-btn")
        .addEventListener("click", () => {
            if (
                document.querySelector(".user-info-filter-modal").style
                    .display == "none"
            ) {
                document.querySelector(
                    ".user-info-filter-modal"
                ).style.display = "block";
            } else {
                document.querySelector(
                    ".user-info-filter-modal"
                ).style.display = "none";
            }
        });
}

if (document.querySelector(".user-info-filter-btn")) {
    document
        .querySelector(".user-info-filter-cancel-btn")
        .addEventListener("click", () => {
            document.querySelector(".user-info-filter-modal").style.display =
                "none";
        });
}

// Deleted User Filter Box Modal Functionality

if (document.querySelector(".deleted-user-filter-btn")) {
    document
        .querySelector(".deleted-user-filter-btn")
        .addEventListener("click", () => {
            if (
                document.querySelector(".deleted-user-filter-modal").style
                    .display == "none"
            ) {
                document.querySelector(
                    ".deleted-user-filter-modal"
                ).style.display = "block";
            } else {
                document.querySelector(
                    ".deleted-user-filter-modal"
                ).style.display = "none";
            }
        });
}

if (document.querySelector(".deleted-user-filter-btn")) {
    document
        .querySelector(".deleted-user-filter-cancel-btn")
        .addEventListener("click", () => {
            document.querySelector(".deleted-user-filter-modal").style.display =
                "none";
        });
}

// Public Posts Box Modal Functionality

if (document.querySelector(".public-post-filter-btn")) {
    document
        .querySelector(".public-post-filter-btn")
        .addEventListener("click", () => {
            if (
                document.querySelector(".public-post-filter-modal").style
                    .display == "none"
            ) {
                document.querySelector(
                    ".public-post-filter-modal"
                ).style.display = "block";
            } else {
                document.querySelector(
                    ".public-post-filter-modal"
                ).style.display = "none";
            }
        });
}

if (document.querySelector(".public-post-filter-btn")) {
    document
        .querySelector(".public-post-filter-cancel-btn")
        .addEventListener("click", () => {
            document.querySelector(".public-post-filter-modal").style.display =
                "none";
        });
}

// Private Posts Box Modal Functionality

if (document.querySelector(".private-post-filter-btn")) {
    document
        .querySelector(".private-post-filter-btn")
        .addEventListener("click", () => {
            if (
                document.querySelector(".private-post-filter-modal").style
                    .display == "none"
            ) {
                document.querySelector(
                    ".private-post-filter-modal"
                ).style.display = "block";
            } else {
                document.querySelector(
                    ".private-post-filter-modal"
                ).style.display = "none";
            }
        });
}

if (document.querySelector(".private-post-filter-btn")) {
    document
        .querySelector(".private-post-filter-cancel-btn")
        .addEventListener("click", () => {
            document.querySelector(".private-post-filter-modal").style.display =
                "none";
        });
}

// Add New FAQ
if (document.getElementById("add-new-faq-btn")) {
    let addFaqBtn = document.getElementById("add-new-faq-btn");
    addFaqBtn.addEventListener("click", () => {
        let newFaqContainer = document.querySelector(".faq-new-container");
        let faqHeadingInput = document.querySelector(".faq-heading-input");
        let faqDescriptionInput = document.querySelector(
            ".faq-description-input"
        );
        faqHeadingInput.value = "";
        faqDescriptionInput.value = "";
        newFaqContainer.style.display = "block";
    });
}
