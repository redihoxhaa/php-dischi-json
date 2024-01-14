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

                    <div class="checkbox-wrapper-5">
                        <div class="check">
                            <input checked="" id="check-5" type="checkbox" @click="changeTheme">
                            <label for="check-5"></label>
                        </div>
                    </div>

                </header>

                <main class="d-flex flex-column justify-content-center">

                    <h3 class="trending-now text-uppercase text-center ps-3">Trending Now</h3>

                    <!-- Lista CD -->
                    <ul class="discs row scrolling-container">

                        <!-- Singolo CD -->

                        <li v-for="disc in discs" class="disc col-12 col-sm-6 col-md-4 mb-3 scroll-snap">

                            <!-- Bottone CD -->
                            <button class="cover-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @click="sendDiscID(disc.id)">
                                <div class="cover">
                                    <img :src="disc.cover" :alt="`${disc.title} cover`">
                                </div>
                            </button>
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
                            <form>
                                <div class="mb-3">
                                    <label for="CDTitle" class="form-label">Title</label>
                                    <input type="text" name="CDTitle" class="form-control" id="CDTitle">
                                </div>
                                <div class="mb-3">
                                    <label for="CDAuthor" class="form-label">Author</label>
                                    <input type="text" name="CDAuthor" class="form-control" id="CDAuthor">
                                </div>
                                <div class="mb-3">
                                    <label for="CDYear" class="form-label">Year</label>
                                    <input type="text" name="CDYear" class="form-control" id="CDYear">
                                </div>
                                <div class="mb-3">
                                    <label for="CDGenre" class="form-label">Genre</label>
                                    <input type="text" name="CDGenre" class="form-control" id="CDGenre">
                                </div>
                                <div class="mb-3">
                                    <label for="CDStreams" class="form-label">Streams</label>
                                    <input type="text" name="CDStreams" class="form-control" id="CDStreams">
                                </div>
                                <div class="mb-3">
                                    <label for="CDCoverURL" class="form-label">Cover URL</label>
                                    <input type="text" name="CDCoverURL" class="form-control" id="CDCoverURL">
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