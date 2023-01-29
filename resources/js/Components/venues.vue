<template>
    <div class="venues">
        <div class="categories">
            <button><img @click="getVenues(13065)" src="/images/buttons/restaurants.png" alt="restaurants-img" /></button>
            <button><img @click="getVenues(19014)" src="/images/buttons/hotels.png" alt="hotels-img" /></button>
            <button><img @click="getVenues(17114)" src="/images/buttons/shopping.png" alt="shopping-img" /></button>
            <button><img @click="getVenues(15014)" src="/images/buttons/hospital.png" alt="hospital-img" /></button>
            <button><img @click="getVenues(11044)" src="/images/buttons/atm.png" alt="atm-img" /></button>
        </div>

        <div class="items">
            <img v-show="bIsLoading" class="loading" src="/images/helpers/loading.gif" alt="loading-image"/>
            <ol v-show="!bIsLoading">
                <li @click="redirectToMaps(aVenue.geocodes.main.latitude, aVenue.geocodes.main.longitude)" v-for="aVenue in aVenues">
                    <h2 class="venue-name">{{ aVenue.name }}</h2>
                    <p class="venue-address">{{ aVenue.location.formatted_address }}</p>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import axios from "axios";

export default {
    data() {
        return {
            aVenues: [],
            iSelectedCategory: '',
            bIsLoading: false
        }
    },
    methods: {
        getVenues: function(iCategory) {
            if (iCategory === this.iSelectedCategory) {
                return;
            }

            this.bIsLoading = true;
            this.iSelectedCategory = iCategory;
            let aRequestBody = {
                categories: iCategory,
                near: `${this.getSelectedCity}, JP`
            }

            axios.get('/venues', {params: aRequestBody})
            .then((oResponse) => {
                this.aVenues = oResponse.data.results;
                this.bIsLoading = false;
            })
            .catch((oError) => {
                location.replace('/error');
            });
        },
        redirectToMaps: function(iLat, iLong) {
            console.log(iLong);
            window.open(`https://maps.google.com?q=${iLat},${iLong}`);
        }
    },
    computed: {
        ...mapGetters(['getSelectedCity'])
    }
}
</script>

<style scoped>
.venues {
    margin: 60px auto;
}

.categories {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    max-width: 900px;
    margin: 0 auto;
}

.categories button {
    background: transparent;
    border: 0;
    box-shadow: aqua;
}

button img {
    cursor: pointer;
    border-radius: 50px;
    transition: 0.2s ease-out;
    max-width: 80px;
    height: 40px;
}

button img:hover {
    box-shadow: 5px 10px #888888;
}

img {
    width: 100%;
}

.items {
    margin: 60px auto;
}

ol {
    list-style: none;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 100px;
    grid-row-gap: 60px;
}

li {
    transition: 0.3s ease-out;
    border: 2px solid #d98882;
    border-radius: 100px;
    padding: 50px;
    width: 100%;
    margin: 0 auto;
    height: 300px;
}

li:hover {
    cursor: pointer;
    box-shadow: 5px 10px #d98882;
}

.loading {
    padding: 50px;
    display: block;
    margin: 0 auto;
    object-fit: contain;
    width: 15%;
}

.venue-name {
    border-bottom: 1px solid #cf3b30;
    color: #ab382e;
    padding-bottom: 20px;
    text-align: center;
}

.venue-address{
    text-align: left;
    font-size: 11px;
}
</style>
