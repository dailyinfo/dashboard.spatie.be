<template>
    <tile :position="position" modifiers="overflow">
        <section class="statistics">
            <h1>Ads</h1>
            <ul>
                <li class="statistic">
                    <span class="statistic__label">New</span>
                    <span class="statistic__count">{{ formatNumber(newAds) }}</span>
                </li>
                <li class="statistic">
                    <span class="statistic__label">Filtered</span>
                    <span class="statistic__count">{{ formatNumber(filteredAds) }}</span>
                </li>
            </ul>
        </section>
    </tile>
</template>

<script>
import { formatNumber } from '../helpers';
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';

export default {
    components: {
        Tile,
    },

    mixins: [echo, saveState],

    props: ['position'],

    data() {
        return {
            newAds: 0,
            filteredAds: 0
        };
    },

    methods: {
        formatNumber,

        getEventHandlers() {
            return {
                'DailyInfo.StatsFetched': response => {
                    this.newAds = response.newAds;
                    this.filteredAds = response.filteredAds;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'ad-stats',
            };
        },
    },
};
</script>
