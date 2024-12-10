<template>
  <!-- Whats New Start -->
  <section class="whats-news-area pt-50 pb-20">
    <div class="d-flex justify-content-center">
      <p class="btn btn-sm mx-3 my-5" @click="home()">Home</p>
      <p class="btn btn-sm mx-3 my-5 bg-dark" @click="login()" v-if="!tokenStatus">Login</p>
      <p class="btn btn-sm mx-3 my-5 bg-dark" @click="logout()" v-else>Logout</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row d-flex justify-content-between">
            <div class="col-lg-3 col-md-3">
              <div class="section-tittle mb-30">
                <h3>Whats New</h3>
              </div>
            </div>
            <div class="col-lg-9 col-md-9">
              <div class="properties__button">
                <!--Nav Button  -->
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a
                      class="nav-item nav-link active"
                      id="nav-home-tab"
                      data-toggle="tab"
                      href="details.htmlnav-home"
                      role="tab"
                      aria-controls="nav-home"
                      aria-selected="true"
                      @click="searchCategory()"
                      >All</a
                    >
                    <a
                      class="nav-item nav-link"
                      id="nav-profile-tab"
                      data-toggle="tab"
                      href="details.htmlnav-profile"
                      role="tab"
                      aria-controls="nav-profile"
                      aria-selected="false"
                      v-for="(category, index) in categoryList"
                      :key="index"
                      @click="searchCategory(category.title)"
                      >{{ category.title }}</a
                    >
                  </div>
                </nav>
                <!--End Nav Button  -->
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="d-flex justify-content-center align-items-center">
              <input
                type=" text"
                class="form-control"
                v-model="searchKey"
                v-on:keyup.enter="searchPost()"
              />
              <div class="btn btn-sm" @click="searchPost()">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
          </div>
          <div class="" v-if="tokenStatus">
            <div class="row">
              <div class="col-12">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                  <!-- card one -->
                  <div
                    class="tab-pane fade show active"
                    id="nav-home"
                    role="tabpanel"
                    aria-labelledby="nav-home-tab"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="vh-100 text-center" v-if="postList.length == 0">
                          <div class="text-danger justify-content-center align-items-center">
                            <h1>There is no data yet!</h1>
                          </div>
                        </div>
                        <div
                          class="col-lg-6 col-md-6"
                          v-for="(post, index) in postList"
                          :key="index"
                          v-else>
                          <div class="single-what-news mb-100" @click="newsDetails(post.post_id)">
                            <div class="what-img">
                              <img
                                :src="post.image"
                                style="height: 500px; width: 500px; object-fit: cover"
                              />
                            </div>
                            <div class="what-cap">
                              <span class="color1">{{ post.title }}</span>
                              <h4>
                                <a href="details.html">{{ post.description }}</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card two -->
                  <div
                    class="tab-pane fade"
                    id="nav-profile"
                    role="tabpanel"
                    aria-labelledby="nav-profile-tab"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews1.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews2.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews3.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews4.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card three -->
                  <div
                    class="tab-pane fade"
                    id="nav-contact"
                    role="tabpanel"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews1.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews2.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews3.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews4.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card fure -->
                  <div
                    class="tab-pane fade"
                    id="nav-last"
                    role="tabpanel"
                    aria-labelledby="nav-last-tab"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews1.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews2.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews3.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews4.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card Five -->
                  <div
                    class="tab-pane fade"
                    id="nav-nav-Sport"
                    role="tabpanel"
                    aria-labelledby="nav-Sports"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews1.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews2.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews3.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews4.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card Six -->
                  <div
                    class="tab-pane fade"
                    id="nav-techno"
                    role="tabpanel"
                    aria-labelledby="nav-technology"
                  >
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews1.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews2.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews3.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="../../public/assets/img/news/whatNews4.jpg" alt="" />
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4>
                                <a href="details.html">Welcome To The Best Model Winner Contest</a>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Nav Card -->
              </div>
            </div>
          </div>
          <div class="" v-else>
            <h1 class="bg-danger text-center p-5 text-white m-5">
              You have to login first to view the blogs
            </h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Whats New End -->

  <!--Start pagination -->
  <div class="pagination-area pb-45 text-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="single-wrap d-flex justify-content-center">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-start">
                <li class="page-item">
                  <a class="page-link" href="details.html"
                    ><span class="flaticon-arrow roted"></span
                  ></a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="details.html">01</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="details.html">02</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="details.html">03</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="details.html"
                    ><span class="flaticon-arrow right-arrow"></span
                  ></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End pagination  -->
</template>

<script lang="ts" type="module" src="../js/index.js"></script>
