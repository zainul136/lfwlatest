<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('storage/assets/css/frontend-style.css') }}">
    <title>Last Few Words</title>
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
<section class="hero">
    <div class="container">
        <div class="box">
            <img src="{{ asset('storage/assets/frontend-images') }}/star.png" alt="">
            <img src="{{ asset('storage/assets/frontend-images') }}/element.png" class="BottomHeadingLine" alt="">

            <h2>Welcome to <br>
                Last Few Words</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            <a href="{{route("register")}}" class="btn">
                Create Account
            </a>
        </div>
    </div>
</section>


<section class="AboutSec sec2">
    <img class="border" src="{{ asset('storage/assets/frontend-images') }}/border.png" alt="">
    <div class="row">

        <div class="left timeless-left">
            <h2>
                A Timeless Connection
                <svg  class="BottomHeadingLine" style="left: 4.8rem; width : 20.4rem" xmlns="http://www.w3.org/2000/svg" width="204" height="14" viewBox="0 0 204 14" fill="none">
                    <g clip-path="url(#clip0_232_12255)">
                        <path d="M204 2.08829C202.961 2.00104 202.009 2.00104 200.971 2.00104C199.932 2.00104 198.98 1.91379 197.941 1.82654C195.691 1.65204 193.527 1.3903 191.277 1.2158C187.036 0.86681 182.709 0.517817 178.468 0.430568C174.573 0.256072 170.591 0.168823 166.697 0.168823C165.658 0.168823 164.619 0.168823 163.667 0.168823C159.773 0.256072 155.878 0.256072 151.983 0.34332C142.895 0.605065 133.721 0.86681 124.633 1.30305C115.718 1.73929 106.804 2.17553 97.9754 2.69902C93.6479 2.96077 89.2338 3.22251 84.9062 3.48426C80.146 3.9205 75.3857 4.18225 70.7119 4.53124C60.9317 5.31647 51.238 6.01446 41.4578 6.7997C32.9758 7.49768 24.5804 8.45741 16.185 9.67889C10.8188 10.5514 5.36614 11.5111 0 12.4708C6.1451 12.9071 12.3767 13.0816 18.6084 13.1688C22.6763 13.1688 26.7442 13.0816 30.7255 12.9943C33.322 12.9071 35.9185 12.7326 38.6016 12.5581C40.2461 12.4708 41.804 12.2963 43.3619 12.1218C47.6029 11.6856 51.9304 11.3366 56.1714 10.9004C61.1048 10.4641 65.9516 9.94064 70.885 9.50439C75.905 9.06815 81.0115 8.63191 86.0314 8.19567C90.532 7.84668 95.1192 7.49768 99.7064 7.14869C104.12 6.7997 108.621 6.53795 113.035 6.27621C117.536 6.01446 121.95 5.75272 126.451 5.49097C131.038 5.22923 135.538 5.14198 140.126 4.96748C148.434 4.61849 156.743 4.53124 165.139 4.44399C169.812 4.44399 174.4 4.26949 179.073 4.095C183.661 3.9205 188.248 3.746 192.748 3.48426C194.566 3.39701 196.47 3.30976 198.288 3.13527C199.153 3.04802 200.105 2.96077 200.971 2.78627C201.75 2.61178 202.529 2.35003 203.308 2.26278C203.567 2.17553 203.74 2.08829 204 2.08829Z" fill="#6FD0B8"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_232_12255">
                            <rect width="204" height="13" fill="white" transform="translate(0 0.168823)"/>
                        </clipPath>
                    </defs>
                </svg>
            </h2>
            <p>LastFewWords offers the opportunity for users to establish connections that transcend generations and time itself.</p>
            <a href="{{route("register")}}" class="btn">Create Account</a>
        </div>
        <div class="right timeless-right">

            <img src="{{ asset('storage/assets/frontend-images') }}/img1.png" alt="">
        </div>
    </div>
    <div class="row row2">

        <div class="left forever-in-words-left">
            <h2>Forever in Words
                <svg  class="BottomHeadingLine" style="left: 24.9rem; width : 14.9rem " xmlns="http://www.w3.org/2000/svg" width="149" height="10" viewBox="0 0 149 10" fill="none">
                    <g clip-path="url(#clip0_232_12263)">
                        <path d="M149 1.47651C148.241 1.4094 147.546 1.4094 146.787 1.4094C146.029 1.4094 145.333 1.34228 144.575 1.27517C142.931 1.14094 141.351 0.939597 139.707 0.805369C136.61 0.536913 133.449 0.268456 130.351 0.201342C127.507 0.0671141 124.599 0 121.754 0C120.995 0 120.237 0 119.541 0C116.697 0.0671141 113.852 0.0671141 111.007 0.134228C104.37 0.33557 97.6686 0.536913 91.031 0.872483C84.5197 1.20805 78.0085 1.54362 71.5605 1.94631C68.3997 2.14765 65.1756 2.34899 62.0149 2.55034C58.538 2.88591 55.0611 3.08725 51.6474 3.3557C44.504 3.95973 37.4238 4.49664 30.2804 5.10067C24.0853 5.63758 17.9533 6.37584 11.8214 7.31544C7.90199 7.98658 3.91939 8.72483 0 9.46309C4.48833 9.79866 9.03988 9.93289 13.5914 10C16.5626 10 19.5337 9.93289 22.4417 9.86577C24.3381 9.79866 26.2346 9.66443 28.1943 9.5302C29.3954 9.46309 30.5333 9.32886 31.6712 9.19463C34.7688 8.85906 37.9296 8.5906 41.0272 8.25503C44.6305 7.91946 48.1706 7.51678 51.7739 7.18121C55.4404 6.84564 59.1701 6.51007 62.8367 6.1745C66.1239 5.90604 69.4743 5.63758 72.8248 5.36913C76.0488 5.10067 79.336 4.89933 82.56 4.69799C85.8473 4.49664 89.0713 4.2953 92.3585 4.09396C95.709 3.89262 98.9962 3.8255 102.347 3.69128C108.415 3.42282 114.484 3.35571 120.616 3.28859C124.03 3.28859 127.38 3.15436 130.794 3.02013C134.144 2.88591 137.495 2.75168 140.782 2.55034C142.109 2.48322 143.5 2.41611 144.828 2.28188C145.46 2.21477 146.155 2.14765 146.787 2.01342C147.356 1.87919 147.925 1.67785 148.494 1.61074C148.684 1.54362 148.81 1.47651 149 1.47651Z" fill="#6FD0B8"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_232_12263">
                            <rect width="149" height="10" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </h2>
            <p>Memories shared on LastFewWords remain forever in words, creating a lasting impact.
            </p>
            <a href="{{route("register")}}" class="btn">Create Account</a>
        </div>
        <div class="right forever-in-words-right">

            <img src="{{ asset('storage/assets/frontend-images') }}/img2.png" alt="">
        </div>
    </div>

    <div class="row">
        <div class="left digital-time-left">
            <h2>
                Your Digital Time Capsule
                <svg class="BottomHeadingLine" style="left : 29.4rem ;width : 10.8rem" xmlns="http://www.w3.org/2000/svg" width="108" height="7" viewBox="0 0 108 7" fill="none">
                    <g clip-path="url(#clip0_232_12270)">
                        <path d="M108 1.03356C107.45 0.986577 106.946 0.986577 106.396 0.986577C105.846 0.986577 105.342 0.939597 104.793 0.892617C103.601 0.798658 102.456 0.657718 101.264 0.563758C99.0191 0.375839 96.728 0.187919 94.4828 0.14094C92.4209 0.0469799 90.3131 0 88.2512 0C87.7013 0 87.1515 0 86.6474 0C84.5855 0.0469799 82.5236 0.0469799 80.4616 0.0939597C75.6504 0.234899 70.7934 0.375839 65.9822 0.610738C61.2626 0.845638 56.5431 1.08054 51.8693 1.36242C49.5783 1.50336 47.2414 1.6443 44.9504 1.78523C42.4302 2.02013 39.9101 2.16107 37.4357 2.34899C32.258 2.77181 27.126 3.14765 21.9482 3.57047C17.4578 3.94631 13.0132 4.46309 8.56852 5.12081C5.72762 5.5906 2.8409 6.10738 0 6.62416C3.25329 6.85906 6.5524 6.95302 9.85151 7C12.0051 7 14.1587 6.95302 16.2664 6.90604C17.6411 6.85906 19.0157 6.7651 20.4361 6.67114C21.3067 6.62416 22.1315 6.5302 22.9563 6.43624C25.2015 6.20134 27.4926 6.01342 29.7378 5.77852C32.3496 5.54362 34.9156 5.26174 37.5274 5.02685C40.185 4.79195 42.8884 4.55705 45.546 4.32215C47.9287 4.13423 50.3572 3.94631 52.7857 3.75839C55.1226 3.57047 57.5053 3.42953 59.8422 3.28859C62.2249 3.14765 64.5617 3.00671 66.9444 2.86577C69.3729 2.72483 71.7556 2.67785 74.1841 2.58389C78.5829 2.39597 82.9818 2.34899 87.4264 2.30201C89.9007 2.30201 92.3292 2.20805 94.8036 2.11409C97.2321 2.02013 99.6606 1.92617 102.043 1.78523C103.006 1.73826 104.014 1.69128 104.976 1.59732C105.434 1.55034 105.938 1.50336 106.396 1.4094C106.809 1.31544 107.221 1.1745 107.633 1.12752C107.771 1.08054 107.863 1.03356 108 1.03356Z" fill="#6FD0B8"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_232_12270">
                            <rect width="108" height="7" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </h2>
            <p>Memories shared on LastFewWords remain forever in words, creating a lasting impact.
            </p>
            <a href="{{route("register")}}" class="btn">Create Account</a>
        </div>
        <div class="right digital-time-right">

            <img src="{{ asset('storage/assets/frontend-images') }}/img3.png" alt="">
        </div>
    </div>
    <div class="row row2">
        <div class="left preserve-left">
            <h2>
                Preserve Your Legacy
                <svg class="BottomHeadingLine" style="left: .2rem; width : 20.4rem" xmlns="http://www.w3.org/2000/svg" width="204" height="14" viewBox="0 0 204 14" fill="none">
                    <g clip-path="url(#clip0_232_12277)">
                        <path d="M204 2.31522C202.961 2.22797 202.009 2.22797 200.971 2.22797C199.932 2.22797 198.98 2.14072 197.941 2.05347C195.691 1.87897 193.527 1.61723 191.277 1.44273C187.036 1.09374 182.709 0.744745 178.468 0.657497C174.573 0.483 170.591 0.395752 166.697 0.395752C165.658 0.395752 164.619 0.395752 163.667 0.395752C159.773 0.483 155.878 0.483 151.983 0.570249C142.895 0.831994 133.721 1.09374 124.633 1.52998C115.718 1.96622 106.804 2.40246 97.9754 2.92595C93.6479 3.1877 89.2338 3.44944 84.9062 3.71119C80.146 4.14743 75.3857 4.40917 70.7119 4.75817C60.9317 5.5434 51.238 6.24139 41.4578 7.02662C32.9758 7.72461 24.5804 8.68434 16.185 9.90582C10.8188 10.7783 5.36614 11.738 0 12.6978C6.1451 13.134 12.3767 13.3085 18.6084 13.3958C22.6763 13.3958 26.7442 13.3085 30.7255 13.2213C33.322 13.134 35.9185 12.9595 38.6016 12.785C40.2461 12.6978 41.804 12.5233 43.3619 12.3488C47.6029 11.9125 51.9304 11.5635 56.1714 11.1273C61.1048 10.6911 65.9516 10.1676 70.885 9.73132C75.905 9.29508 81.0115 8.85884 86.0314 8.4226C90.532 8.0736 95.1192 7.72461 99.7064 7.37562C104.12 7.02662 108.621 6.76488 113.035 6.50313C117.536 6.24139 121.95 5.97964 126.451 5.7179C131.038 5.45615 135.538 5.36891 140.126 5.19441C148.434 4.84542 156.743 4.75817 165.139 4.67092C169.812 4.67092 174.4 4.49642 179.073 4.32193C183.661 4.14743 188.248 3.97293 192.748 3.71119C194.566 3.62394 196.47 3.53669 198.288 3.3622C199.153 3.27495 200.105 3.1877 200.971 3.0132C201.75 2.83871 202.529 2.57696 203.308 2.48971C203.567 2.40246 203.74 2.31522 204 2.31522Z" fill="#6FD0B8"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_232_12277">
                            <rect width="204" height="13" fill="white" transform="translate(0 0.395752)"/>
                        </clipPath>
                    </defs>
                </svg>
            </h2>
            <p>Memories shared on LastFewWords remain forever in words, creating a lasting impact.
            </p>
            <a href="{{route("register")}}" class="btn">Create Account</a>
        </div>
        <div class="right preserve-right">

            <img src="{{ asset('storage/assets/frontend-images') }}/img4.png" alt="">
        </div>
    </div>
