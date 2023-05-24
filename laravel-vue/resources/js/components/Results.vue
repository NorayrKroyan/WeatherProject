<template>
    <div>
        <table v-if="weatherdata && weatherdata.data" class="space-top">
            <tr>
                <th>City</th>
            </tr>
            <tr v-for="item in weatherdata.data">
                <td>{{ item.data.name }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Results",
    data() {
        return {
            weatherdata: {}
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.post('/api/get-data', {})
                .then(response => {
                    this.weatherdata = response.data
                    console.log(this.weatherdata)
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>


<style scoped>
.error {
    color:red;
}
</style>
