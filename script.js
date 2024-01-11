const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            currentDisc: {}
        }
    },
    methods: {

        // Funzione per leggere il file json dei dischi
        getDiscs() {
            axios.get('discs.json').then(response => {
                this.discs = response.data;
            })
        },

        // Funzione per inoltrare l'ID del disco al server e ricevere il json filtrato
        sendDiscID(index) {
            const currentDiscID = this.discs[index].id;
            console.log(currentDiscID);
            axios.post('server.php', currentDiscID)
                .then(response => {
                    axios.get('currentDisc.json').then(response => {
                        if (response.status === 200) {
                            this.currentDisc = response.data;
                            console.log(response.data)
                        }
                    })
                });
        },

    },
    mounted() {
        this.getDiscs();
    }
}).mount('#app')