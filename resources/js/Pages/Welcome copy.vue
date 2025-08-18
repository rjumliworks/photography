<template>
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
            <BContainer fluid class="custom-container">
                <Link class="navbar-brand" href="/">
                    <img src="/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="30">
                    <img src="/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                </Link>
                <BButton class="navbar-toggler py-0 fs-20 text-body" type="button" v-b-toggle.navbarSupportedContent>
                    <i class="mdi mdi-menu"></i>
                </BButton>

                <BCollapse class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <BLink class="nav-link" href="#hero" @click.prevent="scrollToSection('hero')">Home
                            </BLink>
                        </li>
                        <li class="nav-item">
                            <BLink class="nav-link" href="#process" @click.prevent="scrollToSection('process')">
                                Process
                            </BLink>
                        </li>
                        <li class="nav-item">
                            <BLink class="nav-link" href="#plans" @click.prevent="scrollToSection('plans')">
                                Plans</BLink>
                        </li>
                        <li class="nav-item">
                            <BLink class="nav-link" href="#findJob" @click.prevent="scrollToSection('findJob')">Find
                                Jobs</BLink>
                        </li>
                        <li class="nav-item">
                            <BLink class="nav-link" href="#candidates" @click.prevent="scrollToSection('candidates')">
                                Candidates</BLink>
                        </li>
                        <li class="nav-item">
                            <BLink class="nav-link" href="#blog" @click.prevent="scrollToSection('blog')">Blog</BLink>
                        </li>
                    </ul>

                    <div class="">
                        <Link href="/auth/signin-basic" class="btn btn-soft-primary"><i
                                class="ri-user-3-line align-bottom me-1"></i> Login & Register</Link>
                    </div>
                </BCollapse>

            </BContainer>
        </nav>

        <section class="section job-hero-section bg-light pb-0 mt-n5" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <BContainer>
                <BRow class="justify-content-between align-items-center">
                    <BCol lg="6">
                        <div>
                            <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base">Capture. Share. Amaze </h1>
                            <p class="lead text-muted lh-base mb-4">Upload and share photos or videos, manage client access, and let them download albums in stunning PDF form — all in one place.</p>
                            
                            <div class="d-flex gap-2 mt-4">
                                <a href="auth-signup-basic.html" class="btn btn-primary">Get Started <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                                <a href="pages-pricing.html" class="btn btn-danger">View Plans <i class="ri-eye-line align-middle ms-1"></i></a>
                            </div>

                            <ul class="treding-keywords list-inline mb-0 mt-3 fs-13">
                                <li class="list-inline-item text-danger fw-semibold"><i
                                        class="mdi mdi-tag-multiple-outline align-middle"></i> Trending Keywords:</li>
                                <li class="list-inline-item">
                                    <BLink href="#">Photography,</BLink>
                                </li>
                                <li class="list-inline-item">
                                    <BLink href="#">Videography,</BLink>
                                </li>
                                <li class="list-inline-item">
                                    <BLink href="#">Portfolio,</BLink>
                                </li>
                                <li class="list-inline-item">
                                    <BLink href="#">Album</BLink>
                                </li>
                            </ul>
                        </div>
                    </BCol>
                    <BCol lg="6">
                        <div class="position-relative home-img text-center mt-5 mt-lg-0">
                            <img src="/images/job-profile2.png" alt="" class="user-img">
                        </div>
                    </BCol>
                </BRow>
            </BContainer>
        </section>

        <section class="section mb-n4" id="process">
            <BContainer>
                <BRow class="justify-content-center mt-n4">
                    <BCol lg="8">
                        <div class="text-center mb-5">
                            <h4 class="mb-2 ff-secondary fw-semibold lh-base">
                                How <span class="text-primary">it works</span> — share your visuals in minutes
                            </h4>
                            <p class="text-muted fs-13">
                                From uploading your first photo to delivering a polished PDF album, our platform makes it easy for photographers to showcase, share, and impress.
                            </p>
                        </div>
                    </BCol>
                </BRow>

                <BRow class="text-center">
                    <BCol lg="3">
                        <div class="process-card mt-4">
                            <div class="process-arrow-img d-none d-lg-block">
                                <img src="@assets/images/landing/process-arrow-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-user-add-line"></i>
                                </div>
                            </div>

                            <h5 class="fs-14">Create Your Account</h5>
                            <p class="text-muted fs-12">Sign up and set up your space to start showcasing your work.</p>
                        </div>
                    </BCol>

                    <BCol lg="3">
                        <div class="process-card mt-4">
                            <div class="process-arrow-img d-none d-lg-block">
                                <img src="@assets/images/landing/process-arrow-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-image-add-line"></i>
                                </div>
                            </div>

                            <h5 class="fs-14">Upload Photos & Videos</h5>
                            <p class="text-muted fs-12">Add your content in high quality, ready to be shared with clients.</p>
                        </div>
                    </BCol>

                    <BCol lg="3">
                        <div class="process-card mt-4">
                            <div class="process-arrow-img d-none d-lg-block">
                                <img src="@assets/images/landing/process-arrow-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-share-forward-line"></i>
                                </div>
                            </div>

                            <h5 class="fs-14">Share with Clients</h5>
                            <p class="text-muted fs-12">Control access and let clients view and enjoy your work seamlessly.</p>
                        </div>
                    </BCol>

                    <BCol lg="3">
                        <div class="process-card mt-4">
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-file-pdf-2-line"></i>
                                </div>
                            </div>

                            <h5 class="fs-14">Deliver Albums</h5>
                            <p class="text-muted fs-12">Allow clients to download their collections in beautifully designed PDF albums.</p>
                        </div>
                    </BCol>
                </BRow>

            </BContainer>
        </section>


        

        <section class="section bg-light" id="plans">
    <div class="bg-overlay bg-overlay-pattern"></div>
    <BContainer>
        <BRow class="justify-content-center mt-n4">
            <BCol lg="8">
                <div class="text-center mb-5">
                    <h4 class="mb-2 fw-semibold">Choose the plan that's right for you</h4>
                    <p class="text-muted mb-4 fs-13">Simple pricing. No hidden fees. Plans designed for photographers, studios, and creative teams.</p>

                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <h5 class="fs-14 mb-0">Monthly</h5>
                        </div>
                        <div class="form-check form-switch fs-20 ms-3 ">
                            <input class="form-check-input" type="checkbox" id="plan-switch">
                            <label class="form-check-label" for="plan-switch"></label>
                        </div>
                        <div>
                            <h5 class="fs-14 mb-0">Annual <BBadge variant="success-subtle"
                                    class="bg-success-subtle text-success">Save 20%</BBadge>
                            </h5>
                        </div>
                    </div>
                </div>
            </BCol>
        </BRow>

        <BRow class="gy-4">
            <!-- Starter Plan -->
            <BCol lg="4">
                <BCard no-body class="plan-box mb-0">
                    <BCardBody class="p-4 m-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fw-semibold">Starter Plan</h5>
                                <p class="text-muted mb-0">For individual photographers</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary">
                                    <i class="ri-camera-line fs-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 text-center">
                            <h1 class="month"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold">19</span> <span
                                    class="fs-13 text-muted">/Month</span></h1>
                            <h1 class="annual"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold ">171</span>
                                <span class="fs-13 text-muted">/Year</span>
                            </h1>
                        </div>

                        <div>
                            <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>100 GB</b> (~5,000 photos or 20 videos)</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>5</b> client galleries</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Basic PDF album downloads</li>
                                <li><i class="ri-close-circle-fill text-danger me-1"></i> Watermark removal</li>
                                <li><i class="ri-close-circle-fill text-danger me-1"></i> Custom branding</li>
                                <li><i class="ri-close-circle-fill text-danger me-1"></i> Priority support</li>
                            </ul>
                            <div class="mt-4">
                                <Link href="javascript:void(0);" class="btn btn-soft-success w-100">Get Started</Link>
                            </div>
                        </div>
                    </BCardBody>
                </BCard>
            </BCol>

            <!-- Pro Plan -->
            <BCol lg="4">
                <BCard no-body class="plan-box mb-0 ribbon-box right">
                    <BCardBody class="p-4 m-2">
                        <div class="ribbon-two ribbon-two-danger"><span>Popular</span></div>
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fw-semibold">Pro Plan</h5>
                                <p class="text-muted mb-0">For growing studios</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary">
                                    <i class="ri-medal-fill fs-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 text-center">
                            <h1 class="month"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold">29</span> <span
                                    class="fs-13 text-muted">/Month</span></h1>
                            <h1 class="annual"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold">261</span>
                                <span class="fs-13 text-muted">/Year</span>
                            </h1>
                        </div>

                        <div>
                            <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>500 GB</b> (~25,000 photos or 100 videos)</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>50</b> client galleries</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Advanced PDF albums</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Watermark removal</li>
                                <li><i class="ri-close-circle-fill text-danger me-1"></i> Custom branding</li>
                                <li><i class="ri-close-circle-fill text-danger me-1"></i> Priority support</li>
                            </ul>
                            <div class="mt-4">
                                <Link href="javascript:void(0);" class="btn btn-soft-success w-100">Get Started</Link>
                            </div>
                        </div>
                    </BCardBody>
                </BCard>
            </BCol>

            <!-- Studio Plan -->
            <BCol lg="4">
                <BCard no-body class="plan-box mb-0">
                    <BCardBody class="p-4 m-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fw-semibold">Studio Plan</h5>
                                <p class="text-muted mb-0">For agencies & enterprises</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary">
                                    <i class="ri-stack-fill fs-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 text-center">
                            <h1 class="month"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold">39</span> <span
                                    class="fs-13 text-muted">/Month</span></h1>
                            <h1 class="annual"><sup><small>$</small></sup><span
                                    class="ff-secondary fw-bold">351</span>
                                <span class="fs-13 text-muted">/Year</span>
                            </h1>
                        </div>

                        <div>
                            <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>2 TB</b> (~100,000 photos or 400+ videos)</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> <b>Unlimited</b> client galleries</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Premium PDF albums</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Watermark removal</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Custom branding</li>
                                <li><i class="ri-checkbox-circle-fill text-success me-1"></i> Priority support</li>
                            </ul>
                            <div class="mt-4">
                                <Link href="javascript:void(0);" class="btn btn-soft-success w-100">Get Started</Link>
                            </div>
                        </div>
                    </BCardBody>
                </BCard>
            </BCol>
        </BRow>

    </BContainer>
