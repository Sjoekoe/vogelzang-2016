<template>
    <div class="row">
        <div class="col-md-6" v-for="rider in riders">
            <section class="panel">
                <header class="panel-heading">
                    Toekomstige lessen voor {{ rider.first_name }} {{ rider.last_name }}
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
                        <tr v-for="subscription in rider.subscriptionRelation.data">
                            <td>{{ subscription.rosterRelation.data.date }}</td>
                            <td>{{ subscription.rosterRelation.data.time }}</td>
                            <td>{{ subscription.rosterRelation.data.type }}</td>
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
            }
        },

        ready: function() {
            $.getJSON('/api/users/' + this.user_id + '/riders?include=subscriptionRelation' , function(riders) {
                this.riders = riders.data;
            }.bind(this));
        },

        methods: {

        },
    }
</script>
