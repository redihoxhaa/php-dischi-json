const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            currentDisc: {},
            appTheme: "light-theme",
        }
    },
    methods: {

        // Funzione per leggere il file json dei dischi
        getDiscs() {
            axios.get('server.php').then(response => {
                this.discs = response.data;
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

        changeTheme() {
            if (this.appTheme === "light-theme") {
                this.appTheme = "dark-theme";
            } else {
                this.appTheme = "light-theme";
            }
        },

    },
    mounted() {
        this.getDiscs();
    }
}).mount('#app')