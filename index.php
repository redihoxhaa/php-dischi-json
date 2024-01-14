<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Dischi</title>
</head>

<body>
    <div id="app" v-cloak>
        <div class="wrapper" :class="appTheme">
            <div class="container d-flex flex-column">
                <div class=" background-spinner">
                    <div class="spinner">
                        <div class="spinner1"></div>
                    </div>
                </div>

                <header class="d-flex justify-content-between align-items-center py-5">
                    <!-- Logo sito -->
                    <div class="logo invert">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Tidal_%28service%29_logo.svg" alt="Tidal Logo">
                    </div>
                    <!-- /Logo sito -->

                    <div class="tools d-flex align-items-center gap-4">

                        <div class="trending-icon" @click="showTrending()">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <button class="favs" @click="showFavs()">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H24V24H0z" fill="none"></path>
                                <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z"></path>
                            </svg>
                        </button>

                        <div class="checkbox-wrapper-5">
                            <div class="check">
                                <input checked="" id="check-5" type="checkbox" @click="changeTheme">
                                <label for="check-5"></label>
                            </div>
                        </div>

                    </div>

                </header>

                <main class="d-flex flex-column justify-content-center">

                    <h3 class="section-title text-uppercase text-center ps-3" v-show="showList === 'trending'">Trending Now</h3>
                    <h3 class="section-title text-uppercase text-center ps-3" v-show="showList === 'favorites'">Favorite Tracks</h3>

                    <!-- Lista CD -->
                    <ul class="discs row scrolling-container" v-show="showList === 'trending'">

                        <!-- Singolo CD -->

                        <li v-for="(disc, index) in discs" class="disc col-12 col-sm-6 col-md-4 mb-3 scroll-snap">

                            <!-- Bottone CD -->
                            <div class="button-wrapper">
                                <button class="cover-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @click="sendDiscID(disc.id)">
                                    <div class="cover">
                                        <img :src="disc.cover" :alt="`${disc.title} cover`">
                                    </div>
                                </button>
                                <!-- Aggiungi ai preferiti -->
                                <div class="heart-container" title="Like">
                                    <input type="checkbox" class="checkbox" @click.stop="handleFavs(discs[index].id)">
                                    <div class="svg-container">
                                        <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                            </path>
                                        </svg>
                                        <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon points="10,10 20,20"></polygon>
                                            <polygon points="10,50 20,50"></polygon>
                                            <polygon points="20,80 30,70"></polygon>
                                            <polygon points="90,10 80,20"></polygon>
                                            <polygon points="90,50 80,50"></polygon>
                                            <polygon points="80,80 70,70"></polygon>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Aggiungi ai preferiti -->
                            </div>
                            <!-- /Bottone CD -->

                            <!-- Info CD -->
                            <h4 class="text-center mt-3">{{disc.title}}</h4>
                            <p class="text-center author">{{disc.author}}</p>
                            <!-- /Info CD -->




                            <!-- Offcanvas al click -->
                            <div class="offcanvas offcanvas-end d-flex align-items-center" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                                <div class="offcanvas-header d-flex">
                                    <!-- Welcome message del canvas -->
                                    <h5 class="offcanvas-title text-center" id="offcanvasRightLabel">You have to be curious!</h5>
                                    <!-- Welcome message del canvas -->
                                </div>

                                <!-- Corpo dell'offcanvas -->
                                <div class="offcanvas-body small">
                                    <div class="canvas-cover">
                                        <img :src="currentDisc.cover" :alt="`${currentDisc.title} cover`">
                                    </div>
                                    <div class="infos d-flex gap-5 mt-4">
                                        <ul class="info-type">
                                            <li>Title</li>
                                            <li>Author</li>
                                            <li>Year</li>
                                            <li>Genre</li>
                                            <li>Streams</li>
                                        </ul>
                                        <ul class="info-value">
                                            <li>{{currentDisc.title}}</li>
                                            <li>{{currentDisc.author}}</li>
                                            <li>{{currentDisc.year}}</li>
                                            <li>{{currentDisc.genre}}</li>
                                            <li>{{currentDisc.streams}}</li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-danger mt-4" data-bs-dismiss="offcanvas" @click="sendTargetDiscID(currentDisc.id)">Remove CD</button>
                                </div>
                                <!-- /Corpo dell'offcanvas -->

                            </div>
                            <!-- /Offcanvas al click -->

                        </li>
                        <!-- /Singolo CD -->

                    </ul>
                    <!-- /Lista CD -->

                    <!-- Lista CD -->
                    <ul class="discs row scrolling-container" v-show="showList === 'favorites'">

                        <!-- Singolo CD -->

                        <li v-for="(disc, index) in favoriteDiscs" class="disc col-12 col-sm-6 col-md-4 mb-3 scroll-snap">

                            <!-- Bottone CD -->
                            <div class="button-wrapper">
                                <button class="cover-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @click="sendDiscID(disc.id)">
                                    <div class="cover">
                                        <img :src="disc.cover" :alt="`${disc.title} cover`">
                                    </div>
                                </button>
                                <!-- Aggiungi ai preferiti -->
                                <div class="heart-container" title="Like">
                                    <input type="checkbox" class="checkbox" @click.stop="handleFavs(discs[index].id)">
                                    <div class="svg-container">
                                        <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                            </path>
                                        </svg>
                                        <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon points="10,10 20,20"></polygon>
                                            <polygon points="10,50 20,50"></polygon>
                                            <polygon points="20,80 30,70"></polygon>
                                            <polygon points="90,10 80,20"></polygon>
                                            <polygon points="90,50 80,50"></polygon>
                                            <polygon points="80,80 70,70"></polygon>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Aggiungi ai preferiti -->
                            </div>
                            <!-- /Bottone CD -->

                            <!-- Info CD -->
                            <h4 class="text-center mt-3">{{disc.title}}</h4>
                            <p class="text-center author">{{disc.author}}</p>
                            <!-- /Info CD -->




                            <!-- Offcanvas al click -->
                            <div class="offcanvas offcanvas-end d-flex align-items-center" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                                <div class="offcanvas-header d-flex">
                                    <!-- Welcome message del canvas -->
                                    <h5 class="offcanvas-title text-center" id="offcanvasRightLabel">You have to be curious!</h5>
                                    <!-- Welcome message del canvas -->
                                </div>

                                <!-- Corpo dell'offcanvas -->
                                <div class="offcanvas-body small">
                                    <div class="canvas-cover">
                                        <img :src="currentDisc.cover" :alt="`${currentDisc.title} cover`">
                                    </div>
                                    <div class="infos d-flex gap-5 mt-4">
                                        <ul class="info-type">
                                            <li>Title</li>
                                            <li>Author</li>
                                            <li>Year</li>
                                            <li>Genre</li>
                                            <li>Streams</li>
                                        </ul>
                                        <ul class="info-value">
                                            <li>{{currentDisc.title}}</li>
                                            <li>{{currentDisc.author}}</li>
                                            <li>{{currentDisc.year}}</li>
                                            <li>{{currentDisc.genre}}</li>
                                            <li>{{currentDisc.streams}}</li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-danger mt-4" data-bs-dismiss="offcanvas" @click="sendTargetDiscID(currentDisc.id)">Remove CD</button>
                                </div>
                                <!-- /Corpo dell'offcanvas -->

                            </div>
                            <!-- /Offcanvas al click -->

                        </li>
                        <!-- /Singolo CD -->

                    </ul>
                    <!-- /Lista CD -->

                    <button class="add my-4" data-bs-toggle="offcanvas" data-bs-target="#addCD" aria-controls="offcanvasRight">+</button>

                    <!-- Offcanvas al click -->
                    <div class="offcanvas offcanvas-end d-flex flex-column justify-content-center px-4" tabindex="-1" id="addCD">

                        <div class="offcanvas-header d-flex">
                            <!-- Welcome message del canvas -->
                            <h5 class="offcanvas-title text-center" id="offcanvasRightLabel">Add a new CD!</h5>
                            <!-- Welcome message del canvas -->
                        </div>

                        <!-- Corpo dell'offcanvas -->
                        <div class="offcanvas-body small custom-canvas-body">
                            <form @submit.prevent="addNewDisc()">
                                <div class="mb-3">
                                    <label for="CDTitle" class="form-label">Title</label>
                                    <input type="text" name="CDTitle" class="form-control" v-model="CDTitle">
                                </div>
                                <div class="mb-3">
                                    <label for="CDAuthor" class="form-label">Author</label>
                                    <input type="text" name="CDAuthor" class="form-control" v-model="CDAuthor">
                                </div>
                                <div class="mb-3">
                                    <label for="CDYear" class="form-label">Year</label>
                                    <input type="text" name="CDYear" class="form-control" v-model="CDYear">
                                </div>
                                <div class="mb-3">
                                    <label for="CDGenre" class="form-label">Genre</label>
                                    <input type="text" name="CDGenre" class="form-control" v-model="CDGenre">
                                </div>
                                <div class="mb-3">
                                    <label for="CDStreams" class="form-label">Streams</label>
                                    <input type="text" name="CDStreams" class="form-control" v-model="CDStreams">
                                </div>
                                <div class="mb-3">
                                    <label for="CDCoverURL" class="form-label">Cover URL</label>
                                    <input type="text" name="CDCoverURL" class="form-control" v-model="CDCoverURL">
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Add CD</button>
                            </form>
                        </div>
                        <!-- /Corpo dell'offcanvas -->

                    </div>
                    <!-- /Offcanvas al click -->

                </main>

            </div>
        </div>
    </div>
</body>

<!-- Vue -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- JS -->
<script src="script.js"></script>

</html>