<template>
    <div class="row">
        <div class="{{ class }}" v-for="rider in riders">
            <section class="panel">
                <header class="panel-heading">
                    Toekomstige lessen voor <b>{{ rider.first_name }} {{ rider.last_name }}</b>
                </header>
                <div class="panel-body">
                    <table class="table table-hover general-table">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Uur</th>
                            <th>Type Les</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="roster in rider.rosterRelation.data">
                            <td>{{ roster.date }}</td>
                            <td>{{ roster.time }}</td>
                            <td>{{ roster.type }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>


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
                user_id: window.vogelzang.auth.user.id,
                class: 'col-md-12',
            }
        },

        ready: function() {
            $.getJSON('/api/users/' + this.user_id + '/riders?include=rosterRelation' , function(riders) {
                this.riders = riders.data;
                var length = (12 / riders.data.length);

                if (length < 4) {
                    length = 4;
                }

                this.class = 'col-md-' + length;
            }.bind(this));
        },

        methods: {

        },
    }
</script>
