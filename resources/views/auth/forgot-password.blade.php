@include("auth.template.header")

    <div class="d-lg-flex half">
        <div class="bg " style="background-image: url('storage/assets/images/bg_1.jpeg'); position: relative;">
            <div class="row align-items-center justify-content-center " style="margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);">
                <div class="mainh col-md-7 mx-auto text-center">
                    <img src="storage/assets/images/logo.svg">
                    <h1>Welcome to our Last Few Words</h1>
                        <p>lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit
                            interdum, ac
                            aliquet odio mattis.</p>
                </div>
            </div>
        </div>
        <div class="contents forgotPassword">
            <div class="container form-section">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                       <div class="lock"><img src="storage/assets/images/vector.png"></div>
                        <h4>Trouble logging in?</h4>
                        <p class="mb-5">Enter your email and we'll send you a link to get back into your account.</p>
                        <form action="#" method="post">
                            <div class="form-group first">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" placeholder="Jeniferemile1268&86@gmail.com"
                                    id="email">
                            </div>
                            <div class="d-flex justify-content-between mb-5 align-items-center">
                                <div>
                                    <input type="submit" value="Send login link" class="btn rest-btn">
                                </div>
                                <div><p class=" or text-center mx-auto">OR</p></div>
                                <div> <span><a href="./signup.html" class="forgot-pass">Create free account</a></span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="storage/assets/js/jquery-3.3.1.min.js"></script>
    <script src="storage/assets/js/popper.min.js"></script>
    <script src="storage/assets/js/bootstrap.min.js"></script>
    <script src="storage/assets/js/main.js"></script>
@include("auth.template.footer")
