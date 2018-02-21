<template>
    <tile :position="position" modifiers="overflow">
        <section class="statistics">
            <h1>Deliveries</h1>
            <ul>
                <li class="statistic">
                    <span class="statistic__label">Outstanding</span>
                    <span class="statistic__count">{{ formatNumber(outstandingDeliveriesCount) }}</span>
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
            outstandingDeliveriesCount: 0,
        };
    },

    methods: {
        formatNumber,

        getEventHandlers() {
            return {
                'DailyInfo.StatsFetched': response => {
                    this.outstandingDeliveriesCount = response.outstandingDeliveriesCount;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'delivery-stats',
            };
        },
    },
};
</script>