</section>





<section class="journey">
    <h2>
        Capturing Life's Journey
        <svg class="BottomHeadingLine" style="right: 32.3rem; width :18.2rem" xmlns="http://www.w3.org/2000/svg" width="182" height="13" viewBox="0 0 182 13" fill="none">
            <g clip-path="url(#clip0_232_12761)">
                <path d="M181.701 1.97591C180.78 1.89538 179.935 1.89538 179.013 1.89538C178.092 1.89538 177.247 1.81484 176.326 1.7343C174.329 1.57323 172.409 1.33162 170.413 1.17054C166.65 0.848397 162.81 0.526249 159.047 0.445712C155.592 0.284638 152.059 0.204102 148.604 0.204102C147.682 0.204102 146.761 0.204102 145.916 0.204102C142.46 0.284638 139.005 0.284638 135.549 0.365175C127.486 0.606786 119.346 0.848397 111.282 1.25108C103.373 1.65377 95.4632 2.05645 87.6303 2.53967C83.7907 2.78128 79.8743 3.02289 76.0346 3.2645C71.8111 3.66719 67.5875 3.9088 63.4407 4.23095C54.7631 4.95578 46.1624 5.60007 37.4848 6.32491C29.9591 6.9692 22.5103 7.85511 15.0614 8.98263C10.3002 9.78799 5.46231 10.6739 0.701172 11.5598C6.15344 11.9625 11.6825 12.1236 17.2116 12.2041C20.8208 12.2041 24.4301 12.1236 27.9625 12.043C30.2663 11.9625 32.5701 11.8014 34.9506 11.6403C36.4097 11.5598 37.792 11.3987 39.1742 11.2377C42.9371 10.835 46.7767 10.5128 50.5395 10.1101C54.9167 9.70746 59.2171 9.22424 63.5943 8.82155C68.0482 8.41887 72.579 8.01618 77.033 7.6135C81.0262 7.29135 85.0962 6.9692 89.1662 6.64705C93.0826 6.32491 97.0758 6.0833 100.992 5.84169C104.985 5.60007 108.902 5.35846 112.895 5.11685C116.965 4.87524 120.958 4.79471 125.028 4.63363C132.4 4.31148 139.772 4.23095 147.221 4.15041C151.368 4.15041 155.438 3.98934 159.585 3.82826C163.655 3.66719 167.725 3.50611 171.718 3.2645C173.331 3.18397 175.02 3.10343 176.633 2.94236C177.401 2.86182 178.245 2.78128 179.013 2.62021C179.705 2.45914 180.396 2.21752 181.087 2.13699C181.317 2.05645 181.471 1.97591 181.701 1.97591Z" fill="#6FD0B8"/>
            </g>
            <defs>
                <clipPath id="clip0_232_12761">
                    <rect width="181" height="12" fill="white" transform="translate(0.701172 0.204102)"/>
                </clipPath>
            </defs>
        </svg>
    </h2>
    <p>Emphasize how LastFewWords captures the entire journey of life, from its beginning to its last chapter.</p>
    <a href="{{route("register")}}" class="btn">
        Create Account
    </a>