</section>



        

        <section class="section">
            <BContainer>
                <BRow class="align-items-center gy-4">
                    <BCol lg="6" order="2" order-lg="1">
                        <div class="text-muted mt-5 mt-lg-0">
                            <h5 class="fs-12 text-uppercase text-success">Hot Featured Company</h5>
                            <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Get <span
                                    class="text-primary">10,000+</span> Featured Companies</h1>
                            <p class="ff-secondary mb-2">The demand for content writing services is growing. This is
                                because content is required in almost every industry. <b>Many companies have discovered
                                    how effective content marketing is.</b> This is a major reason for this increase in
                                demand.</p>
                            <p class="mb-4 ff-secondary">A Content Writer is a professional who writes informative and
                                engaging articles to help brands showcase their products.</p>

                            <div class="mt-4">
                                <Link href="/" class="btn btn-primary">View More Companies <i
                                        class="ri-arrow-right-line align-middle ms-1"></i></Link>
                            </div>
                        </div>
                    </BCol>

                    <BCol lg="4" sm="7" cols="10" order="1" order-lg="2" class="ms-lg-auto mx-auto">
                        <div>
                            <BCard no-body class="shadow-lg">
                                <BCardBody>
                                    <BButton variant="soft-primary" type="button" class="btn-icon float-end"
                                        data-bs-toggle="button" aria-pressed="true"><i
                                            class="mdi mdi-cards-heart fs-16"></i></BButton>
                                    <div class="avatar-sm mb-4">
                                        <div class="avatar-title bg-secondary-subtle rounded">
                                            <img src="assets/images/companies/img-1.png" alt="" class="avatar-xxs">
                                        </div>
                                    </div>
                                    <BLink href="#!">
                                        <h5>New Web designer</h5>
                                    </BLink>
                                    <p class="text-muted">Themesbrand</p>

                                    <div class="d-flex gap-4 mb-3">
                                        <div>
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido,California
                                        </div>

                                        <div>
                                            <i class="ri-time-line text-primary me-1 align-bottom"></i> 3 min ago
                                        </div>
                                    </div>

                                    <p class="text-muted">As a Product Designer, you will work within a Product Delivery
                                        Team fused with UX, engineering, product and data talent.</p>

                                    <div class="hstack gap-2">
                                        <BBadge variant="success-subtle" class="bg-success-subtle text-success">Full Time
                                        </BBadge>
                                        <BBadge variant="primary-subtle" class="bg-primary-subtle text-primary">Freelance
                                        </BBadge>
                                        <BBadge variant="danger-subtle" class="bg-danger-subtle text-danger">Urgent</BBadge>
                                    </div>

                                    <div class="mt-4 hstack gap-2">
                                        <BLink href="#!" class="btn btn-soft-primary w-100">Apply Job</BLink>
                                        <BLink href="#!" class="btn btn-soft-success w-100">Overview</BLink>
                                    </div>
                                </BCardBody>
                            </BCard>
                            <BCard no-body class="shadow-lg bg-info mb-0 features-company-widgets rounded-3">
                                <BCardBody>
                                    <h5 class="text-white fs-16 mb-4">10,000+ Featured Companies</h5>

                                    <div class="d-flex gap-1">
                                        <BLink href="#" v-b-tooltip.hover title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                    <img src="assets/images/companies/img-5.png" alt="" height="15">
                                                </div>
                                            </div>
                                        </BLink>
                                        <BLink href="#" v-b-tooltip.hover title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                    <img src="assets/images/companies/img-2.png" alt="" height="15">
                                                </div>
                                            </div>
                                        </BLink>
                                        <BLink href="#" v-b-tooltip.hover title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                    <img src="assets/images/companies/img-8.png" alt="" height="15">
                                                </div>
                                            </div>
                                        </BLink>
                                        <BLink href="#" v-b-tooltip.hover title="Brent Gonzalez">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                    <img src="assets/images/companies/img-7.png" alt="" height="15">
                                                </div>
                                            </div>
                                        </BLink>
                                        <BLink href="#" v-b-tooltip.hover title="More Companies">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title fs-11 rounded-circle bg-light bg-opacity-25 text-white">
                                                    1k+
                                                </div>
                                            </div>
                                        </BLink>
                                    </div>
                                </BCardBody>
                            </BCard>
                        </div>
                    </BCol>
                </BRow>
            </BContainer>
        </section>

        <section class="section bg-light" id="candidates">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <BContainer>
                <BRow class="justify-content-center">
                    <BCol lg="8">
                        <div class="text-center mb-5">
                            <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Hire Experts <span
                                    class="text-primary">Team</span></h1>
                            <p class="text-muted mb-4">Hiring experts costs more per hour than hiring entry- or
                                mid-level freelancers, but they can usually get the work done faster—and better.</p>
                        </div>
                    </BCol>

                </BRow>
                <BRow>
                    <BCol lg="12">
                        <swiper class="swiper candidate-swiper" :loop="true" :autoplay="true" :modules="[Autoplay]"
                            :slidesPerView="1" :spaceBetween="10"
                            :breakpoints="{ 640: { slidesPerView: 2, spaceBetween: 20 }, 768: { slidesPerView: 3, spaceBetween: 40 }, 1200: { slidesPerView: 4, spaceBetween: 50 }, }">
                            <swiper-slide>
                                <BCard no-body class="text-center">
                                    <BCardBody class="p-4">
                                        <img src="/images/users/avatar-2.jpg" alt=""
                                            class="rounded-circle avatar-md mx-auto d-block">
                                        <h5 class="fs-17 mt-3 mb-2">Nancy Martino</h5>
                                        <p class="text-muted fs-13 mb-3">Creative Designer</p>

                                        <p class="text-muted mb-4 fs-14">
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido, California
                                        </p>

                                        <BLink href="#!" class="btn btn-primary w-100">View Profile</BLink>
                                    </BCardBody>
                                </BCard>
                            </swiper-slide>
                            <swiper-slide>
                                <BCard no-body class="text-center">
                                    <BCardBody class="p-4">
                                        <img src="/images/users/avatar-3.jpg" alt=""
                                            class="rounded-circle avatar-md mx-auto d-block">
                                        <h5 class="fs-17 mt-3 mb-2">Glen Matney</h5>
                                        <p class="text-muted fs-13 mb-3">Marketing Director</p>

                                        <p class="text-muted mb-4 fs-14">
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido, California
                                        </p>

                                        <BLink href="#!" class="btn btn-primary w-100">View Profile</BLink>
                                    </BCardBody>
                                </BCard>
                            </swiper-slide>
                            <swiper-slide>
                                <BCard no-body class="text-center">
                                    <BCardBody class="p-4">
                                        <img src="/images/users/avatar-10.jpg" alt=""
                                            class="rounded-circle avatar-md mx-auto d-block">
                                        <h5 class="fs-17 mt-3 mb-2">Alexis Clarke</h5>
                                        <p class="text-muted fs-13 mb-3">Product Manager</p>

                                        <p class="text-muted mb-4 fs-14">
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido, California
                                        </p>

                                        <BLink href="#!" class="btn btn-primary w-100">View Profile</BLink>
                                    </BCardBody>
                                </BCard>
                            </swiper-slide>
                            <swiper-slide>
                                <BCard no-body class="text-center">
                                    <BCardBody class="p-4">
                                        <img src="/images/users/avatar-8.jpg" alt=""
                                            class="rounded-circle avatar-md mx-auto d-block" />
                                        <h5 class="fs-17 mt-3 mb-2">James Price</h5>
                                        <p class="text-muted fs-13 mb-3">Product Designer</p>

                                        <p class="text-muted mb-4 fs-14">
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido, California
                                        </p>

                                        <BLink href="#!" class="btn btn-primary w-100">View Profile</BLink>
                                    </BCardBody>
                                </BCard>
                            </swiper-slide>
                            <swiper-slide>
                                <BCard no-body class="text-center">
                                    <BCardBody class="p-4">
                                        <img src="/images/users/avatar-5.jpg" alt=""
                                            class="rounded-circle avatar-md mx-auto d-block" />
                                        <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                        <p class="text-muted fs-13 mb-3">Full Stack Developer</p>

                                        <p class="text-muted mb-4 fs-14">
                                            <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i>
                                            Escondido, California
                                        </p>

                                        <BLink href="#!" class="btn btn-primary w-100">View Profile</BLink>
                                    </BCardBody>
                                </BCard>
                            </swiper-slide>
                        </swiper>
                    </BCol>
                </BRow>
            </BContainer>
        </section>

        <section class="section" id="blog">
            <BContainer>
                <BRow class="justify-content-center">
                    <BCol lg="8">
                        <div class="text-center mb-5">
                            <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Our Latest <span
                                    class="text-primary">News</span></h1>
                            <p class="text-muted mb-4">We thrive when coming up with innovative ideas but also
                                understand that a smart concept should be supported with faucibus sapien odio measurable
                                results.</p>
                        </div>
                    </BCol>
                </BRow>

                <BRow>
                    <BCol lg="4" md="6">
                        <BCard no-body>
                            <BCardBody>
                                <img src="assets/images/small/img-8.jpg" alt="" class="img-fluid rounded" />
                            </BCardBody>
                            <BCardBody>
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> 30 Oct, 2021
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-message-2-line align-bottom me-1"></i> 364 Comment
                                    </li>
                                </ul>
                                <BLink href="#;">
                                    <h5>Design your apps in your own way ?</h5>
                                </BLink>
                                <p class="text-muted fs-14">One disadvantage of Lorum Ipsum is that in Latin certain
                                    letters appear more frequently than others.</p>

                                <div>
                                    <BLink href="#!" class="link-success">Learn More <i
                                            class="ri-arrow-right-line align-bottom ms-1"></i></BLink>
                                </div>
                            </BCardBody>
                        </BCard>
                    </BCol>
                    <BCol lg="4" md="6">
                        <BCard no-body>
                            <BCardBody>
                                <img src="assets/images/small/img-6.jpg" alt="" class="img-fluid rounded" />
                            </BCardBody>
                            <BCardBody>
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> 02 Oct, 2021
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-message-2-line align-bottom me-1"></i> 245 Comment
                                    </li>
                                </ul>
                                <BLink href="#;">
                                    <h5>Smartest Applications for Business ?</h5>
                                </BLink>
                                <p class="text-muted fs-14">Due to its widespread use as filler text for layouts,
                                    non-readability is of great importance: human perception.</p>

                                <div>
                                    <BLink href="#!" class="link-success">Learn More <i
                                            class="ri-arrow-right-line align-bottom ms-1"></i></BLink>
                                </div>
                            </BCardBody>
                        </BCard>
                    </BCol>
                    <BCol lg="4" md="6">
                        <BCard no-body>
                            <BCardBody>
                                <img src="assets/images/small/img-9.jpg" alt="" class="img-fluid rounded" />
                            </BCardBody>
                            <BCardBody>
                                <ul class="list-inline fs-14 text-muted">
                                    <li class="list-inline-item">
                                        <i class="ri-calendar-line align-bottom me-1"></i> 23 Sept, 2021
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ri-message-2-line align-bottom me-1"></i> 354 Comment
                                    </li>
                                </ul>
                                <BLink href="#;">
                                    <h5>How apps is changing the IT world</h5>
                                </BLink>
                                <p class="text-muted fs-14">Intrinsically incubate intuitive opportunities and real-time
                                    potentialities Appropriately communicate one-to-one technology.</p>

                                <div>
                                    <BLink href="#!" class="link-success">Learn More <i
                                            class="ri-arrow-right-line align-bottom ms-1"></i></BLink>
                                </div>
                            </BCardBody>
                        </BCard>
                    </BCol>
                </BRow>
            </BContainer>
        </section>


        <section class="py-5 bg-primary position-relative">
            <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
            <BContainer>
                <BRow class="align-items-center gy-4">
                    <BCol sm="">
                        <div>
                            <h4 class="text-white fw-semibold">Get New Jobs Notification!</h4>
                            <p class="text-white text-opacity-75 mb-0">Subscribe & get all related jobs notification.</p>
                        </div>
                    </BCol>

                    <BCol sm="auto">
                        <BButton type="button" variant="danger">Subscribe Now <i
                                class="ri-arrow-right-line align-bottom"></i></BButton>
                    </BCol>

                </BRow>
            </BContainer>
        </section>

        <footer class="custom-footer bg-dark py-5 position-relative">
            <BContainer>
                <BRow>
                    <BCol lg="4" class="mt-4">
                        <div>
                            <div>
                                <img src="/images/logo-light.png" alt="logo light" height="30" />
                            </div>
                            <div class="mt-4 fs-13">
                                <p>Premium Media Sharing & Client Showcase Platform</p>
                                <p>Easily upload, organize, and share photos or videos, manage client access, and deliver albums in stunning PDF format — all in one place.</p>
                                <ul class="list-inline mb-0 footer-social-link">
                                    <li class="list-inline-item">
                                        <BLink href="#" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-facebook-fill"></i>
                                            </div>
                                        </BLink>
                                    </li>
                                    <li class="list-inline-item">
                                        <BLink href="#" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-github-fill"></i>
                                            </div>
                                        </BLink>
                                    </li>
                                    <li class="list-inline-item">
                                        <BLink href="#" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-linkedin-fill"></i>
                                            </div>
                                        </BLink>
                                    </li>
                                    <li class="list-inline-item">
                                        <BLink href="#" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-google-fill"></i>
                                            </div>
                                        </BLink>
                                    </li>
                                    <li class="list-inline-item">
                                        <BLink href="#" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-dribbble-line"></i>
                                            </div>
                                        </BLink>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </BCol>

                    <BCol lg="7" class="ms-lg-auto">
                        <BRow>
                            <BCol sm="4" class="mt-4">
                                <h5 class="text-white mb-0">Company</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li>
                                            <Link href="/pages/profile">About Us</Link>
                                        </li>
                                        <li>
                                            <Link href="#">Gallery</Link>
                                        </li>
                                        <li>
                                            <Link href="/pages/team">Team</Link>
                                        </li>
                                        <li>
                                            <Link href="/pages/pricing">Pricing</Link>
                                        </li>
                                        <li>
                                            <Link href="/pages/timeline">Timeline</Link>
                                        </li>
                                    </ul>
                                </div>
                            </BCol>
                            <BCol sm="4" class="mt-4">
                                <h5 class="text-white mb-0">For Jobs</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li>
                                            <Link href="/jobs/lists">Job List</Link>
                                        </li>
                                        <li>
                                            <Link href="/jobs/application">application</Link>
                                        </li>
                                        <li>
                                            <Link href="/jobs/new">New Job</Link>
                                        </li>
                                        <li>
                                            <Link href="/jobs/companies-list">Company List</Link>
                                        </li>
                                    </ul>
                                </div>
                            </BCol>
                            <BCol sm="4" class="mt-4">
                                <h5 class="text-white mb-0">Support</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li>
                                            <Link href="/pages/faqs">FAQ</Link>
                                        </li>
                                        <li>
                                            <Link href="/pages/faqs">Contact</Link>
                                        </li>
                                    </ul>
                                </div>
                            </BCol>
                        </BRow>
                    </BCol>

                </BRow>

                <BRow class="text-center text-sm-start align-items-center mt-5">
                    <BCol sm="6">
                        <div>
                            <p class="copy-rights mb-0">
                                {{ new Date().getFullYear() }} © KradWorks
                            </p>
                        </div>
                    </BCol>
                    <BCol sm="6">
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <ul class="list-inline mb-0 footer-list gap-4 fs-13">
                                <li class="list-inline-item">
                                    <Link href="/pages/privacy-policy">Privacy Policy</Link>
                                </li>
                                <li class="list-inline-item">
                                    <Link href="/pages/term-conditions">Terms & Conditions</Link>
                                </li>
                                <li class="list-inline-item">
                                    <Link href="/pages/privacy-policy">Security</Link>
                                </li>
                            </ul>
                        </div>
                    </BCol>
                </BRow>
            </BContainer>
        </footer>
        <BButton variant="info" @click="topFunction" class="btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </BButton>
    </div>
