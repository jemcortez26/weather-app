<template>
    <div class="main-description" v-show="getSelectedCity !== ''">
            <article v-for="aCity in getCities" :key="aCity.name" :class="`${aCity.name}-article`" v-show="aCity.name === getSelectedCity">
                <img :src="aCity.image" :alt="`${aCity.name}-main`"/>
                <div>
                    <p>{{ aCity.content }}</p>
                </div>
            </article>
            <weather v-show="getSelectedCity !== ''" :key="getSelectedCity"></weather>
    </div>
</template>
<script>
import Weather from './weather.vue';
import { mapGetters } from 'vuex';

export default {
    components: {
        'weather': Weather
    },
    computed: {
        ...mapGetters(['getSelectedCity', 'getCities'])
    }
}
</script>
<style scoped>
img {
    width: 100%;
    height: 450px;
    border: 4px solid #fff;
    border-radius: 8px;
}

.main-description {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-column: span 2;
    gap: 60px;
    border-bottom: 1px solid #db9a9a;
    padding-bottom: 40px;
}

article {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-column: span 2;
    grid-row: span 2;
    gap: 60px;
}

p {
    color: #ba6565;
}
</style>
