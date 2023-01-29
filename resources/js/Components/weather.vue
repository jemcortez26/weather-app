<template>
    <div>
        <div class="weather-info" v-if="aWeatherData !== null">
            <h3>{{ `${this.getSelectedCity}, Japan` }}</h3>
            <p class="main-weather">{{ `${Math.ceil(this.aWeatherData.main.temp - 273.15)}°` }}<img :src="`//openweathermap.org/img/w/${this.aWeatherData.weather[0].icon}.png`" alt="weather-icon" /></p>
            <p>Real Feel</p>
            <p class="sub-weather">{{ `${Math.ceil(this.aWeatherData.main.feels_like - 273.15)}°` }}</p>
            <p>Wind</p>
            <p class="sub-weather">{{ `${Math.ceil(this.aWeatherData.wind.speed)} km/h` }}</p>
        </div>
        <img v-else class="loading" src="/images/helpers/loading.gif" alt="loading-image" />
    </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            aWeatherData: null
        }
    },
    computed: {
        ...mapGetters(['getSelectedCity']),
    },
    mounted() {
        if (this.getSelectedCity === '') {
            return;
        }

        console.log('greg');
        let aRequestBody = {q: `${this.getSelectedCity},JP`};

        axios.get('/weather', {params: aRequestBody})
        .then((oResponse) => {
            this.aWeatherData = oResponse.data;
        })
        .catch();
    }
}
</script>

<style scoped>
.weather-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    width: 300px;
    margin: 0 auto;
    border: 1px solid #ba6565;
    border-radius: 20px;
    justify-items: center;
}

.weather-info .main-weather {
    grid-column: span 2;
}

.weather-info img {
    position: relative;
    top: 20px;
}

.sub-weather {
    margin-left: 10px;
    justify-self: start;
}

h3 {
    text-align: center;
    grid-column: span 2;
}

.loading {
    display: block;
    margin: 0 auto;
    width: 20%;
    padding-top: 50px;
}
</style>
