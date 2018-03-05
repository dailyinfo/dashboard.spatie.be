<template>
    <tile :position="position" modifiers="overflow">
        <section class="statistics">
            <h1>EP Subscribers</h1>
            <div class="statistic__single-medium-count">
                {{ editorsPicksSubscribersCount }}
            </div>
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
            editorsPicksSubscribersCount: 0
        };
    },

    methods: {
        formatNumber,

        getEventHandlers() {
            return {
                'DailyInfo.StatsFetched': response => {
                    this.editorsPicksSubscribersCount = response.editorsPicksSubscribersCount;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'editors-picks-subscribers',
            };
        },
    },
};
</script>
