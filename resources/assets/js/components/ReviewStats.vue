<template>
    <tile :position="position" modifiers="overflow">
        <section class="statistics">
            <h1>Reviews</h1>
            <ul>
                <li class="statistic">
                    <span class="statistic__label">New</span>
                    <span class="statistic__count">{{ formatNumber(newReviews) }}</span>
                </li>
                <li class="statistic">
                    <span class="statistic__label">Last 7 Days</span>
                    <span class="statistic__count">{{ formatNumber(reviewsPastWeekCount) }}</span>
                </li>
                <li class="statistic">
                    <span class="statistic__label">Last 30 Days</span>
                    <span class="statistic__count">{{ formatNumber(reviewsPast30DaysCount) }}</span>
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
            newReviews: 0,
            reviewsPastWeekCount: 0,
            reviewsPast30DaysCount: 0
        };
    },

    methods: {
        formatNumber,

        getEventHandlers() {
            return {
                'DailyInfo.StatsFetched': response => {
                    this.newReviews = response.newReviews;
                    this.reviewsPastWeekCount = response.reviewsPastWeekCount;
                    this.reviewsPast30DaysCount = response.reviewsPast30DaysCount;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'review-stats',
            };
        },
    },
};
</script>
