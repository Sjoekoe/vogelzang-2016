<template>
    <div v-if="announcements.length" class="alert alert-info text-center">
        <span class="pull-left">
            <i class="fa fa-bullhorn fa-2x"></i>
        </span>
        <span v-html="announcements[iterator].body" class="fader"></span>
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
            var vm = this;

            setInterval(function(){

                $('.fader').fadeOut('500', function() {
                    var newIterator = vm.iterator + 1;

                    if (newIterator > vm.total - 1) {
                        newIterator = 0;
                    }

                    vm.iterator = newIterator;
                }).fadeIn(500)

            }, 10000);
        },

        methods: {
            fetchAllRecords: function() {
                $.getJSON('/api/announcements', function (announcements) {
                    this.announcements = announcements.data;
                    this.total = announcements.data.length;
                }.bind(this));
            },
        },
    }
</script>
