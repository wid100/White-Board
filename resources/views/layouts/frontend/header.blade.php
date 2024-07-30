    <!-- ============ Header ============= -->
    <header id="sticky-header">
        <div class="header-top sticky-header-mobile">
            <div class="container">
                <div class="header-top-wrapper">
                    <a href="/" class="logo">
                        <img src="/assets/images/logo.png" alt="" />
                    </a>
                    <form action="">
                        <div class="form-search">
                            <input class="form-input" type="text" placeholder="Search for authors, articles..." />
                            <button type="button" class="form-search-btn">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                            </button>
                        </div>
                    </form>
                    <div class="top-right-header">
                        <div class="header-login">
                            <a href="" data-bs-toggle="modal" data-bs-target="#loginModel">LOG IN</a>
                        </div>
                        <div class="hamburger-menu">
                            <img src="/assets/images/menu.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu sticky-header">
            <div class="container">
                <div class="header-menu">
                    <div class="mobile-menu-overlay"></div>
                    <div class="close-btn">
                        <img src="/assets/images/close.svg" alt="" />
                    </div>
                    <div class="header-left">
                        <a href="/" class="logo-mobile">
                            <img src="/assets/images/footer-logo.png" alt="" />
                        </a>
                        <form action="">
                            <div class="form-search-mobile">
                                <input type="text" placeholder="Search for authors, articles..." />
                                <button type="submit">
                                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                </button>
                            </div>
                        </form>
                        <ul>
                            <li class="header-menu-link">
                                <a href="#">ABOUT US
                                    <span> <i class="fa-solid fa-chevron-down"></i></span></a>
                                <div class="megamenu megamenu-md">
                                    <div class="megamenu-list">
                                        <ul class="about-us-items" id="myTab" role="tablist">
                                            <li class="about-us-item" role="presentation">
                                                <button onclick="redirectToAboutPage('#about-whiteboard')"
                                                    class="about-us-btn active" id="about-whiteboard-tab"
                                                    data-bs-toggle="tab" data-bs-target="#about-whiteboard"
                                                    type="button" role="tab" aria-controls="about-whiteboard"
                                                    aria-selected="true">
                                                    About WhiteBoard
                                                </button>
                                            </li>
                                            <li class="about-us-item" role="presentation">
                                                <button class="about-us-btn" id="write-for-tab"
                                                    onclick="redirectToAboutPage('#write-for')" data-bs-toggle="tab"
                                                    data-bs-target="#write-for" type="button" role="tab"
                                                    aria-controls="write-for" aria-selected="false">
                                                    Write For Us
                                                </button>
                                            </li>
                                            <li class="about-us-item" role="presentation">
                                                <button class="about-us-btn" id="advertise-with-tab"
                                                    onclick="redirectToAboutPage('#advertise-with')"
                                                    data-bs-toggle="tab" data-bs-target="#advertise-with" type="button"
                                                    role="tab" aria-controls="advertise-with" aria-selected="false">
                                                    Advertise With Us
                                                </button>
                                            </li>
                                            <li class="about-us-item" role="presentation">
                                                <button class="about-us-btn"
                                                    onclick="redirectToAboutPage('#permission')" id="permission-tab"
                                                    data-bs-toggle="tab" data-bs-target="#permission" type="button"
                                                    role="tab" aria-controls="permission" aria-selected="false">
                                                    Permission
                                                </button>
                                            </li>
                                            <li class="about-us-item" role="presentation">
                                                <button class="about-us-btn"
                                                    onclick="redirectToAboutPage('#contact-us')" id="contact-us-tab"
                                                    data-bs-toggle="tab" data-bs-target="#contact-us" type="button"
                                                    role="tab" aria-controls="contact-us" aria-selected="false">
                                                    Contact Us
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="header-menu-link">
                                <a href="/issue-list.html">ISSUE </a>
                            </li>
                            <li>
                                <a href="/people.html">PEOPLE</a>
                            </li>
                            <li>
                                <a href="/all-development.html">EDITORIAL NOTE</a>
                            </li>
                            <li>
                                <a href="/all-development.html">SECTION</a>
                            </li>
                        </ul>
                    </div>
                    <div class="category-list-mobile">
                        <ul>
                            <li><a href="/all-development.html"> Governance </a></li>
                            <li><a href="/all-development.html"> Technology </a></li>
                            <li><a href="/all-development.html"> Development </a></li>
                            <li><a href="/all-development.html"> Highlight </a></li>
                            <li><a href="/all-development.html"> Economy </a></li>
                            <li><a href="/all-development.html"> Editorial </a></li>
                            <li><a href="/all-development.html"> Youth </a></li>
                            <li><a href="/all-development.html"> Gender </a></li>
                            <li><a href="/all-development.html"> Foreign Policy </a></li>
                            <li><a href="/all-development.html"> Industry Insight </a></li>
                        </ul>
                    </div>
                    <div class="header-right">
                        <button class="white-text" id="write-for-tab" onclick="redirectToAboutPage('#write-for')"
                            data-bs-toggle="tab" data-bs-target="#write-for" type="button" role="tab"
                            aria-controls="write-for" aria-selected="false">
                            Write For Us
                        </button>

                        <a href="/subscription.html" class="custom-btn">Subscribe</a>
                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/whiteboardmagazine" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/whiteboardedit" target="_blank"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.1674 17.8399C15.6251 17.8399 14.0995 17.8375 12.5741 17.8433C12.4071 17.8439 12.3061 17.8092 12.2077 17.6541C11.9154 17.1936 11.5934 16.7518 11.2841 16.3019C10.711 15.4684 10.1401 14.6332 9.56536 13.8006C9.00914 12.9951 8.44897 12.1922 7.89099 11.3878C7.85609 11.3374 7.82487 11.2844 7.78129 11.2159C7.65194 11.357 7.52602 11.4874 7.4079 11.6245C7.00171 12.096 6.59868 12.5702 6.19372 13.0426C5.94038 13.3383 5.68573 13.6328 5.43186 13.928C5.15888 14.2453 4.88651 14.5631 4.61335 14.8803C4.3402 15.1974 4.06616 15.5137 3.79309 15.8309C3.53195 16.1342 3.27194 16.4385 3.0108 16.7418C2.71414 17.0864 2.41792 17.4315 2.11793 17.7732C2.08837 17.8069 2.03409 17.8373 1.99095 17.8378C1.566 17.8425 1.14105 17.8407 0.695312 17.8407C0.743455 17.7885 0.784231 17.7469 0.822114 17.7029C1.02854 17.4628 1.23426 17.222 1.44025 16.9816C1.93763 16.4008 2.43449 15.8197 2.9324 15.2395C3.45636 14.6289 3.98215 14.0198 4.50558 13.4087C4.97447 12.8612 5.44055 12.3114 5.90917 11.7638C6.28554 11.3239 6.66305 10.8852 7.04144 10.4472C7.15964 10.3103 7.16175 10.3121 7.05801 10.1612C6.2808 9.03042 5.50456 7.89894 4.7263 6.76886C4.10904 5.87275 3.4881 4.97909 2.87119 4.08271C2.26463 3.20141 1.66141 2.31783 1.05607 1.43575C0.947688 1.27764 0.835969 1.12181 0.716534 0.951867C0.796157 0.951867 0.863153 0.951955 0.930149 0.951867C2.42371 0.949412 3.91717 0.947746 5.41073 0.943011C5.51833 0.94266 5.57673 0.983173 5.63618 1.07464C5.87225 1.43759 6.12042 1.79274 6.3656 2.14973C6.8109 2.79777 7.25689 3.44519 7.70324 4.09244C8.36241 5.04827 9.0222 6.00367 9.68155 6.95941C9.71461 7.00729 9.75092 7.05377 9.7774 7.10516C9.82414 7.19601 9.86807 7.17619 9.922 7.11252C10.3669 6.58778 10.8108 6.06216 11.2588 5.54022C11.7117 5.01258 12.1712 4.49065 12.624 3.96301C13.2403 3.24464 13.852 2.52224 14.468 1.80352C14.6953 1.53826 14.9278 1.27738 15.1619 1.01807C15.1927 0.983875 15.2468 0.951692 15.2905 0.951166C15.712 0.946168 16.1335 0.948184 16.5888 0.948184C14.5329 3.33996 12.4911 5.71543 10.4527 8.08695C12.6907 11.3376 14.925 14.5828 17.1674 17.8399ZM2.75202 2.01626C2.77044 2.05265 2.77903 2.07554 2.79245 2.0951C3.22748 2.72796 3.66287 3.36066 4.09843 3.99309C5.19483 5.58494 6.29159 7.17645 7.38764 8.76848C8.17406 9.91084 8.95924 11.054 9.74557 12.1963C10.3358 13.0539 10.9259 13.9116 11.5181 14.7678C11.9612 15.4083 12.4083 16.0461 12.8515 16.6865C12.9001 16.7566 12.9556 16.7852 13.0417 16.7848C13.701 16.7809 14.3604 16.7814 15.0198 16.7798C15.0526 16.7797 15.0856 16.7714 15.1356 16.7648C15.0717 16.6771 15.0188 16.6085 14.9701 16.5371C14.4905 15.8335 14.0133 15.1281 13.5317 14.4257C12.8917 13.4922 12.2484 12.561 11.6065 11.6288C10.8777 10.5706 10.1491 9.51246 9.42032 8.45437C8.90829 7.7111 8.39609 6.96783 7.88371 6.22483C7.59643 5.80829 7.30837 5.39237 7.02127 4.97575C6.61236 4.38235 6.20293 3.78929 5.79587 3.19466C5.54104 2.82241 5.29191 2.4463 5.0348 2.07572C5.01016 2.0402 4.94711 2.01328 4.90177 2.01293C4.22418 2.00872 3.54659 2.0096 2.86909 2.0096C2.83463 2.0096 2.80025 2.01346 2.75202 2.01626Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/showcase/whiteboardmagazine" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="category-list">
                    <ul>
                        <li><a href="/all-development.html"> Governance </a></li>
                        <li><a href="/all-development.html"> Technology </a></li>
                        <li><a href="/all-development.html"> Development </a></li>
                        <li><a href="/all-development.html"> Highlight </a></li>
                        <li><a href="/all-development.html"> Economy </a></li>
                        <li><a href="/all-development.html"> Editorial </a></li>
                        <li><a href="/all-development.html"> Youth </a></li>
                        <li><a href="/all-development.html"> Gender </a></li>
                        <li><a href="/all-development.html"> Foreign Policy </a></li>
                        <li><a href="/all-development.html"> Industry Insight </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>