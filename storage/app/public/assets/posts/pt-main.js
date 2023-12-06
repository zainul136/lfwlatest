
document.addEventListener("DOMContentLoaded", function () {
    const slider2 = document.getElementById("slider");
    if(slider2.childElementCount > 3){
        slider2.style.overflowX = "scroll"
        slider2.style.overflowY = "hidden"
    }else{
        slider2.style.overflowX = "hidden"
        slider2.style.overflowY = "hidden"
    }
});

/* document.addEventListener('DOMContentLoaded', function () {
    // Your JavaScript code here
    // ...
    var video = document.getElementById('myVideo');
    var playButton = document.getElementById('playButton');
    var pauseButton = document.getElementById('pauseButton');
    // var stopButton = document.getElementById('stopButton');
    pauseButton.style.display = "none";

    playButton.onclick = function () {
        video.play();
        playButton.style.display = "none";
        pauseButton.style.display = "flex";

        setTimeout(function () {
            pauseButton.style.opacity = "0";
        }, 1000); // 4000 milliseconds (4 seconds)
    };

    pauseButton.onclick = function () {
        video.pause();
        playButton.style.display = "flex";
        pauseButton.style.display = "none";


        setTimeout(function () {
            pauseButton.style.opacity = "1";
        }, 0); // 4000 milliseconds (4 seconds)
    };

    // stopButton.onclick = function() {
    //     video.pause();
    //     video.currentTime = 0;
    // };
});
 */
document.addEventListener('DOMContentLoaded', function () {
    try {
        var video = document.getElementById('myVideo');
        var playButton = document.getElementById('playButton');
        var pauseButton = document.getElementById('pauseButton');
        
        if (playButton && pauseButton) {
            pauseButton.style.display = "none";

            playButton.onclick = function () {
                try {
                    video.play();
                    playButton.style.display = "none";
                    pauseButton.style.display = "flex";

                    setTimeout(function () {
                        pauseButton.style.opacity = "0";
                    }, 1000); // 1000 milliseconds (1 second)
                } catch (error) {
                    console.error("Error while playing video:", error);
                }
            };

            pauseButton.onclick = function () {
                try {
                    video.pause();
                    playButton.style.display = "flex";
                    pauseButton.style.display = "none";

                    setTimeout(function () {
                        pauseButton.style.opacity = "1";
                    }, 0); // 0 milliseconds
                } catch (error) {
                    console.error("Error while pausing video:", error);
                }
            };
        }
    } catch (error) {
        console.error("Error initializing video player:", error);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const categorySections = document.querySelectorAll(".card-bottom");

    categorySections.forEach(category => {
        let categoryLinks = category.querySelector(".card-bottom-right-tags");
        let catLeft = category.querySelector(".catLeft");
        let catRight = category.querySelector(".catRight");
        let scrollStep = getScrollStep(window.innerWidth);

        catLeft.style.visibility = "hidden";

        catRight.addEventListener("click", () => {
            categoryLinks.scrollLeft += scrollStep;
            updArrowVisibility();
        });

        catLeft.addEventListener("click", () => {
            categoryLinks.scrollLeft -= scrollStep;
            updArrowVisibility();
        });

        function updArrowVisibility() {
            catLeft.style.visibility = categoryLinks.scrollLeft === 0 ? "hidden" : "visible";
        }

        window.addEventListener("resize", () => {
            scrollStep = getScrollStep(window.innerWidth);
            updArrowVisibility();
        });
    });

    function getScrollStep(windowWidth) {
        if (windowWidth >= 1750) {
            return 153;
        } else if (windowWidth >= 1550) {
            return 140;
        } else if (windowWidth >= 1400) {
            return 128;
        } else if (windowWidth >= 1250) {
            return 113;
        } else {
            return 99;
        }
    }
});




// document.addEventListener("DOMContentLoaded", function () {

//     let isDragging = false;
//     let startPos = 0;
//     let startTranslate = 0;

//     slider2.style.transform = "translateX(0px)";

//     slider2.addEventListener("mousedown", onStart);
//     slider2.addEventListener("touchstart", onStart);

//     slider2.addEventListener("mousemove", onMove);
//     slider2.addEventListener("touchmove", onMove);

//     slider2.addEventListener("mouseup", onEnd);
//     slider2.addEventListener("touchend", onEnd);

//     function onStart(event) {
//         if (event.type === "touchstart") {
//             startPos = event.touches[0].clientX;
//         } else if (event.type === "mousedown") {
//             startPos = event.clientX;
//             event.preventDefault();
//         }
//         startTranslate = getPositionX(slider2.style.transform);
//         isDragging = true;
//     }

//     function onMove(event) {
//         if (!isDragging) return;

//         if (event.type === "touchmove" || event.type === "mousemove") {
//             const currentPos = event.type === "touchmove" ? event.touches[0].clientX : event.clientX;
//             const translate = startTranslate + currentPos - startPos;

//             // Calculate the maximum and minimum allowed translate values
//             const maxTranslate = 0;
//             const minTranslate = -(slider2.scrollWidth - slider2.clientWidth);

//             // Apply bounds to the translate value
//             const boundedTranslate = Math.max(minTranslate, Math.min(maxTranslate, translate));

//             slider2.style.transform = `translateX(${boundedTranslate}px)`;
//         }
//     }

//     function onEnd() {
//         if (!isDragging) return;
//         isDragging = false;
//     }

//     function getPositionX(transformValue) {
//         return parseInt(transformValue.split("(")[1].split("px")[0]);
//     }
// });

// =================================POP Gallery CODE========================================

function addImage(imageNo) {
    const mainImageAdd = document.getElementById("mainImageAdd");
    let imgNo = imageNo.toString()
    mainImageAdd.innerHTML = `<img src="./img/card2-${imgNo}.png">`;
}

function scrollL() {
    const imageSlider = document.getElementById("imageSlider");
    imageSlider.scrollLeft -= 50;
}
function scrollR() {
    const imageSlider = document.getElementById("imageSlider");
    imageSlider.scrollLeft += 50;
}

function popImage(source) {
    const popImageDiv = document.getElementById("popImageDiv");
    popImageDiv.style.display = "block";

    const mainImageAdd = document.getElementById("mainImageAdd");
    mainImageAdd.innerHTML = `<img src="${source}">`;

    document.body.style.overflow = "hidden"
}
function closePop() {
    const popImageDiv = document.getElementById("popImageDiv");
    popImageDiv.style.display = "none";
    document.body.style.overflow = "scroll"
}



