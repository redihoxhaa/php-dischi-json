const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            currentDisc: {}
        }
    },
    methods: {
        getDiscs() {
            axios.get('discs.json').then(response => {
                this.discs = response.data;
            })
        },

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