</template>
<script>
import { Link, Head } from '@inertiajs/vue3';
import { Autoplay } from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";
import "swiper/css/autoplay";

export default {
    layout: null,
    data() {
        return {
            Autoplay,
        };
    },
    components: {
        Swiper, SwiperSlide,Link,
        Head
    },
    methods: {
        topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
        scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        },
        monthly() {
            const highlightedItems = document.querySelectorAll(".month");

            highlightedItems.forEach(function (userItem) {
                userItem.style.display = "block";
            });
            const highlightedItems2 = document.querySelectorAll(".annual");

            highlightedItems2.forEach(function (userItem) {
                userItem.style.display = "none";
            });
        },
        anually() {
            const highlightedItems = document.querySelectorAll(".month");

            highlightedItems.forEach(function (userItem) {
                userItem.style.display = "none";
            });
            const highlightedItems2 = document.querySelectorAll(".annual");

            highlightedItems2.forEach(function (userItem) {
                userItem.style.display = "block";
            });
        }
    },
    mounted() {

        let backtoTop = document.getElementById("back-to-top");

        if (backtoTop) {
            backtoTop = document.getElementById("back-to-top");
            window.onscroll = function () {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    backtoTop.style.display = "block";
                } else {
                    backtoTop.style.display = "none";
                }
            };
        }
        this.monthly();
        document.getElementById("plan-switch").addEventListener('change', () => {
            if (document.getElementById("plan-switch").checked == true) {
                this.anually();
            } else if (document.getElementById("plan-switch").checked == false) {
                this.monthly();
            }
        });

        window.addEventListener('scroll', function (ev) {
            ev.preventDefault();
            var navbar = document.getElementById("navbar");
            if (navbar) {
                if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
                    navbar.classList.add("is-sticky");
                } else {
                    navbar.classList.remove("is-sticky");
                }
            }
        });
    },
};
</script>