</section>


<section class="cards">
    <div class="left">
        <div class="card white">
            <h2>Your Eternal Voice</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            <div class="bottom">
                <a href="{{route("register")}}">
                    Sign Up
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="none">
                        <g clip-path="url(#clip0_232_12632)">
                            <path d="M30.0915 7.94977C29.8962 8.21321 29.7399 8.51429 29.5056 8.7401C27.5759 10.6068 25.6384 12.4584 23.6931 14.3175C23.1774 14.8143 22.5056 14.8519 22.0134 14.4304C21.4977 13.9788 21.4821 13.2562 21.9977 12.7519C23.2634 11.5326 24.529 10.3207 25.7946 9.10891C25.8649 9.04117 25.9352 8.9659 26.0524 8.84547C25.8806 8.84547 25.7712 8.84547 25.654 8.84547C17.5681 8.84547 9.48212 8.84547 1.39618 8.84547C0.739933 8.84547 0.29462 8.56698 0.130558 8.04762C-0.0960048 7.35515 0.411808 6.6401 1.16181 6.58741C1.27118 6.57988 1.37275 6.58741 1.48212 6.58741C9.529 6.58741 17.5759 6.58741 25.6227 6.58741C25.7399 6.58741 25.8571 6.58741 26.0446 6.58741C25.9352 6.4745 25.8571 6.39924 25.7868 6.32397C24.5212 5.11214 23.2556 3.89278 21.9899 2.68096C21.6462 2.34977 21.529 1.95838 21.6618 1.52182C21.7868 1.10031 22.0993 0.83687 22.5446 0.746547C22.9821 0.656225 23.3493 0.806762 23.6618 1.10031C25.0759 2.46268 26.4977 3.81751 27.9196 5.17988C28.4431 5.68418 28.9821 6.17343 29.4899 6.70031C29.7165 6.93364 29.8806 7.22719 30.0759 7.49063C30.0915 7.6487 30.0915 7.79923 30.0915 7.94977Z" fill="#6FD0B8"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_232_12632">
                                <rect width="30" height="14" fill="white" transform="translate(0.0917969 0.723877)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <img src="{{ asset('storage/assets/frontend-images') }}/mic.gif" style="width: 9.3rem;" alt="">
            </div>
        </div>
        <div class="card">
            <h2>Upload Videos</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            <div class="bottom">
                <a href="{{route("register")}}">
                    Sign Up
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="none">
                        <g clip-path="url(#clip0_232_12652)">
                            <path d="M30.0915 7.94977C29.8962 8.21321 29.7399 8.51429 29.5056 8.7401C27.5759 10.6068 25.6384 12.4584 23.6931 14.3175C23.1774 14.8143 22.5056 14.8519 22.0134 14.4304C21.4977 13.9788 21.4821 13.2562 21.9977 12.7519C23.2634 11.5326 24.529 10.3207 25.7946 9.10891C25.8649 9.04117 25.9352 8.9659 26.0524 8.84547C25.8806 8.84547 25.7712 8.84547 25.654 8.84547C17.5681 8.84547 9.48212 8.84547 1.39618 8.84547C0.739933 8.84547 0.29462 8.56698 0.130558 8.04762C-0.0960048 7.35515 0.411808 6.6401 1.16181 6.58741C1.27118 6.57988 1.37275 6.58741 1.48212 6.58741C9.529 6.58741 17.5759 6.58741 25.6227 6.58741C25.7399 6.58741 25.8571 6.58741 26.0446 6.58741C25.9352 6.4745 25.8571 6.39924 25.7868 6.32397C24.5212 5.11214 23.2556 3.89278 21.9899 2.68096C21.6462 2.34977 21.529 1.95838 21.6618 1.52182C21.7868 1.10031 22.0993 0.83687 22.5446 0.746547C22.9821 0.656225 23.3493 0.806762 23.6618 1.10031C25.0759 2.46268 26.4977 3.81751 27.9196 5.17988C28.4431 5.68418 28.9821 6.17343 29.4899 6.70031C29.7165 6.93364 29.8806 7.22719 30.0759 7.49063C30.0915 7.6487 30.0915 7.79923 30.0915 7.94977Z" fill="#52525B"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_232_12652">
                                <rect width="30" height="14" fill="white" transform="translate(0.0917969 0.723877)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <img src="{{ asset('storage/assets/frontend-images') }}/video.png" style="width: 8.8rem;" alt="">
            </div>
        </div>

    </div>
    <div class="right">
        <div class="card white">
            <h2>Add Family Members</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            <div class="bottom">
                <a href="{{route("register")}}">
                    Sign Up
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="none">
                        <g clip-path="url(#clip0_232_12691)">
                            <path d="M30.0456 7.94977C29.8503 8.21321 29.694 8.51429 29.4597 8.7401C27.53 10.6068 25.5925 12.4584 23.6472 14.3175C23.1315 14.8143 22.4597 14.8519 21.9675 14.4304C21.4518 13.9788 21.4362 13.2562 21.9518 12.7519C23.2175 11.5326 24.4831 10.3207 25.7487 9.10891C25.819 9.04117 25.8893 8.9659 26.0065 8.84547C25.8347 8.84547 25.7253 8.84547 25.6081 8.84547C17.5222 8.84547 9.43622 8.84547 1.35028 8.84547C0.694034 8.84547 0.248722 8.56698 0.0846593 8.04762C-0.141903 7.35515 0.365909 6.6401 1.11591 6.58741C1.22528 6.57988 1.32685 6.58741 1.43622 6.58741C9.4831 6.58741 17.53 6.58741 25.5768 6.58741C25.694 6.58741 25.8112 6.58741 25.9987 6.58741C25.8893 6.4745 25.8112 6.39924 25.7409 6.32397C24.4753 5.11214 23.2097 3.89278 21.944 2.68096C21.6003 2.34977 21.4831 1.95838 21.6159 1.52182C21.7409 1.10031 22.0534 0.83687 22.4987 0.746547C22.9362 0.656225 23.3034 0.806762 23.6159 1.10031C25.03 2.46268 26.4518 3.81751 27.8737 5.17988C28.3972 5.68418 28.9362 6.17343 29.444 6.70031C29.6706 6.93364 29.8347 7.22719 30.03 7.49063C30.0456 7.6487 30.0456 7.79923 30.0456 7.94977Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_232_12691">
                                <rect width="30" height="14" fill="white" transform="translate(0.0458984 0.723877)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <img src="{{ asset('storage/assets/frontend-images') }}/friends.png" style="width: 8.8rem;" alt="">
            </div>
        </div>
        <div class="card">
            <h2>Send Messages</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
            <div class="bottom">
                <a href="{{route("register")}}">
                    Sign Up
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="15" viewBox="0 0 31 15" fill="none">
                        <g clip-path="url(#clip0_232_12674)">
                            <path d="M30.0456 7.94977C29.8503 8.21321 29.694 8.51429 29.4597 8.7401C27.53 10.6068 25.5925 12.4584 23.6472 14.3175C23.1315 14.8143 22.4597 14.8519 21.9675 14.4304C21.4518 13.9788 21.4362 13.2562 21.9518 12.7519C23.2175 11.5326 24.4831 10.3207 25.7487 9.10891C25.819 9.04117 25.8893 8.9659 26.0065 8.84547C25.8347 8.84547 25.7253 8.84547 25.6081 8.84547C17.5222 8.84547 9.43622 8.84547 1.35028 8.84547C0.694034 8.84547 0.248722 8.56698 0.0846593 8.04762C-0.141903 7.35515 0.365909 6.6401 1.11591 6.58741C1.22528 6.57988 1.32685 6.58741 1.43622 6.58741C9.4831 6.58741 17.53 6.58741 25.5768 6.58741C25.694 6.58741 25.8112 6.58741 25.9987 6.58741C25.8893 6.4745 25.8112 6.39924 25.7409 6.32397C24.4753 5.11214 23.2097 3.89278 21.944 2.68096C21.6003 2.34977 21.4831 1.95838 21.6159 1.52182C21.7409 1.10031 22.0534 0.83687 22.4987 0.746547C22.9362 0.656225 23.3034 0.806762 23.6159 1.10031C25.03 2.46268 26.4518 3.81751 27.8737 5.17988C28.3972 5.68418 28.9362 6.17343 29.444 6.70031C29.6706 6.93364 29.8347 7.22719 30.03 7.49063C30.0456 7.6487 30.0456 7.79923 30.0456 7.94977Z" fill="#6FD0B8"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_232_12674">
                                <rect width="30" height="14" fill="white" transform="translate(0.0458984 0.723877)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <img src="{{ asset('storage/assets/frontend-images') }}/messaging.png" style="width: 8rem;" alt="">
            </div>
        </div>
    </div>
