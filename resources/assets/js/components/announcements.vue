<template>
    <div v-if="announcements.length" class="alert alert-info" v-html="announcements[iterator].body">
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                announcements: [],
                total: 0,
                iterator: 0,
            }
        },

        ready: function() {
            this.fetchAllRecords();
        },

        methods: {
            fetchAllRecords: function() {
                $.getJSON('/api/announcements', function (announcements) {
                    console.log(announcements);
                    this.announcements = announcements.data;
                    this.total = announcements.data.length;
                }.bind(this));
            }
        },
    }
</script>
