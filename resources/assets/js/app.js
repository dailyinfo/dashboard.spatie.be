import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';

import Dashboard from './components/Dashboard';
import AdStats from './components/AdStats';
import AnalyticsActiveUsers from './components/AnalyticsActiveUsers';
import EditorsPicksSubscribers from './components/EditorsPicksSubscribers';
import ReviewStats from './components/ReviewStats';
import DeliveryStats from './components/DeliveryStats';
import Calendar from './components/Calendar';
import Github from './components/Github';
import InternetConnection from './components/InternetConnection';
import Music from './components/Music';
import Npm from './components/Npm';
import Packagist from './components/Packagist';
import Tasks from './components/Tasks';
import TimeWeather from './components/TimeWeather';
import Todos from './components/Todos';
import Twitter from './components/Twitter';
import Uptime from './components/Uptime';

new Vue({
    el: '#dashboard',

    components: {
        Dashboard,
        AdStats,
        AnalyticsActiveUsers,
        EditorsPicksSubscribers,
        ReviewStats,
        DeliveryStats,
        Calendar,
        Github,
        InternetConnection,
        Music,
        Npm,
        Packagist,
        Tasks,
        TimeWeather,
        Todos,
        Twitter,
        Uptime,
    },

    created() {
        let options = {
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
            cluster: window.dashboard.pusherCluster,
        };

        if (window.dashboard.usingNodeServer) {
            options = {
                broadcaster: 'socket.io',
                host: 'http://dashboard.spatie.be:6001',
            };
        }

        this.echo = new Echo(options);
    },
});
