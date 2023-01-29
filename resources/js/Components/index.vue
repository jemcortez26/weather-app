<template>
    <div class="body">
        <header>
            <img class="banner-image" src="//s30876.pcdn.co/wp-content/uploads/Japan.jpg.optimal.jpg" alt="banner" loading="lazy" datatype="image" />
            <header-content></header-content>
        </header>
        <main class="grid-container">
            <city-description></city-description>
            <venues :key="getSelectedCity" v-show="getSelectedCity !== ''"></venues>
        </main>
    </div>
</template>

<script>

import Header from './header.vue';
import CityDescription from './city_description.vue';
import Venues from './venues.vue';
import Weather from './weather.vue';
import { mapGetters } from "vuex";

export default {
    components: {
        'header-content': Header,
        'city-description': CityDescription,
        'venues': Venues,
        'weather': Weather
    },
    computed: {
        ...mapGetters(['getSelectedCity', 'getCities'])
    }
}
</script>

<style scoped>
.banner-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.grid-container {
    margin: 0 auto;
    max-width: 1500px;
}
</style>
