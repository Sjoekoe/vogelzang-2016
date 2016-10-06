<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            {{ total }} ruiters jarig in .
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
                <tr v-for="rider in riders">
                    <td>{{ rider.first_name }}</td>
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
            }
        },

        ready: function() {
            this.fetchAllRecords();
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
