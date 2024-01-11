const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: []
        }
    },
    methods: {
        getDiscs() {
            axios.get('discs.json').then(response => {
                this.discs = response.data;
            })
        }
    },
    mounted() {
        this.getDiscs();
    }
}).mount('#app')