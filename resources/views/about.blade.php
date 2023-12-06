<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Last Few Words</title>
    <link rel="stylesheet" href="{{ asset('storage/assets/css/frontend-style.css') }}">
</head>
<body>
<header>
    <a href="{{route("/")}}">
        <img src="{{ asset('storage/assets/frontend-images') }}/logo.png" alt="">
    </a>
    <nav>
        <a href="{{route("/")}}">Home</a>
        <a href="{{route("about")}}">About Us</a>
        <a href="{{route("features")}}">Features</a>
        <a href="{{route("contact")}}">Contact Us</a>
        <a href="{{route("register")}}" class="btn">Get Started</a>
    </nav>
    <div class="ham" onclick="(NavbarToggle())">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</header>
<section class="hero About">
    <div class="container">
        <div class="box">
            <img src="{{ asset('storage/assets/frontend-images') }}/star.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/element.png" alt="">

            <h2>About Us</h2>
            <p>LastFewWords: Your Digital Legacy, Your Eternal Connection</p>

        </div>
    </div>
</section>
<section class="AboutSec sec2 Aboutpage">
    <div class="row row2">

        <div class="left timeless-left">
            <h2>
                About Us
                <img src="{{ asset('storage/assets/frontend-images') }}/h2element.png" alt="">
            </h2>
            <!--<h3 style="font-size: 1.8rem; color: #292929;">LastFewWords: Your Digital Legacy, Your Eternal Connection</h3>
            <p style="font-size: 1.8rem; color: #292929;"> <b>In every one’s life there will be of moment for reflection and even a moment to express the LastFewWords to their loved ones.</b></p>-->
            <p style="margin-top: 1.6rem;">At LastFewWords, we're dedicated to redefining the way we connect with loved ones and how we preserve our life's moments. We understand the profound impact that personal memories, stories, and last words can have on families and friends. Our platform was born from a simple idea: to create a space where individuals can document their life journeys, share their innermost thoughts, and ensure that their voices continue to resonate, even after they're no longer with us.</div>
        <div class="right timeless-right">

            <img src="{{ asset('storage/assets/frontend-images') }}/aboutImg1.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/aboutImg2.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/elements1.png" class="element" alt="">

        </div>
    </div>

    <div class="row " style="margin-top: 14rem;">

        <div class="left forever-in-words-left">
            <h2>
                Who we Are
                <img src="{{ asset('storage/assets/frontend-images') }}/h2element.png" alt="">

            </h2>
            <p>We are a passionate team of innovators, technologists, and storytellers who are committed to bridging the gap between the past and the present. LastFewWords isn't just a platform; it's a digital legacy that honors your life, your experiences, and the connections you've made.

                In a world filled with fleeting digital interactions, we believe in preserving what truly matters—your memories, messages, and the wisdom of your life. With LastFewWords, you can continue to inspire, guide, and connect with your family and friends, creating a lasting bond that transcends time and distance.

                Our vision is to offer you a platform that is secure, user-friendly, and deeply meaningful. We're actively exploring cutting-edge technologies like blockchain and AI to enhance the security and accessibility of your memories. We are continually evolving, just as your life's journey unfolds.

                Join us on this transformative journey to ensure that your last words are never truly the last. Welcome to LastFewWords, where your digital legacy becomes your eternal connection.</p>

        </div>
        <div class="right forever-in-words-right">
            <img src="{{ asset('storage/assets/frontend-images') }}/aboutImg1.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/aboutImg2.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/elements1.png" class="element" alt="">
        </div>
    </div>

</section>


<footer>
    <div class="top">
        <div class="about">

            <a href="{{route("/")}}">
                <img src="{{ asset('storage/assets/frontend-images') }}/logo.png" alt="">
            </a>
            <p>LastFewWords offers a range of powerful features to help you document your life's journey, connect with loved ones, and preserve your legacy. Explore our platform's capabilities and discover how you can share your memories, thoughts, and messages in a meaningful and enduring way.</p>
        </div>
        <div class="links">
            <h2>Links</h2>
            <a href="{{route("/")}}">Home</a>
            <a href="{{route("about")}}">About Us</a>
            <a href="{{route("features")}}">Features</a>
            <a href="{{route("contact")}}">Contact Us</a>
        </div>
        <div class="links">
            <h2>Help</h2>
            <a href="">Privacy Policy</a>
            <a href="">Terms of Service</a>
        </div>
        <div class="links">
            <h2>Contact Us</h2>
            <!--<a href=""><img style="width: 1.9rem;" src="{{ asset('storage/assets/frontend-images') }}/phone.png" alt="">+1 (123) 123 4568</a>-->
            <!--<a href=""><img style="width: 1.9rem;" src="{{ asset('storage/assets/frontend-images') }}/mail.png" alt="">info@example.com</a>-->
            <a href="" style="display: flex; align-items: center;"><img style="width: 1.4rem;" src="{{ asset('storage/assets/frontend-images') }}/location.png" alt="">
                <p>

                    Menlo Park, California, United States
                </p>
            </a>
        </div>
    </div>
    <div class="bottom">
        ©2023. LastFewWords. All Rights Reserved.
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
        integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
        integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const NavbarToggle = ()=>{
        document.querySelector("header nav").classList.toggle("active")
    }



    gsap.from(".timeless-left", {
        opacity: 0,
        x: -90,
        duration: 1,
        scrollTrigger: {
            trigger: ".timeless-left",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });
    gsap.from(".timeless-right", {
        opacity: 0,
        x: 90,
        duration: 1,
        scrollTrigger: {
            trigger: ".timeless-right",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });

    gsap.from(".forever-in-words-left", {
        opacity: 0,
        x: -90,
        duration: 1,
        scrollTrigger: {
            trigger: ".forever-in-words-left",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });
    gsap.from(".forever-in-words-right", {
        opacity: 0,
        x: 90,
        duration: 1,
        scrollTrigger: {
            trigger: ".forever-in-words-right",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });


</script>
</body>
</html>