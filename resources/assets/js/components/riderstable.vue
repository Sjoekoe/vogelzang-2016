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
</template>

<script>
    export default {
        data: function() {
            return {
                riders: [],
                total: 0,
            }
        },

        ready: function() {
            $.getJSON('/api/riders', function(riders) {
                this.total = riders.meta.pagination.total;
                this.riders = riders.data;
            }.bind(this));
        },

        methods: {

        },
    }
</script>
