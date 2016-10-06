<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            {{ total }} ruiters jarig in {{ month }}.
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Verjaardag</th>
                    <th>Leeftijd</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="rider in riders" v-bind:class="{ highlight: rider.is_celebrating }">
                    <td><i class="fa fa-birthday-cake" v-if="rider.is_celebrating"></i> {{ rider.first_name }}</td>
                    <td>{{ rider.last_name }}</td>
                    <td>{{ rider.birth_day }}</td>
                    <td>{{ rider.age }}</td>
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
                loading: true,
                month: '',
            }
        },

        ready: function() {
            this.fetchAllRecords();

            var d = new Date();
            var month = new Array();
            month[0] = "januari";
            month[1] = "februari";
            month[2] = "maart";
            month[3] = "april";
            month[4] = "mei";
            month[5] = "juni";
            month[6] = "juli";
            month[7] = "augustus";
            month[8] = "september";
            month[9] = "oktober";
            month[10] = "november";
            month[11] = "december";
            this.month = month[d.getMonth()];
        },

        methods: {
            fetchAllRecords: function() {
                $.getJSON('/api/riders/birthdays', function(riders) {
                    this.total = riders.data.length;
                    this.riders = riders.data;
                    this.loading = false;
                }.bind(this));
            },
        },
    }
</script>
