<template>
    <tile :position="position" modifiers="overflow">
        <section class="statistics">
            <h1>Active Users</h1>
            <div class="statistic__single-large-count">
                {{ formatNumber(activeUsers) }}
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
            activeUsers: 0,
            activeUsersByDevice: {
                desktop: 0,
                tablet: 0,
                mobile: 0
            }
        };
    },

    methods: {
        formatNumber,

        getEventHandlers() {
            return {
                'Analytics.RealTimeAnalyticsFetched': response => {
                    this.activeUsers = response.activeUsers;
                    this.activeUsersByDevice = Object.assign(this.activeUsersByDevice, response.activeUsersByDevice);
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'analytics-active-users',
            };
        },
    },
};
</script>
