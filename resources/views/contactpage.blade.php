<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Last Few Words</title>
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
<section class="hero contactUsPage">
    <div class="container">
        <div class="box">
            <img src="{{ asset('storage/assets/frontend-images') }}/star.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/element.png" alt="">

            <h2>Contact Us</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>

        </div>
    </div>
</section>


<section class="ContactPageForm">
    <div class="left timeless-left">
        <h2>We love hearing from you. We are always here to chat</h2>

        <p>
            <img src="{{ asset('storage/assets/frontend-images') }}/mail.png" alt="">
            support@lastfewwords.com
        </p>
    </div>
    <div class="right timeless-right">

        <h2>Get In Touch</h2>
        <p>Feel free to contact us</p>
        <form action="">
            <div class="input">
                <label for="">Name *</label>
                <input type="text" placeholder="Your Name">
            </div>
            <div class="input">
                <label for="">Email *</label>
                <input type="email" placeholder="Your Email">
            </div>
            <div class="input">
                <label for="">Phone Number</label>
                <input type="text" placeholder="Your Phone Number">
            </div>
            <div class="input">
                <label for="">How Can We Help You? *</label>
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            </div>
            <button class="btn">Submit</button>
        </form>
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
            <!--<a href=""><img style="width: 1.9rem;" src="{{ asset('storage/assets/frontend-images') }}/phone.png" alt="">+1 (123) 123 4568</a>
                <a href=""><img style="width: 1.9rem;" src="{{ asset('storage/assets/frontend-images') }}/mail.png" alt="">info@example.com</a>-->
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