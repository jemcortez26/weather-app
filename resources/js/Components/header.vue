<template>
    <div class="header">
        <div class="cities">
            <h3 @click="updateSelectedCity(aCity.name)" :class="[aCity.name === getSelectedCity ? 'selected-city' : 'city-name']" v-for="aCity in getCities" :key="aCity.name">{{ aCity.name }}</h3>
        </div>
        <h2></h2>
    </div>
</template>

<script>
import AppStore from "../Store/AppStore";
import { mapGetters } from "vuex";

export default {
    methods: {
        updateSelectedCity: function(sCity) {
            AppStore.commit('updateSelectedCity', sCity);
        }
    },
    computed: {
        ...mapGetters(['getCities', 'getSelectedCity'])
    }
}
</script>

<style scoped>
.selected-city {
    border-bottom: 2px solid #e8c1c1;
}

.city-name {
    border-bottom: 2px solid transparent;
}

.cities {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    width: 900px;
    margin: 0 auto;
    align-items: center;
    gap: 10px;
}

.cities h3 {
    display: inline-block;
    position: relative;
    margin: 30px auto;
    cursor: pointer;
}

.cities h3:after {
    content: '';
    position: absolute;
    width: 100%;
    transform: scaleX(0);
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #e8c1c1;
    transition: transform 0.25s ease-out;
}

.cities h3:hover:after {
    transform: scaleX(1);
}
</style>
