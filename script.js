const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            favoriteDiscs: [],
            currentDisc: "",
            appTheme: "light-theme",
            CDTitle: '',
            CDAuthor: '',
            CDYear: '',
            CDGenre: '',
            CDStreams: '',
            CDCoverURL: '',
            showList: 'trending',
        }
    },
    methods: {

        // Funzione per leggere il file json dei dischi
        getDiscs() {
            axios.get('server.php').then(response => {
                this.discs = response.data;
            })
        },

        getFavorites() {
            axios.get('favDiscs.json').then(response => {
                this.favoriteDiscs = response.data;
                console.log("sto cercando")
            })
        },

        // Funzione per inoltrare l'ID del disco al server e ricevere il json filtrato
        sendDiscID(currentDiscID) {
            axios.post('server.php', {
                currentDiscID: currentDiscID
            })
                .then(response => {
                    if (response.status === 200) {
                        axios.get('currentDisc.json').then(response => {
                            if (response.status === 200) {
                                this.currentDisc = response.data;
                            }
                        })
                    }
                });
        },

        addNewDisc() {
            console.log("ciao")
            if (this.CDTitle.length && this.CDAuthor.length && this.CDYear.length && this.CDGenre.length && this.CDStreams.length && this.CDCoverURL.length) {
                console.log("ciao")
                axios.post('server.php', {
                    CDTitle: this.CDTitle,
                    CDAuthor: this.CDAuthor,
                    CDYear: this.CDYear,
                    CDGenre: this.CDGenre,
                    CDStreams: this.CDStreams,
                    CDCoverURL: this.CDCoverURL,
                }).then(response => {
                    if (response.status === 200) {
                        this.getDiscs();
                        this.CDTitle = "";
                        this.CDAuthor = "";
                        this.CDYear = "";
                        this.CDGenre = "";
                        this.CDStreams = "";
                        this.CDCoverURL = "";
                    }
                })
            }

        },

        deleteDisc(targetDiscID) {
            axios.post('server.php', {
                targetDiscID: targetDiscID
            }).then(response => {
                if (response.status === 200) {
                    this.getDiscs();
                    this.getFavorites();
                }
            });

        },

        changeTheme() {
            if (this.appTheme === "light-theme") {
                this.appTheme = "dark-theme";
            } else {
                this.appTheme = "light-theme";
            }
        },

        handleFavs(id) {
            axios.post('server.php', {
                favDiscID: id
            }).then(response => {
                if (response.status === 200) {
                    this.getFavorites();
                    console.log(id)
                }
            });

        },

        showTrending() {
            this.showList = "trending"
        },

        showFavs() {
            this.showList = "favorites"
        },

    },
    mounted() {
        this.getDiscs();
        this.getFavorites();
    }
}).mount('#app')