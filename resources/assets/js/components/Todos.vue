<template>
    <tile :position="position" modifiers="overflow">
        <section class="todo">
            <h1 class="todo__title">{{ teamMember }}</h1>
            <ul>
                <li v-for="todo in todos" class="todo__content">
                    {{ todo }}
                </li>
            </ul>
        </section>
    </tile>
</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import saveState from 'vue-save-state';

export default {
    components: {
        Tile,
    },

    mixins: [echo, saveState],

    props: ['teamMember', 'position'],

    data() {
        return {
            todos: '',
        };
    },

    methods: {
        getEventHandlers() {
            return {
                'Trello.TodosFetched': response => {
                    console.log(response);
                    this.todos = response.todos[this.teamMember];
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: `todos-${this.teamMember}`,
            };
        },
    },
};
</script>