</section>


<section class="journey learnmore">
    <h2>Learn More About Us.
        <svg class="BottomHeadingLine" style="right: 39rem; width : 18.1rem" xmlns="http://www.w3.org/2000/svg" width="181" height="13" viewBox="0 0 181 13" fill="none">
            <g clip-path="url(#clip0_232_12704)">
                <path d="M181 2.30111C180.078 2.22057 179.234 2.22057 178.312 2.22057C177.391 2.22057 176.546 2.14004 175.625 2.0595C173.628 1.89842 171.708 1.65681 169.712 1.49574C165.949 1.17359 162.109 0.851445 158.346 0.770908C154.891 0.609834 151.358 0.529297 147.902 0.529297C146.981 0.529297 146.059 0.529297 145.215 0.529297C141.759 0.609834 138.303 0.609834 134.848 0.690371C126.784 0.931981 118.644 1.17359 110.581 1.57628C102.672 1.97896 94.762 2.38165 86.9291 2.86487C83.0895 3.10648 79.1731 3.34809 75.3335 3.5897C71.1099 3.99238 66.8863 4.23399 62.7395 4.55614C54.0619 5.28097 45.4612 5.92527 36.7836 6.6501C29.258 7.2944 21.8091 8.1803 14.3602 9.30782C9.59907 10.1132 4.76114 10.9991 0 11.885C5.45227 12.2877 10.9813 12.4488 16.5104 12.5293C20.1196 12.5293 23.7289 12.4488 27.2613 12.3682C29.5651 12.2877 31.8689 12.1266 34.2495 11.9655C35.7085 11.885 37.0908 11.7239 38.4731 11.5629C42.2359 11.1602 46.0755 10.838 49.8384 10.4353C54.2155 10.0327 58.5159 9.54943 62.8931 9.14675C67.3471 8.74406 71.8778 8.34138 76.3318 7.93869C80.325 7.61655 84.395 7.2944 88.465 6.97225C92.3814 6.6501 96.3746 6.40849 100.291 6.16688C104.284 5.92527 108.201 5.68366 112.194 5.44205C116.264 5.20044 120.257 5.1199 124.327 4.95883C131.699 4.63668 139.071 4.55614 146.52 4.47561C150.667 4.47561 154.737 4.31453 158.884 4.15346C162.954 3.99238 167.024 3.83131 171.017 3.5897C172.63 3.50916 174.319 3.42863 175.932 3.26755C176.7 3.18702 177.544 3.10648 178.312 2.9454C179.003 2.78433 179.695 2.54272 180.386 2.46218C180.616 2.38165 180.77 2.30111 181 2.30111Z" fill="#6FD0B8"/>
            </g>
            <defs>
                <clipPath id="clip0_232_12704">
                    <rect width="181" height="12" fill="white" transform="translate(0 0.529297)"/>
                </clipPath>
            </defs>
        </svg>
    </h2>
    <p>Emphasize how LastFewWords captures the entire journey of life, from its beginning to its last chapter.</p>
    <a href="{{route("register")}}" class="btn">
        Create Account
    </a>
