<template>
    <div>
        <input id="autocomplete" type="text" placeholder="Enter a location" v-model="city" class="space-top">
        <table v-if="weatherdata && weatherdata.data" class="space-top">
            <tr>
                <th>City</th>
                <th>Feels like</th>
                <th>Ground level</th>
                <th>Humidity</th>
                <th>Pressure</th>
                <th>Sea level</th>
                <th>Temperature</th>
                <th>Max temperature</th>
                <th>Min temperature</th>
            </tr>
            <tr v-for="item in weatherdata.data">
                <td>{{ item.data.name }}</td>
                <td>{{ item.data.main.feels_like }}</td>
                <td>{{ item.data.main.grnd_level }}</td>
                <td>{{ item.data.main.humidity }}</td>
                <td>{{ item.data.main.pressure }}</td>
                <td>{{ item.data.main.sea_level }}</td>
                <td>{{ item.data.main.temp }}</td>
                <td>{{ item.data.main.temp_max }}</td>
                <td>{{ item.data.main.temp_min }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    name: "Search",
    data() {
        return {
            city: null,
            autocomplete: null,
            weatherdata: {}
        };
    },
    mounted() {
        this.getData();
    },
    created() {
        let vm = this;
        let apiKey = 'AIzaSyA-0oT2wHbrnUBShGaVgoEg_Qk5xM5OcbI';
        let script = document.createElement('script');
        script.onload = function() {
            vm.autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('autocomplete'),
                { types: ['(cities)'] }
            );
            vm.autocomplete.addListener('place_changed', vm.saveCity);
        };
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places`;
        document.head.appendChild(script);
    },
    methods: {
        saveCity() {
            let place = this.autocomplete.getPlace();
            console.log(place.name)
            axios.post('/api/data', {
                cityName: place.name
            })
            .then(response => {
                console.log(response.data);
                this.getData();
                this.city = null;
            })
            .catch(error => {
                console.error(error);
            });
        },
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
    table {
        width: 100%;
        border-collapse: separate;
    }

    table th, table td {
        border: 1px solid black;
        padding: 10px;
    }
    .space-top {
        margin-top: 20px;
    }
</style>

