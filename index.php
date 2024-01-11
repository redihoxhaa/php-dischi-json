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
            <div class="logo my-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Tidal_%28service%29_logo.svg" alt="Tidal Logo">
            </div>
            <ul class="discs row">
                <li v-for="disc in discs" class="col-6 col-xl-4 mb-5">
                    <button class="cover-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                        <div class="cover">
                            <img :src="disc.cover" :alt="`${disc.title} cover`">
                        </div>
                    </button>
                    <h3 class="text-center mt-2">{{disc.title}}</h3>
                    <h5 class="text-center mt-2">{{disc.author}}</h5>
                    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body small">
                            ...
                        </div>
                    </div>
                </li>
            </ul>
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