</section>


<section class="contact">
    <div class="row">

        <div class="left">

            <h2>Let’s Stay In Touch</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
        </div>
        <div class="right">
            <input type="email" placeholder="Enter Your Email Address... ">
            <a href="" class="btn">Subscribe</a>
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


    gsap.from(".digital-time-left", {
        opacity: 0,
        x: -90,
        duration: 1,
        scrollTrigger: {
            trigger: ".digital-time-left",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });
    gsap.from(".digital-time-right", {
        opacity: 0,
        x: 90,
        duration: 1,
        scrollTrigger: {
            trigger: ".digital-time-right",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });

    gsap.from(".preserve-left", {
        opacity: 0,
        x: -90,
        duration: 1,
        scrollTrigger: {
            trigger: ".preserve-left",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });
    gsap.from(".preserve-right", {
        opacity: 0,
        x: 90,
        duration: 1,
        scrollTrigger: {
            trigger: ".preserve-right",
            scroller: "body",
            // markers: true,
            start: "top 80%",
        },
    });


    // gsap.from(".randomthree", {
    //   opacity: 0,
    //   x: -30,
    //   duration: 1,
    //   scrollTrigger: {
    //     trigger: ".randomthree",
    //     scroller: "body",
    //     // markers: true,
    //     start: "top 80%",
    //   },
    // });
    // gsap.from(".randomfour", {
    //   opacity: 0,
    //   x: 30,
    //   duration: 1,
    //   scrollTrigger: {
    //     trigger: ".randomfour",
    //     scroller: "body",
    //     // markers: true,
    //     start: "top 80%",
    //   },
    // });
    // gsap.from(".randomfive", {
    //   opacity: 0,
    //   x: -30,
    //   duration: 1,
    //   scrollTrigger: {
    //     trigger: ".randomfive",
    //     scroller: "body",
    //     // markers: true,
    //     start: "top 80%",
    //   },
    // });
</script>
</body>
</html>