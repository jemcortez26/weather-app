import { createStore } from 'vuex';

const AppStore = createStore({
    state() {
        return {
            sSelectedCity: '',
            aCities: [
                {name: 'Tokyo', image: '/images/description/tokyo.png', content: 'Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city\'s many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum).'},
                {name: 'Yokohama', image: '/images/description/yokohama.png', content: 'Yokohama, a Japanese city south of Tokyo, was one of the first Japanese ports opened to foreign trade, in 1859. It contains a large Chinatown with hundreds of Chinese restaurants and shops. It’s also known for Sankei-en Garden, a botanical park containing preserved Japanese residences from different eras, and the seaside Minato Mirai district, site of the 296m Landmark Tower.'},
                {name: 'Kyoto', image: '/images/description/kyoto.png', content: 'Kyoto, once the capital of Japan, is a city on the island of Honshu. It\'s famous for its numerous classical Buddhist temples, as well as gardens, imperial palaces, Shinto shrines and traditional wooden houses. It’s also known for formal traditions such as kaiseki dining, consisting of multiple courses of precise dishes, and geisha, female entertainers often found in the Gion district.'},
                {name: 'Osaka', image: '/images/description/osaka.png', content: 'Osaka is a large port city and commercial center on the Japanese island of Honshu. It\'s known for its modern architecture, nightlife and hearty street food. The 16th-century shogunate Osaka Castle, which has undergone several restorations, is its main historical landmark. It\'s surrounded by a moat and park with plum, peach and cherry-blossom trees. Sumiyoshi-taisha is among Japan’s oldest Shinto shrines.'},
                {name: 'Sapporo', image: '/images/description/sapporo.png', content: 'Sapporo, capital of the mountainous northern Japanese island of Hokkaido, is famous for its beer, skiing and annual Sapporo Snow Festival featuring enormous ice sculptures. The Sapporo Beer Museum traces the city’s brewing history and has tastings and a beer garden. Ski hills and jumps from the 1972 Winter Olympics are scattered within the city limits, and Niseko, a renowned ski resort, is nearby.'},
                {name: 'Nagoya', image: '/images/description/nagoya.png', content: 'Nagoya, capital of Japan’s Aichi Prefecture, is a manufacturing and shipping hub in central Honshu. The city’s Naka ward is home to museums and pachinko (gambling machine) parlors. Naka also includes the Sakae entertainment district, with attractions like the Sky-Boat Ferris wheel, which is attached to a mall. In northern Naka is Nagoya Castle, a partly reconstructed 1612 royal home displaying Edo-era artifacts.'},
                ],
        }
    },
    mutations: {
        updateSelectedCity(state, payload) {
            state.sSelectedCity = payload;
        }
    },
    getters: {
        getSelectedCity(state) {
            return state.sSelectedCity;
        },
        getCities(state) {
            return state.aCities;
        },
    }
});

export default AppStore;
