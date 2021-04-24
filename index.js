var app = new Vue({
    el: "#app",
    data: {
        keys: [],
        name: "Test Key",
        value: "Sample Value"
    },
    mounted () {
        this.reload()
    },
    methods: {
        reload () {
            const self = this
            axios.get("/api/keys")
                .then(function (response) {
                    self.keys = response.data
                })
                .catch(function (error) {
                    console.log(error);
                })
        },
        create () {
            const self = this
            axios.post("/api/key", {
                name: this.name,
                value: this.value
            })
                .then(function (response) {
                    self.reload()
                })
                .catch(function (error) {
                    alert(error.response.data);
                })
        }
    }
});