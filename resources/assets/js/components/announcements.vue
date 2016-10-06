<template>
    <div v-if="announcements.length" class="alert alert-info clearfix">
        <span class="alert-icon"><i class="fa fa-bullhorn"></i></span>
        <div class="notification-info fader">
            <ul class="clearfix notification-meta">
                <li class="pull-left notification-sender"><span><a href="#">{{ announcements[iterator].userRelation.data.username }}</a></span></li>
                <li class="pull-right notification-time">{{ announcements[iterator].created_at }}</li>
            </ul>
            <p v-html="announcements[iterator].body"></p>
        </div>
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
