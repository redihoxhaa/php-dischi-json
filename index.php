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
    <div id="app">
        <div class="container">

            <header>

                <!-- Logo sito -->
                <div class="logo py-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Tidal_%28service%29_logo.svg" alt="Tidal Logo">
                </div>
                <!-- /Logo sito -->
            </header>

            <main>
                <!-- Lista CD -->
                <ul class="discs row">

                    <!-- Singolo CD -->
                    <li v-for="(disc, index) in discs" class="col-6 col-xl-4 mb-5 d-flex flex-column align-items-center">

                        <!-- Bottone CD -->
                        <button class="cover-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @click="sendDiscID(index)">
                            <div class="cover">
                                <img :src="disc.cover" :alt="`${disc.title} cover`">
                            </div>
                        </button>
                        <!-- /Bottone CD -->

                        <!-- Info CD -->
                        <h4 class="text-center mt-3">{{disc.title}}</h4>
                        <p class="text-center">{{disc.author}}</p>
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
            </main>

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