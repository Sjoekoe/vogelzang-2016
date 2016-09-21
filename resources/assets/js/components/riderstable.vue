<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            {{ total }} ruiters geregistreerd.
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="rider in riders">
                        <td>{{ rider.first_name }}</td>
                        <td>{{ rider.last_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="panel" v-if="loading">
        <div class="panel-body text-center">
            Laden... <i class="fa fa-spin fa-spinner"></i>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                riders: [],
                total: 0,
                max_pages: 1,
                loading: true,
                page: 1,
            }
        },

        ready: function() {
            $.getJSON('/api/riders', function(riders) {
                this.total = riders.meta.pagination.total;
                this.riders = riders.data;
                this.max_pages = riders.meta.pagination.total_pages;
                this.loading = false;
            }.bind(this));

            var vm = this;

            $(window).scroll(function() {
                if (vm.loading == false && vm.page < vm.max_pages) {
                    if ($(document).height() <= ($(window).height() + $(window).scrollTop())) {
                        vm.loading = true;
                        vm.page += 1;

                        $.getJSON('/api/riders?page=' + vm.page, function (riders) {
                            vm.loading = false;
                            riders.data.map(function (rider) {
                                vm.riders.push(rider);
                            });
                        }.bind(vm));
                    }
                }
            });
        },

        methods: {

        },
    }
</script>
